<?php include "./include/vars.php"; ?>

<!doctype html>

<head>
    <?php
        //Add analytics code here
        include_once "gtag.txt";
    ?>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="A custom dough recipe built with baker's percentages">
	<meta name="viewport" content="width=device-width">

    <?php include './include/includes.php'; ?>
    <script src="./js/custom-recipes.js"></script>

    <!-- QR codes for share links: https://github.com/kazuhikoarase/qrcode-generator -->
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>

    <link rel="shortcut icon" type="image/png" href="favicon.png"/>

    <title>Custom Recipe - Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">
    <?php include './include/navbar.php';?>

    <!-- Shown when the id/share-link is missing or invalid -->
    <div class="alert alert-warning mt-3 d-none" id="notFoundAlert">
        <i class="bi bi-exclamation-triangle"></i> This recipe could not be found in this browser.
        It may have been deleted, or it was created on another device.
        Go to <a href="my-recipes.php" class="alert-link">My Recipes</a> to see your recipes or build a new one.
    </div>

    <!-- Shown when viewing a recipe from a share link -->
    <div class="alert alert-info mt-3 d-none" id="sharedBanner">
        <i class="bi bi-link-45deg"></i> You are viewing a <b>shared recipe</b>. It is not saved in this browser yet.
        <button type="button" class="btn btn-success btn-sm ms-2" id="saveSharedButton">
            <i class="bi bi-download"></i> Save to My Recipes
        </button>
    </div>

    <div id="recipeRoot" class="d-none">

        <h2 class="font-monospace" id="recipeName"></h2>
        <p class="text-body-secondary" id="recipeDescription"></p>

        <div class="d-flex gap-2 mb-3 flex-wrap">
            <button class="btn btn-outline-secondary btn-sm" id="reset-button" title="Reset to recipe defaults">
                <i class="bi bi-arrow-counterclockwise"></i> Reset
            </button>
            <button class="btn btn-outline-secondary btn-sm" id="print-button" title="Print this page">
                <i class="bi bi-printer"></i> Print
            </button>
            <button class="btn btn-outline-secondary btn-sm" id="edit-button" title="Edit this recipe">
                <i class="bi bi-pencil"></i> Edit
            </button>
            <button class="btn btn-outline-secondary btn-sm" id="share-button" title="Share this recipe" data-bs-toggle="modal" data-bs-target="#shareModal">
                <i class="bi bi-share"></i> Share
            </button>
        </div>

        <!-- Portions + per-ingredient baker's percentages -->
        <div class="row" id="inputRow"></div>

        <h2 class="font-monospace">Final Result:</h2>
        <div id="resultRow" class="row gy-1"></div>

        <div id="stepsContainer" class="mt-3"></div>

    </div> <!-- recipeRoot -->

    <!-- Share modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-share"></i> Share this recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-body-secondary">
                        The whole recipe is encoded in this link &mdash; nothing is stored on a server.
                        Anyone who opens it can view the recipe and save their own copy.
                    </p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="shareUrl" readonly aria-label="Share link">
                        <button class="btn btn-outline-secondary" type="button" id="copyShareUrl" title="Copy link">
                            <i class="bi bi-clipboard"></i> Copy
                        </button>
                    </div>
                    <div class="text-center" id="qrContainer"></div>
                </div>
            </div>
        </div>
    </div>

    <?php include './include/footer.php'; ?>

</div> <!-- container -->

<script>

var recipe = null;
var recipeKey = null;     // suffix used in element ids, so saved inputs are unique per recipe
var isShared = false;

