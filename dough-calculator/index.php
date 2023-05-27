<!doctype html>

<head>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="A Pizza-dough calculator">
	<meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <title>Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">

<nav class="navbar navbar-dark bg-primary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dough-calculator/">Ramin's Pizza-dough calculator</a>
        <span class="navbar-text">Version 1.0.220601</span>

    </div>
</nav>

<div class="row g-3 align-items-center">
  
    <!-- Portions -->
    <div class="col-auto">
        <div class="input-group mb-3">
        <span class="input-group-text">Portions</span>
        <input type="text" id="inputPortions" class="form-control" aria-label="" value="2">
        <span class="input-group-text">number of balls</span>
        </div>
    </div>

    <!-- Portion size -->
    <div class="col-auto">

        <div class="input-group mb-3">
        <span class="input-group-text">Portion Size</span>
        <input type="text" id="inputPortionSize" class="form-control" aria-label="" value="250">
        <span class="input-group-text">g</span>
        </div>

    </div>

    <!-- Hydration -->
    <div class="col-auto">
        <div class="input-group mb-3">
        <span class="input-group-text">Hydration</span>
        <input type="text" id="inputHydration" class="form-control" aria-label="" value="70">
        <span class="input-group-text">%</span>
    </div>


</div>


<div class="row mt-3">


    <!-- Total Dough Weight -->
    <div class="col-auto">
        <label for="inputTotalDoughWeight" class="col-form-label">Total Dough Weight</label>
        <input type="text" id="inputTotalDoughWeight" class="form-control" value="500" aria-describedby="" disabled readonly>
    </div>

    <!-- Total Flour Weight -->
    <div class="col-auto">
        <label for="inputFlour" class="col-form-label">Total Flour Weight</label>
        <input type="text" id="inputFlour" class="form-control" value="294" aria-describedby="" disabled readonly>
    </div>

    <!-- Total Water -->
    <div class="col-auto">
        <label for="inputWater" class="col-form-label">Total Water Weight</label>
        <input type="text" id="inputWater" class="form-control" value="206" aria-describedby="" disabled readonly>
    </div>

    <!-- Total Salt -->
    <div class="col-auto">
        <label for="inputSalt" class="col-form-label">Total Salt Weight</label>
        <input type="text" id="inputSalt" class="form-control" value="9" aria-describedby="" disabled readonly>
    </div>
</div>

<h2 class="mt-3">Step 1:</h2>

<div class="row">
    <div class="col-auto">
        <label for="inputPoolishFlour" class="col-form-label">Poolish Flour Weight</label>
        <input type="text" id="inputPoolishFlour" class="form-control" value="100" aria-describedby="" disabled readonly>
    </div>
    <div class="col-auto">
        <label for="inputPoolishWater" class="col-form-label">Poolish Water Weight</label>
        <input type="text" id="inputPoolishWater" class="form-control" value="100" aria-describedby="" disabled readonly>
    </div>
    <div class="col-auto">
        <label for="inputPoolishYeast" class="col-form-label">Poolish Yeast Weight</label>
        <input type="text" id="inputPoolishYeast" class="form-control" value="3" aria-describedby="" disabled readonly>
    </div>
    <div class="col-auto">
        <label for="inputPoolishHoney" class="col-form-label">Poolish Honey Weight</label>
        <input type="text" id="inputPoolishHoney" class="form-control" value="6" aria-describedby="" disabled readonly>
    </div>

</div>

<ul>
    <li>Mix and let sit for 1 hour</li>
    <li>Refrigerate for 16-24 hrs</li>
</ul>


<h2 class="mt-3">Step 2:</h2>

<div class="row">
    <div class="col-auto">
        <label for="inputRemainingFlour" class="col-form-label">Remaining Flour Weight</label>
        <input type="text" id="inputRemainingFlour" class="form-control" value="194" aria-describedby="" disabled readonly>
    </div>
    <div class="col-auto">
        <label for="inputRemainingWater" class="col-form-label">Remaining Water Weight</label>
        <input type="text" id="inputRemainingWater" class="form-control" value="106" aria-describedby="" disabled readonly>
    </div>
    <div class="col-auto">
        <label for="inputRemainingSalt" class="col-form-label">Poolish Salt Weight</label>
        <input type="text" id="inputRemainingSalt" class="form-control" value="9" aria-describedby="" disabled readonly>
    </div>
</div>

<h2 class="mt-3">Final Steps:</h2>
<ul>
    <li>Mix all together</li>
    <li>Cover and let rest for 20-30 minutes (autolyse)</li>
    <li>Knead dough and form into ball. Don't worry if dough is still sticky at this stage.</li>
    <li>Cover and let rest another 15-20 minutes. Dough will be easier to work with after this period. Dough should be smooth on the surface, bounce back when poked, and pass the <a href="https://www.kingarthurbaking.com/blog/2022/10/14/what-is-the-windowpane-test-for-bread-dough">windowpane test</a>.</li>
    <li>Split by portion weight and form into balls</li>
    <li>Place on tray and cover with cling-film or cover container with lid. Let rest 1 - 2 hours until dough doubles in size. This could vary depending on your room temperature.</li>
    <li>Form pizza bases and bake!</li>
</ul>

</div>

<script>

$( "input" ).keyup(function() {
    var portionSize = parseInt($("#inputPortionSize").val());
    var portions = parseInt($("#inputPortions").val());
    var hydration = parseInt($("#inputHydration").val());
    
    var totalDoughWeight = Math.round( portions * portionSize );                //Dough weight is PORTIONS * PORTION-SIZE
    var flourWeight = Math.round( totalDoughWeight / ((hydration/100)+1) );     //Flour weight is TOTAL-DOUGH-WEIGHT / ((HYDRATION / 100) + 1)
    var waterWeight = Math.round((hydration / 100) * flourWeight);              //Water is HYDRATION /100 * flourWeight
    var saltWeight = Math.round( 0.03 * flourWeight);                           //Salt is 3% of Flour weight


    $("#inputTotalDoughWeight").val(totalDoughWeight); 
    $("#inputFlour").val(flourWeight); 
    $("#inputWater").val(waterWeight); 
    $("#inputSalt").val(saltWeight); 

    if (waterWeight < 401) {
        $("#inputPoolishFlour").val("100");
        $("#inputPoolishWater").val("100");
        $("#inputPoolishYeast").val("3");
        $("#inputPoolishHoney").val("2");
    }
    else if (waterWeight > 400 && waterWeight < 2501) {
        $("#inputPoolishFlour").val("300");
        $("#inputPoolishWater").val("300");
        $("#inputPoolishYeast").val("6");
        $("#inputPoolishHoney").val("6");
    }

    var poolishFlourWeight = parseInt($("#inputPoolishFlour").val());
    var poolishWaterWeight = parseInt($("#inputPoolishWater").val());
    var poolishYeastWeight = parseInt($("#inputPoolishYeast").val());

    var remainingFlour = Math.round( flourWeight - poolishFlourWeight );
    var remainingWater = Math.round( waterWeight - poolishWaterWeight );
    var remainingSalt = Math.round( saltWeight );

    $("#inputRemainingFlour").val(remainingFlour);
    $("#inputRemainingWater").val(remainingWater);
    $("#inputRemainingSalt").val(remainingSalt);


});

</script>


</body>


</html>
