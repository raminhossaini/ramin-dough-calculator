<?php include "./include/vars.php"; ?>

<!doctype html>

<head>
    <?php
        //Add analytics code here
        include_once "gtag.txt";
    ?>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="Build your own dough recipe with baker's percentages">
	<meta name="viewport" content="width=device-width">

    <?php include './include/includes.php'; ?>
    <script src="./js/custom-recipes.js"></script>

    <link rel="shortcut icon" type="image/png" href="favicon.png"/>

    <title>Recipe Builder - Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">
    <?php include './include/navbar.php';?>

    <h2 class="font-monospace" id="builderHeading">Build Your Own Recipe</h2>
    <p class="text-body-secondary">
        Define your recipe using <a href="https://en.wikipedia.org/wiki/Baker_percentage" target="_blank">baker's percentages</a>:
        flour is always the 100% base, and every other ingredient is a percentage of the flour weight.
        The calculator works out the exact gram amounts for any number of dough balls.
        Everything is stored in this browser only &mdash; use Export on the <a href="my-recipes.php">My Recipes</a> page to keep a backup.
    </p>

    <!-- NOTE: builder fields use classes, not ids, so session-inputs.js
         doesn't restore one recipe's values into another. -->

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label fw-bold">Recipe name</label>
            <input type="text" class="form-control recipe-name" placeholder="e.g. My 72-hour Poolish" maxlength="100">
            <div class="invalid-feedback">Please give your recipe a name.</div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-8">
            <label class="form-label fw-bold">Description <span class="fw-normal text-body-secondary">(optional)</span></label>
            <textarea class="form-control recipe-description" rows="2" maxlength="1000" placeholder="Notes about this recipe..."></textarea>
        </div>
    </div>

    <h4 class="font-monospace mt-4">Default portions</h4>
    <div class="row">
        <div class="col-auto">
            <div class="input-group mb-3">
                <span class="input-group-text">Portions</span>
                <input type="number" class="form-control recipe-portions" value="2" min="1" step="1" style="max-width: 6rem;" aria-label="Default portions">
                <span class="input-group-text">balls</span>
            </div>
        </div>
        <div class="col-auto">
            <div class="input-group mb-3">
                <span class="input-group-text">Portion Size</span>
                <input type="number" class="form-control recipe-portion-size" value="260" min="1" step="1" style="max-width: 7rem;" aria-label="Default portion size">
                <span class="input-group-text">g</span>
            </div>
        </div>
    </div>

    <h4 class="font-monospace mt-2">Ingredients</h4>

    <div class="row">
        <div class="col-md-8 col-lg-6">

            <div class="input-group mb-2">
                <span class="input-group-text" style="min-width: 3rem;"><i class="bi bi-lock"></i></span>
                <input type="text" class="form-control" value="Flour" disabled readonly aria-label="Flour (base ingredient)">
                <input type="number" class="form-control" value="100" disabled readonly style="max-width: 6.5rem;" aria-label="Flour percentage">
                <span class="input-group-text">%</span>
            </div>

            <div id="ingredientRows"></div>

            <button type="button" class="btn btn-outline-secondary btn-sm mt-1" id="addIngredient">
                <i class="bi bi-plus-lg"></i> Add ingredient
            </button>
        </div>
    </div>

    <h4 class="font-monospace mt-4">Steps <span class="fs-6 fw-normal text-body-secondary">(optional)</span></h4>
    <p class="text-body-secondary mb-2">Each step becomes a checklist on the recipe page. Put one checklist item per line.</p>

    <div class="row">
        <div class="col-md-10 col-lg-8">
            <div id="stepCards"></div>
            <button type="button" class="btn btn-outline-secondary btn-sm mt-1" id="addStep">
                <i class="bi bi-plus-lg"></i> Add step
            </button>
        </div>
    </div>

    <hr class="mt-4">

    <h4 class="font-monospace">Preview <span class="fs-6 fw-normal text-body-secondary">(with default portions)</span></h4>
    <div class="row gy-1 mb-3" id="previewRow"></div>

    <div class="d-flex gap-2 mb-4">
        <button type="button" class="btn btn-success" id="saveRecipe">
            <i class="bi bi-check-lg"></i> Save Recipe
        </button>
        <a href="my-recipes.php" class="btn btn-outline-secondary">Cancel</a>
    </div>

    <?php include './include/footer.php'; ?>

</div> <!-- container -->

<script>

var editId = new URLSearchParams(window.location.search).get('id');
var existing = editId ? CustomRecipes.get(editId) : null;

function addIngredientRow(name, pct) {
    var row = $(
        '<div class="input-group mb-2 ingredient-row">' +
            '<span class="input-group-text ing-drag" style="min-width: 3rem;"><i class="bi bi-egg-fried"></i></span>' +
            '<input type="text" class="form-control ing-name" placeholder="e.g. Water" maxlength="50" aria-label="Ingredient name">' +
            '<input type="number" class="form-control ing-pct" min="0" step="any" style="max-width: 6.5rem;" aria-label="Baker\'s percentage">' +
            '<span class="input-group-text">%</span>' +
            '<button type="button" class="btn btn-outline-danger remove-ingredient" title="Remove ingredient"><i class="bi bi-trash"></i></button>' +
        '</div>'
    );
    row.find('.ing-name').val(name || '');
    row.find('.ing-pct').val(pct !== undefined ? pct : '');
    $('#ingredientRows').append(row);
}

