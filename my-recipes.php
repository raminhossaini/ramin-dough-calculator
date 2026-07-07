<?php include "./include/vars.php"; ?>

<!doctype html>

<head>
    <?php
        //Add analytics code here
        include_once "gtag.txt";
    ?>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="Your own custom dough recipes, stored in your browser">
	<meta name="viewport" content="width=device-width">

    <?php include './include/includes.php'; ?>
    <script src="./js/custom-recipes.js"></script>

    <link rel="shortcut icon" type="image/png" href="favicon.png"/>

    <title>My Recipes - Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">
    <?php include './include/navbar.php';?>

    <div class="mb-3">
        <span class="h2 mb-3 font-monospace">My Recipes</span>
        <a href="<?=GITHUB_ROOT;?>/discussions/5"><span class="badge text-bg-secondary align-text-top">Beta</span></a>
    </div>

    
    <p class="text-body-secondary">
        Recipes you build are stored <b>in this browser only</b> &mdash; there is no account and no server.
        Use <b>Export</b> to save them as a file (for backup, or to move to another device) and <b>Import</b> to load them back.
    </p>

    <div class="d-flex gap-2 mb-3 flex-wrap">
        <a href="recipe-builder.php" class="btn btn-success btn-sm">
            <i class="bi bi-plus-lg"></i> New Recipe
        </a>
        <button class="btn btn-outline-secondary btn-sm" id="import-button" title="Import recipes from a JSON file">
            <i class="bi bi-upload"></i> Import
        </button>
        <button class="btn btn-outline-secondary btn-sm" id="export-all-button" title="Export all recipes to a JSON file">
            <i class="bi bi-download"></i> Export All
        </button>
        <input type="file" id="importFile" accept=".json,application/json" class="d-none">
    </div>

    <div class="alert alert-secondary d-none" id="emptyState">
        <i class="bi bi-journal-plus"></i> You have no recipes yet.
        <a href="recipe-builder.php" class="alert-link">Build your first recipe</a> or import one from a file.
    </div>

    <div class="alert alert-info d-none" id="importResult"></div>

    <div class="table-responsive">
        <table class="table table-striped align-middle d-none" id="recipeTable">
            <thead>
                <tr>
                    <th scope="col">Recipe</th>
                    <th scope="col" class="d-none d-md-table-cell">Ingredients</th>
                    <th scope="col" class="d-none d-md-table-cell">Last updated</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody id="recipeTableBody"></tbody>
        </table>
    </div>

    <?php include './include/footer.php'; ?>

</div> <!-- container -->

<script>

function escapeHtml(text) {
    return String(text).replace(/[&<>"']/g, function (c) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
}

function render() {
    var recipes = CustomRecipes.all().slice().sort(function (a, b) {
        return (b.updatedAt || '').localeCompare(a.updatedAt || '');
    });

    if (recipes.length === 0) {
        $('#emptyState').removeClass('d-none');
        $('#recipeTable').addClass('d-none');
        return;
    }
    $('#emptyState').addClass('d-none');
    $('#recipeTable').removeClass('d-none');

    var rows = '';
    recipes.forEach(function (recipe) {
        var ingredientNames = recipe.ingredients.map(function (ing) { return ing.name; }).join(', ');
        var updated = recipe.updatedAt ? dayjs(recipe.updatedAt).format('DD-MMM-YYYY HH:mm') : '';

        rows += '<tr data-id="' + recipe.id + '">' +
            '<td>' +
                '<a href="custom-recipe.php?id=' + recipe.id + '" class="fw-bold text-decoration-none">' + escapeHtml(recipe.name) + '</a>' +
                (recipe.description ? '<br><small class="text-body-secondary">' + escapeHtml(recipe.description.slice(0, 120)) + '</small>' : '') +
            '</td>' +
            '<td class="d-none d-md-table-cell"><small>Flour' + (ingredientNames ? ', ' + escapeHtml(ingredientNames) : '') + '</small></td>' +
            '<td class="d-none d-md-table-cell"><small>' + updated + '</small></td>' +
            '<td class="text-end">' +
                '<div class="btn-group btn-group-sm" role="group">' +
                    '<a class="btn btn-outline-secondary" href="custom-recipe.php?id=' + recipe.id + '" title="Open"><i class="bi bi-box-arrow-up-right"></i></a>' +
                    '<a class="btn btn-outline-secondary" href="recipe-builder.php?id=' + recipe.id + '" title="Edit"><i class="bi bi-pencil"></i></a>' +
                    '<button class="btn btn-outline-secondary duplicate-recipe" title="Duplicate"><i class="bi bi-copy"></i></button>' +
                    '<button class="btn btn-outline-secondary export-recipe" title="Export as JSON"><i class="bi bi-download"></i></button>' +
                    '<button class="btn btn-outline-danger delete-recipe" title="Delete"><i class="bi bi-trash"></i></button>' +
                '</div>' +
            '</td>' +
        '</tr>';
    });
    $('#recipeTableBody').html(rows);
}

$(document).ready(function () {

    render();

    $('#export-all-button').on('click', function () {
        var recipes = CustomRecipes.all();
        if (recipes.length === 0) {
            alert('There are no recipes to export yet.');
            return;
        }
        CustomRecipes.downloadJson('dough-recipes-' + dayjs().format('YYYYMMDD') + '.json', CustomRecipes.exportBundle(recipes));
    });

    $('#import-button').on('click', function () {
        $('#importFile').trigger('click');
    });

    $('#importFile').on('change', function () {
        var file = this.files[0];
        this.value = '';
        if (!file) return;

        var reader = new FileReader();
        reader.onload = function () {
            var message;
            try {
                var result = CustomRecipes.importData(JSON.parse(reader.result));
                message = 'Imported ' + result.imported + ' recipe' + (result.imported === 1 ? '' : 's') + '.' +
                          (result.skipped > 0 ? ' Skipped ' + result.skipped + ' invalid entr' + (result.skipped === 1 ? 'y' : 'ies') + '.' : '');
            } catch (e) {
                message = 'Could not import: the file is not valid JSON.';
            }
            $('#importResult').removeClass('d-none').text(message);
            render();
        };
        reader.readAsText(file);
    });

    $(document).on('click', '.duplicate-recipe', function () {
        var recipe = CustomRecipes.get($(this).closest('tr').data('id'));
        if (!recipe) return;
        var copy = CustomRecipes.normalize(recipe);
        copy.id = null;
        copy.createdAt = null;
        copy.name = (recipe.name + ' (copy)').slice(0, 100);
        CustomRecipes.upsert(copy);
        render();
    });

    $(document).on('click', '.export-recipe', function () {
        var recipe = CustomRecipes.get($(this).closest('tr').data('id'));
        if (!recipe) return;
        CustomRecipes.downloadJson(CustomRecipes.slugify(recipe.name) + '.json', CustomRecipes.exportBundle([recipe]));
    });

    $(document).on('click', '.delete-recipe', function () {
        var recipe = CustomRecipes.get($(this).closest('tr').data('id'));
        if (!recipe) return;
        if (confirm('Delete "' + recipe.name + '"? This cannot be undone (unless you exported it).')) {
            CustomRecipes.remove(recipe.id);
            render();
        }
    });

});

</script>

</body>


</html>
