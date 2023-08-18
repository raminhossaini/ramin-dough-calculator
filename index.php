<!doctype html>

<head>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="A Pizza-dough calculator">
	<meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <title>Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">

<nav class="navbar navbar-dark bg-primary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dough-calculator/">Ramin's Pizza-dough calculator</a>
        <span class="navbar-text">Version 1.0.230818</span>

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

	<div class="alert alert-warning" id="portion-warning" role="alert">
	  The poolish amount of 300:300 is ideal for portions up to 12. For more portions, I recommend splitting the recipe in 2 or more!
	</div>

    <!-- Total Dough Weight -->
    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputTotalDoughWeight" class="form-control" value="" aria-describedby="" disabled readonly>
            <label for="inputTotalDoughWeight" class="col-form-label">Total Dough Weight (g)</label>
        </form>

    </div>

    <!-- Total Flour Weight -->
    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputFlour" class="form-control" value="" aria-describedby="" disabled readonly>
            <label for="inputFlour">Total Flour Weight (g)</label>
        </form>
    </div>

    <!-- Total Water -->
    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputWater" class="form-control" value="" aria-describedby="" disabled readonly>
            <label for="inputWater">Total Water (g)</label>
        </form>
    </div>

    <!-- Total Salt -->
    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputSalt" class="form-control" value="" aria-describedby="" disabled readonly>
            <label for="inputSalt">Total Salt (g)</label>
        </form>
    </div>

</div>

<h2 class="mt-3">Step 1:</h2>

<div class="row">
    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputPoolishFlour" class="form-control" value="100" aria-describedby="" disabled readonly>
            <label for="inputPoolishFlour">Poolish Flour (g)</label>
        </form>
    </div>
    
    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputPoolishWater" class="form-control" value="100" aria-describedby="" disabled readonly>
            <label for="inputPoolishWater">Poolish Water (g)</label>
        </form>
    </div>

    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputPoolishYeast" class="form-control" value="3" aria-describedby="" disabled readonly>
            <label for="inputPoolishYeast">Poolish Instant Yeast (g)</label>
        </form>
    </div>

    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputPoolishHoney" class="form-control" value="6" aria-describedby="" disabled readonly>
            <label for="inputPoolishHoney">Poolish Honey (g)</label>
        </form>
    </div>

</div>

<ul class="list-group">
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="poolish-step1">
    <label class="form-check-label stretched-link" for="poolish-step1">Mix and let sit for 1 hour at room temperature.</label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="poolish-step2">
    <label class="form-check-label stretched-link" for="poolish-step2">Refrigerate for 16-24 hrs.</label>
  </li>
</ul>


<h2 class="mt-3">Step 2:</h2>
<div class="row">

    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputRemainingFlour" class="form-control" value="194" aria-describedby="" disabled readonly>
            <label for="inputRemainingFlour">Remaining Flour (g)</label>
        </form>
    </div>

    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputRemainingWater" class="form-control" value="106" aria-describedby="" disabled readonly>
            <label for="inputRemainingWater">Remaining Water (g)</label>
        </form>
    </div>

    <div class="col-auto">
        <form class="form-floating">
            <input type="text" id="inputRemainingSalt" class="form-control" value="9" aria-describedby="" disabled readonly>
            <label for="inputRemainingSalt">Poolish Salt (g)</label>
        </form>
    </div>

</div>

<h2 class="mt-3">Final Steps:</h2>

<ul class="list-group">
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="final-step1">
    <label class="form-check-label stretched-link" for="final-step1">Mix all together</label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="final-step2">
    <label class="form-check-label stretched-link" for="final-step2">Cover and let rest for 20-30 minutes (autolyse)</label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="final-step3">
    <label class="form-check-label stretched-link" for="final-step3">Knead dough and form into ball. Don't worry if dough is still sticky at this stage.</label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="final-step4">
    <label class="form-check-label stretched-link" for="final-step4"><p>Cover and let rest another 15-20 minutes.</p> <p>Dough will be easier to work with after this period.</p> <p>Dough should be smooth on the surface, bounce back when poked, and pass the <a href="https://www.kingarthurbaking.com/blog/2022/10/14/what-is-the-windowpane-test-for-bread-dough">windowpane test</a>.</p></label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="final-step5">
    <label class="form-check-label stretched-link" for="final-step5">Split by portion weight and form into balls</label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="final-step6">
    <label class="form-check-label stretched-link" for="final-step6"><p>Place on tray and cover with cling-film or cover container with lid.</p> <p>Let rest 1 - 2 hours until dough doubles in size.</p> <p>This could vary depending on your room temperature.</p></label>
  </li>
  <li class="list-group-item">
    <input class="form-check-input me-1" type="checkbox" value="" id="final-step7">
    <label class="form-check-label stretched-link" for="final-step7">Form pizza bases and bake!</label>
  </li>

</ul>

</div>

<script>

function refresh_data() {
    var portionSize = parseInt($("#inputPortionSize").val());
    var portions = parseInt($("#inputPortions").val());
    var hydration = parseInt($("#inputHydration").val());
    
    var totalDoughWeight = Math.round( portions * portionSize );                //Dough weight is PORTIONS * PORTION-SIZE
    var flourWeight = Math.round( totalDoughWeight / ((hydration/100)+1) );     //Flour weight is TOTAL-DOUGH-WEIGHT / ((HYDRATION / 100) + 1)
    var waterWeight = Math.round((hydration / 100) * flourWeight);              //Water is HYDRATION /100 * flourWeight
    var saltWeight = Math.round( 0.03 * flourWeight);                           //Salt is 3% of Flour weight

	if (portions > 12) {
		$("#portion-warning").show();	
	}
	else {
		$("#portion-warning").hide();
	}

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

}

//Refresh when key is pressed
$( "input" ).keyup(function() {
    refresh_data();
});

//Initial refresh of numbers when page loads
$( document ).ready(function() {
    refresh_data();
});

</script>


</body>


</html>