function addStepCard(title, items) {
    var card = $(
        '<div class="card mb-2 step-card">' +
            '<div class="card-body">' +
                '<div class="input-group mb-2">' +
                    '<span class="input-group-text step-number"></span>' +
                    '<input type="text" class="form-control step-title" placeholder="Step title, e.g. Make the poolish" maxlength="200" aria-label="Step title">' +
                    '<button type="button" class="btn btn-outline-danger remove-step" title="Remove step"><i class="bi bi-trash"></i></button>' +
                '</div>' +
                '<textarea class="form-control step-items" rows="3" placeholder="One checklist item per line, e.g.&#10;Mix flour, water and yeast&#10;Refrigerate for 16-24 hrs" aria-label="Checklist items"></textarea>' +
            '</div>' +
        '</div>'
    );
    card.find('.step-title').val(title || '');
    card.find('.step-items').val((items || []).join('\n'));
    $('#stepCards').append(card);
    renumberSteps();
}

function renumberSteps() {
    $('#stepCards .step-number').each(function (i) {
        $(this).text('Step ' + (i + 1));
    });
}

function collectRecipe() {
    var ingredients = [];
    $('#ingredientRows .ingredient-row').each(function () {
        var name = $(this).find('.ing-name').val().trim();
        var pct = parseFloat($(this).find('.ing-pct').val());
        if (name !== '' && isFinite(pct) && pct >= 0) {
            ingredients.push({ name: name, pct: pct });
        }
    });

    var steps = [];
    $('#stepCards .step-card').each(function () {
        var title = $(this).find('.step-title').val().trim();
        var items = $(this).find('.step-items').val().split('\n')
            .map(function (line) { return line.trim(); })
            .filter(function (line) { return line !== ''; });
        if (title !== '') {
            steps.push({ title: title, items: items });
        }
    });

    return {
        name: $('.recipe-name').val().trim(),
        description: $('.recipe-description').val().trim(),
        defaults: {
            portions: parseFloat($('.recipe-portions').val()),
            portionSize: parseFloat($('.recipe-portion-size').val())
        },
        ingredients: ingredients,
        steps: steps
    };
}

function refreshPreview() {
    var data = collectRecipe();
    if (data.name === '') data.name = 'preview';    // preview should work before a name is typed
    var recipe = CustomRecipes.normalize(data);
    var pcts = recipe.ingredients.map(function (ing) { return ing.pct; });
    var result = CustomRecipes.computeWeights(recipe.defaults.portions, recipe.defaults.portionSize, pcts);

    var html = previewBox('Total Dough Weight (g)', result.totalDough) + previewBox('Flour (g)', result.flour);
    recipe.ingredients.forEach(function (ing, i) {
        html += previewBox(ing.name + ' (g)', result.weights[i]);
    });
    $('#previewRow').html(html);
}

function previewBox(label, value) {
    var safeLabel = String(label).replace(/[&<>"']/g, function (c) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
    return '<div class="col-auto">' +
               '<form class="form-floating font-monospace">' +
                   '<input type="text" class="form-control" value="' + value + '" disabled readonly>' +
                   '<label>' + safeLabel + '</label>' +
               '</form>' +
           '</div>';
}

$(document).ready(function () {

    if (existing) {
        $('#builderHeading').text('Edit Recipe');
        $('.recipe-name').val(existing.name);
        $('.recipe-description').val(existing.description);
        $('.recipe-portions').val(existing.defaults.portions);
        $('.recipe-portion-size').val(existing.defaults.portionSize);
        existing.ingredients.forEach(function (ing) { addIngredientRow(ing.name, ing.pct); });
        existing.steps.forEach(function (step) { addStepCard(step.title, step.items); });
    } else {
        // Sensible starting point for a new recipe
        addIngredientRow('Water', 65);
        addIngredientRow('Salt', 3);
        addIngredientRow('Instant Yeast', 0.5);
    }

    $('#addIngredient').on('click', function () {
        addIngredientRow();
        $('#ingredientRows .ingredient-row:last .ing-name').focus();
    });

    $('#addStep').on('click', function () {
        addStepCard();
        $('#stepCards .step-card:last .step-title').focus();
    });

    $(document).on('click', '.remove-ingredient', function () {
        $(this).closest('.ingredient-row').remove();
        refreshPreview();
    });

    $(document).on('click', '.remove-step', function () {
        $(this).closest('.step-card').remove();
        renumberSteps();
    });

    $(document).on('input change', '.ing-name, .ing-pct, .recipe-portions, .recipe-portion-size', refreshPreview);

    $('#saveRecipe').on('click', function () {
        var recipe = CustomRecipes.normalize(collectRecipe());
        if (!recipe) {
            $('.recipe-name').addClass('is-invalid').focus();
            return;
        }
        $('.recipe-name').removeClass('is-invalid');

        if (existing) {
            recipe.id = existing.id;
            recipe.createdAt = existing.createdAt;
        }
        recipe = CustomRecipes.upsert(recipe);
        window.location.href = 'custom-recipe.php?id=' + recipe.id;
    });

    refreshPreview();
});

</script>

</body>


</html>