// Escapes quotes too, since recipe names/ingredients end up inside HTML attributes
// and shared links mean the recipe data isn't always the viewer's own.
function escapeHtml(text) {
    return String(text).replace(/[&<>"']/g, function (c) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
}

// Stable pseudo-id for shared recipes so checkbox/input memory doesn't clash between different shared links
function hashString(str) {
    var hash = 5381;
    for (var i = 0; i < str.length; i++) {
        hash = ((hash << 5) + hash + str.charCodeAt(i)) | 0;
    }
    return 'shared' + Math.abs(hash).toString(36);
}

function buildInputs() {
    var html =
        '<div class="col-md-2 w-auto">' +
            '<div class="input-group mb-3">' +
                '<span class="input-group-text">Portions</span>' +
                '<input type="number" min="1" step="1" id="inputPortions-' + recipeKey + '" class="form-control recalc" value="' + recipe.defaults.portions + '" style="max-width: 6rem;" aria-label="Portions">' +
                '<span class="input-group-text">balls</span>' +
            '</div>' +
        '</div>' +
        '<div class="col-md-3 w-auto">' +
            '<div class="input-group mb-3">' +
                '<span class="input-group-text">Portion Size</span>' +
                '<input type="number" min="1" step="1" id="inputPortionSize-' + recipeKey + '" class="form-control recalc" value="' + recipe.defaults.portionSize + '" style="max-width: 7rem;" aria-label="Portion size">' +
                '<span class="input-group-text">g</span>' +
            '</div>' +
        '</div>';

    recipe.ingredients.forEach(function (ing, i) {
        html +=
            '<div class="col-md-2 w-auto">' +
                '<div class="input-group mb-3">' +
                    '<span class="input-group-text">' + escapeHtml(ing.name) + '</span>' +
                    '<input type="number" min="0" step="any" id="inputPct-' + recipeKey + '-' + i + '" class="form-control recalc" value="' + ing.pct + '" style="max-width: 6.5rem;" aria-label="' + escapeHtml(ing.name) + ' percentage">' +
                    '<span class="input-group-text">%</span>' +
                '</div>' +
            '</div>';
    });

    $('#inputRow').html(html);
}

function resultBox(id, label, value) {
    return '<div class="col-auto">' +
               '<form class="form-floating font-monospace">' +
                   '<input type="text" id="' + id + '" class="form-control" value="' + value + '" disabled readonly>' +
                   '<label for="' + id + '">' + escapeHtml(label) + '</label>' +
               '</form>' +
           '</div>';
}

function buildSteps() {
    var html = '';
    recipe.steps.forEach(function (step, s) {
        html += '<div class="row mb-3"><h2 class="font-monospace">Step ' + (s + 1) + ' - ' + escapeHtml(step.title) + '</h2>';
        if (step.items.length > 0) {
            html += '<div class="col"><ul class="list-group">';
            step.items.forEach(function (item, j) {
                var cbId = 'step-' + recipeKey + '-' + s + '-' + j;
                html += '<li class="list-group-item">' +
                            '<input class="form-check-input me-1" type="checkbox" value="" id="' + cbId + '">' +
                            '<label class="form-check-label stretched-link" for="' + cbId + '">' + escapeHtml(item) + '</label>' +
                        '</li>';
            });
            html += '</ul></div>';
        }
        html += '</div>';
    });
    $('#stepsContainer').html(html);
}

function refresh_data() {
    var portions = parseFloat($('#inputPortions-' + recipeKey).val());
    var portionSize = parseFloat($('#inputPortionSize-' + recipeKey).val());
    if (!isFinite(portions) || !isFinite(portionSize)) return;

    var pcts = recipe.ingredients.map(function (ing, i) {
        var pct = parseFloat($('#inputPct-' + recipeKey + '-' + i).val());
        return (isFinite(pct) && pct >= 0) ? pct : 0;
    });

    var result = CustomRecipes.computeWeights(portions, portionSize, pcts);

    var html = resultBox('outTotal-' + recipeKey, 'Total Dough Weight (g)', result.totalDough) +
               resultBox('outFlour-' + recipeKey, 'Flour (g)', result.flour);
    recipe.ingredients.forEach(function (ing, i) {
        html += resultBox('outWeight-' + recipeKey + '-' + i, ing.name + ' (g)', result.weights[i]);
    });
    $('#resultRow').html(html);
}

// session-inputs.js restores inputs on document.ready, which runs before this
// page builds its dynamic inputs — so restore them here using the same keys.
function restoreSavedInputs() {
    var pageKey = window.location.pathname;
    $('#recipeRoot input[id]:not([disabled])').each(function () {
        var saved = localStorage.getItem(pageKey + ':' + this.id);
        if (saved !== null) {
            if (this.type === 'checkbox') {
                this.checked = saved === '1';
            } else {
                this.value = saved;
            }
        }
    });
}

function setDefaultsFromRecipe() {
    $('#inputPortions-' + recipeKey).val(recipe.defaults.portions);
    $('#inputPortionSize-' + recipeKey).val(recipe.defaults.portionSize);
    recipe.ingredients.forEach(function (ing, i) {
        $('#inputPct-' + recipeKey + '-' + i).val(ing.pct);
    });
}

function buildShareLink() {
    return window.location.href.split('#')[0].split('?')[0] + '#r=' + CustomRecipes.encodeShare(recipe);
}

$(document).ready(function () {

    // A recipe can arrive two ways: ?id= (saved in this browser) or #r= (encoded share link)
    var localId = new URLSearchParams(window.location.search).get('id');
    var hash = window.location.hash;

    if (localId) {
        recipe = CustomRecipes.get(localId);
        recipeKey = localId;
    } else if (hash.indexOf('#r=') === 0) {
        recipe = CustomRecipes.decodeShare(hash.slice(3));
        isShared = true;
        recipeKey = recipe ? hashString(hash) : null;
    }

    if (!recipe) {
        $('#notFoundAlert').removeClass('d-none');
        return;
    }

    document.title = recipe.name + " - Ramin's Pizza-dough Calculator";
    $('#recipeName').text(recipe.name);
    if (recipe.description) {
        $('#recipeDescription').text(recipe.description);
    } else {
        $('#recipeDescription').remove();
    }

    buildInputs();
    buildSteps();
    restoreSavedInputs();
    refresh_data();
    $('#recipeRoot').removeClass('d-none');

    if (isShared) {
        $('#sharedBanner').removeClass('d-none');
        $('#edit-button').addClass('d-none');
        $('#saveSharedButton').on('click', function () {
            var copy = CustomRecipes.upsert(CustomRecipes.normalize(recipe));
            window.location.href = 'custom-recipe.php?id=' + copy.id;
        });
    } else {
        $('#edit-button').on('click', function () {
            window.location.href = 'recipe-builder.php?id=' + recipe.id;
        });
    }

    $(document).on('input change keyup', '.recalc', refresh_data);

    $('#print-button').on('click', function () {
        window.print();
    });

    $('#reset-button').on('click', function (e) {
        e.preventDefault();
        clearPageStorage();
        setDefaultsFromRecipe();
        refresh_data();
    });

    // Share modal: build the link and QR code fresh each time it opens
    document.getElementById('shareModal').addEventListener('show.bs.modal', function () {
        var url = buildShareLink();
        $('#shareUrl').val(url);
        try {
            var qr = qrcode(0, 'L');
            qr.addData(url);
            qr.make();
            $('#qrContainer').html(qr.createImgTag(3, 8));
        } catch (err) {
            $('#qrContainer').html('<span class="text-body-secondary">Recipe is too large for a QR code &mdash; use the link instead.</span>');
        }
    });

    $('#copyShareUrl').on('click', function () {
        var button = $(this);
        var url = $('#shareUrl').val();
        function copied() {
            button.html('<i class="bi bi-clipboard-check"></i> Copied!');
            setTimeout(function () { button.html('<i class="bi bi-clipboard"></i> Copy'); }, 2000);
        }
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url).then(copied);
        } else {
            $('#shareUrl').trigger('select');
            document.execCommand('copy');
            copied();
        }
    });

});

</script>

</body>


</html>
