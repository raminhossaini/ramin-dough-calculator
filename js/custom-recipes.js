/*
 * Client-side storage and calculation library for user-created recipes.
 * Recipes live entirely in localStorage — no server, no database.
 *
 * Recipe model:
 * {
 *   id: "a1b2c3d4",                  // random slug, local only
 *   name: "My 72hr Poolish",
 *   description: "optional notes",
 *   defaults: { portions: 2, portionSize: 260 },
 *   ingredients: [ { name: "Water", pct: 65 }, ... ],   // baker's % of flour; flour itself is the implicit 100% base
 *   steps: [ { title: "Make the poolish", items: ["Mix...", "Refrigerate..."] }, ... ],
 *   createdAt: "2026-07-07T10:00:00.000Z",
 *   updatedAt: "2026-07-07T10:00:00.000Z"
 * }
 */
(function (window) {
    'use strict';

    var STORAGE_KEY = 'customRecipes:v1';

    /* ---------- storage ---------- */

    function all() {
        try {
            var raw = localStorage.getItem(STORAGE_KEY);
            var list = raw ? JSON.parse(raw) : [];
            return Array.isArray(list) ? list : [];
        } catch (e) {
            return [];
        }
    }

    function saveAll(list) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(list));
    }

    function get(id) {
        var list = all();
        for (var i = 0; i < list.length; i++) {
            if (list[i].id === id) return list[i];
        }
        return null;
    }

    function generateId() {
        var chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        var id = '';
        for (var i = 0; i < 8; i++) {
            id += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return id;
    }

    function upsert(recipe) {
        var now = new Date().toISOString();
        if (!recipe.id) recipe.id = generateId();
        if (!recipe.createdAt) recipe.createdAt = now;
        recipe.updatedAt = now;

        var list = all();
        var replaced = false;
        for (var i = 0; i < list.length; i++) {
            if (list[i].id === recipe.id) {
                list[i] = recipe;
                replaced = true;
                break;
            }
        }
        if (!replaced) list.push(recipe);
        saveAll(list);
        return recipe;
    }

    function remove(id) {
        saveAll(all().filter(function (r) { return r.id !== id; }));
        // Clean up saved inputs/checkboxes for this recipe (keys look like "/custom-recipe.php:inputPortions-<id>")
        var stale = [];
        for (var i = 0; i < localStorage.length; i++) {
            var key = localStorage.key(i);
            if (key && key.indexOf(':') !== -1 && key.indexOf('-' + id) !== -1) stale.push(key);
        }
        stale.forEach(function (key) { localStorage.removeItem(key); });
    }

    /* ---------- validation / normalisation ---------- */

    function normalize(obj) {
        if (!obj || typeof obj !== 'object') return null;
        if (typeof obj.name !== 'string' || obj.name.trim() === '') return null;

        var recipe = {
            id: (typeof obj.id === 'string' && /^[a-z0-9]{4,16}$/.test(obj.id)) ? obj.id : null,
            name: obj.name.trim().slice(0, 100),
            description: (typeof obj.description === 'string') ? obj.description.trim().slice(0, 1000) : '',
            defaults: {
                portions: toPositiveNumber(obj.defaults && obj.defaults.portions, 2),
                portionSize: toPositiveNumber(obj.defaults && obj.defaults.portionSize, 260)
            },
            ingredients: [],
            steps: [],
            createdAt: (typeof obj.createdAt === 'string') ? obj.createdAt : null,
            updatedAt: null
        };

        var ingredients = Array.isArray(obj.ingredients) ? obj.ingredients : [];
        ingredients.forEach(function (ing) {
            if (!ing || typeof ing.name !== 'string' || ing.name.trim() === '') return;
            var pct = parseFloat(ing.pct);
            if (!isFinite(pct) || pct < 0) return;
            recipe.ingredients.push({ name: ing.name.trim().slice(0, 50), pct: pct });
        });

        var steps = Array.isArray(obj.steps) ? obj.steps : [];
        steps.forEach(function (step) {
            if (!step || typeof step.title !== 'string' || step.title.trim() === '') return;
            var items = Array.isArray(step.items) ? step.items : [];
            recipe.steps.push({
                title: step.title.trim().slice(0, 200),
                items: items.filter(function (it) { return typeof it === 'string' && it.trim() !== ''; })
                            .map(function (it) { return it.trim().slice(0, 500); })
            });
        });

        return recipe;
    }

    function toPositiveNumber(value, fallback) {
        var n = parseFloat(value);
        return (isFinite(n) && n > 0) ? n : fallback;
    }

    /* ---------- baker's percentage calculation ---------- */

    // Flour is the 100% base. Total dough = portions * portionSize,
    // so flour = totalDough / (1 + sum(percentages)/100), and each
    // ingredient = pct/100 * flour — same formula the fixed calculators use.
    function computeWeights(portions, portionSize, percentages) {
        var totalDough = portions * portionSize;
        var pctSum = 0;
        percentages.forEach(function (p) { pctSum += p; });
        var flour = totalDough / (1 + pctSum / 100);
        return {
            totalDough: roundWeight(totalDough),
            flour: roundWeight(flour),
            weights: percentages.map(function (p) { return roundWeight(p / 100 * flour); })
        };
    }

    // Whole grams for big amounts, one decimal for small ones (yeast, salt)
    function roundWeight(value) {
        return value >= 10 ? Math.round(value) : Math.round(value * 10) / 10;
    }

    /* ---------- share links (recipe encoded in the URL hash) ---------- */

    function toBase64Url(str) {
        var bytes = new TextEncoder().encode(str);
        var bin = '';
        for (var i = 0; i < bytes.length; i++) bin += String.fromCharCode(bytes[i]);
        return btoa(bin).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '');
    }

    function fromBase64Url(str) {
        str = str.replace(/-/g, '+').replace(/_/g, '/');
        while (str.length % 4) str += '=';
        var bin = atob(str);
        var bytes = new Uint8Array(bin.length);
        for (var i = 0; i < bin.length; i++) bytes[i] = bin.charCodeAt(i);
        return new TextDecoder().decode(bytes);
    }

    function encodeShare(recipe) {
        var payload = {
            v: 1,
            name: recipe.name,
            description: recipe.description,
            defaults: recipe.defaults,
            ingredients: recipe.ingredients,
            steps: recipe.steps
        };
        return toBase64Url(JSON.stringify(payload));
    }

    function decodeShare(encoded) {
        try {
            return normalize(JSON.parse(fromBase64Url(encoded)));
        } catch (e) {
            return null;
        }
    }

    /* ---------- export / import ---------- */

    function exportBundle(recipes) {
        return {
            format: 'ramin-dough-calculator-recipes',
            version: 1,
            exportedAt: new Date().toISOString(),
            recipes: recipes
        };
    }

    function downloadJson(filename, data) {
        var blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    // Accepts an export bundle, a bare array of recipes, or a single recipe object.
    // Existing ids are never overwritten — imports always get a fresh id.
    function importData(data) {
        var candidates;
        if (data && Array.isArray(data.recipes)) {
            candidates = data.recipes;
        } else if (Array.isArray(data)) {
            candidates = data;
        } else {
            candidates = [data];
        }

        var imported = 0, skipped = 0;
        candidates.forEach(function (candidate) {
            var recipe = normalize(candidate);
            if (!recipe) { skipped++; return; }
            recipe.id = generateId();
            recipe.createdAt = null;
            upsert(recipe);
            imported++;
        });
        return { imported: imported, skipped: skipped };
    }

    function slugify(name) {
        return name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '').slice(0, 40) || 'recipe';
    }

    /* ---------- public API ---------- */

    window.CustomRecipes = {
        all: all,
        get: get,
        upsert: upsert,
        remove: remove,
        normalize: normalize,
        generateId: generateId,
        computeWeights: computeWeights,
        roundWeight: roundWeight,
        encodeShare: encodeShare,
        decodeShare: decodeShare,
        exportBundle: exportBundle,
        downloadJson: downloadJson,
        importData: importData,
        slugify: slugify
    };

})(window);
