<!doctype html>

<head>
    <?php
        //Add analytics code here
        include_once "gtag.txt";
    ?>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="A Pizza-dough calculator">
	<meta name="viewport" content="width=device-width">

    <link rel="shortcut icon" type="image/png" href="favicon.png"/>

    <!-- Bootstrap https://getbootstrap.com/docs/5.3/getting-started/introduction/ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Jquery https://jquery.com/ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 

    <!-- Flatpickr https://flatpickr.js.org/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- dayJS  https://day.js.org/en/ -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script>dayjs().format()</script>

    <title>Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">
    <?php include './include/navbar.php';?>

    <h2>Original 24-hour 100% Biga Recipe</h2>

    <!-- DateTime Picker -->
    <div class="row g-3 align-items-center timeModule mb-3">
        <div class="col-auto">
            <div class="input-group">
                <span class="input-group-text">Planned Date to Eat</span>
                <input type="text" id="inputDate" class="form-control" aria-label="" value="<?=date("Y-m-d");?>">
                <span class="input-group-text"><i class='bi bi-calendar-week'></i></span>
            </div>
        </div>
        <div class="col-auto">
            <div class="input-group">
                <span class="input-group-text">Time</i></span>
                <input type="text" id="inputTime" class="form-control" aria-label="" value="<?=date("H")+25;?>">
                <span class="input-group-text"><i class='bi bi-clock'></i></span>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
    <div class="row">
        <!-- Portions -->
        <div class="col-md-2">
            <div class="input-group mb-3">
            <span class="input-group-text">Portions</span>
            <input type="text" id="inputPortions" class="form-control" aria-label="" value="2">
            <span class="input-group-text">balls</span>
            </div> <!-- Input group -->
        </div>

        <!-- Portion size -->
        <div class="col-md-3">
            <div class="input-group mb-3">
            <span class="input-group-text">Portion Size</span>
            <input type="text" id="inputPortionSize" class="form-control" aria-label="" value="260">
            <span class="input-group-text">g</span>
            </div> <!-- Input group -->
        </div>

        <!-- Hydration -->
        <div class="col-md-2">
            <div class="input-group mb-3">
            <span class="input-group-text">Hydration</span>
            <input type="text" id="inputHydration" class="form-control" aria-label="" value="70">
            <span class="input-group-text">%</span>
            </div> <!-- Input group -->
        </div>

        <!-- Salt -->
        <div class="col-md-2">
            <div class="input-group mb-3">
            <span class="input-group-text">Salt</span>
            <input type="text" id="inputSalt" class="form-control" aria-label="" value="3">
            <span class="input-group-text">%</span>
            </div> <!-- Input group -->
        </div>
    </div>
    </div>

    <div class="container">
 
    <div class="row">
    <h2 class="">Final Result:</h2>

        <!-- Total Dough Weight -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputTotalDoughWeight" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="inputTotalDoughWeight" class="col-form-label">Total Dough Weight (g)</label>
            </form>

        </div>

        <!-- Total Flour Weight -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputFlour" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="inputFlour">Total Flour Weight (g)</label>
            </form>
        </div>

        <!-- Total Water -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputWater" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="inputWater">Total Water (g)</label>
            </form>
        </div>

        <!-- Total Salt -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputSaltAmount" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="inputSaltAmount">Total Salt (g)</label>
            </form>
        </div>

    </div> <!-- row -->


    <div class="row mb-3">
        <h2 class="gy-5">Step 1 - Make the biga pre-ferment:</h2>
        <p class="timeModule" id="labelDateTimeToStartBiga"></p>
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputBigaFlour" class="form-control" value="100" aria-describedby="" disabled readonly>
                <label for="inputBigaFlour">Flour (g)</label>
            </form>
        </div>
        
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputBigaWater" class="form-control" value="100" aria-describedby="" disabled readonly>
                <label for="inputBigaWater">Water (g)</label>
            </form>
        </div>

        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputBigaYeast" class="form-control" value="3" aria-describedby="" disabled readonly>
                <label for="inputBigaYeast">Instant Yeast (g)</label>
            </form>
        </div>

    </div> <!-- row -->

    <div class="row gy-1">
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="biga-step1">
                <label class="form-check-label stretched-link" for="biga-step1">Shake/mix thoroughly in airtight container.</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="biga-step2">
                <label class="form-check-label stretched-link" for="biga-step2">Refrigerate for 16-24 hrs (until the time below, depending on when you started)</label>
            </li>
            </ul>
        </div>
    </div>

    <div class="row mb-3">
        <h2 class="gy-5">Step 2 - Final Mix:</h2>
        <p class="timeModule" id="labelStepFinalMixDateTime"></p>

        <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="step2-1">
                <label class="form-check-label stretched-link" for="step2-1">Dissolve salt in water</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="step2-2">
                <label class="form-check-label stretched-link" for="step2-2">Add remaining yeast and slowly add water+salt solution to the fermented biga, and continue to the final steps</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="step2-3">
                <label class="form-check-label stretched-link" for="step2-3">Mix all together in mixer (thoroughly). Form into ball.</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="step2-4">
                <label class="form-check-label stretched-link" for="step2-4">Leave at room temperature for 30 min.</label>
            </li>
        </ul>
    </div>

    <div class="row gy-1">
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputRemainingYeast" class="form-control" value="194" aria-describedby="" disabled readonly>
                <label for="inputRemainingFlour">Yeast (g)</label>
            </form>
        </div>

        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputRemainingWater" class="form-control" value="106" aria-describedby="" disabled readonly>
                <label for="inputRemainingWater">Water (g)</label>
            </form>
        </div>

        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputRemainingSalt" class="form-control" value="9" aria-describedby="" disabled readonly>
                <label for="inputRemainingSalt">Salt (g)</label>
            </form>
        </div>
    </div> <!-- row -->


    <div class="row">
        <h2 class="gy-5">Step 3 - Final Proof</h2>
        <p class="timeModule" id="labelDateTimeLastFermentation"></p>
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="LastFermentation-step3">
                <label class="form-check-label stretched-link" for="LastFermentation-step3">Split by portion weight and form into balls</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="LastFermentation-step4">
                <label class="form-check-label stretched-link" for="LastFermentation-step4"><p>Cover let rest another 2-4 hours</p> <p>Dough should be smooth on the surface, bounce back when poked, and pass the windowpane test.</p></label>
            </li>
            </ul>
        </div>
    </div>


    <div class="row">
        <h2 class="gy-5">Step 4 - Prepare and bake</h2>
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="bake-step1">
                <label class="form-check-label stretched-link" for="bake-step1">Form pizza bases and bake!</label>
            </li>
            </ul>
        </div>
    </div>



    <?php include './include/footer.php'; ?>

</div> <!-- container -->
</div> <!-- container -->

<script>

function roundToDecimalPlaces(num, decimalPlaces) {
  const factor = Math.pow(10, decimalPlaces);
  return Math.round(num * factor) / factor;
}

function refresh_data() {
    var portionSize = parseInt($("#inputPortionSize").val());
    var portions = parseInt($("#inputPortions").val());
    var hydration = parseInt($("#inputHydration").val());
    var salt = parseFloat($("#inputSalt").val());

    var totalDoughWeight = Math.round( portions * portionSize );                //Dough weight is PORTIONS * PORTION-SIZE
    var flourWeight = Math.round( totalDoughWeight / ((hydration/100) + (salt/100)+1));     //Flour weight is TOTAL-DOUGH-WEIGHT / ((HYDRATION / 100) + 1)
    var waterWeight = Math.round((hydration / 100) * flourWeight);              //Water is HYDRATION /100 * flourWeight
    var saltWeight = Math.round( (salt / 100) * flourWeight);                   //Salt is 3% of Flour weight


    // Time calculations. Working backwards from time to eat
    var dateTimeString = $("#inputDate").val() + " " + $("#inputTime").val();
    var eatDateTime = dayjs(dateTimeString);

    //work backwards
    //1. labelDateTimeToStartBiga
    //2. labelStepFinalMixDateTime
    //3. labelDateTimeToStartBake

    var labelDateTimeToStartBakeEarliest = dayjs(eatDateTime).subtract(4, 'hour').format("ddd, DD-MMM-YYYY HH:mm");
    var labelDateTimeToStartBakeLatest = dayjs(eatDateTime).subtract(2, 'hour').format("ddd, DD-MMM-YYYY HH:mm");

    //var labelDateTimeToStartFinalSteps;
    var labelStepFinalMixDateTimeEarliest = dayjs(labelDateTimeToStartBakeEarliest).subtract(1, 'hour').format("ddd, DD-MMM-YYYY HH:mm");;
    var labelStepFinalMixDateTimeLatest = dayjs(labelDateTimeToStartBakeLatest).subtract(1, 'hour').format("ddd, DD-MMM-YYYY HH:mm");;

    var labelDateTimeToStartBigaEarliest = dayjs(labelStepFinalMixDateTimeEarliest).subtract(24, 'hour').format("ddd, DD-MMM-YYYY HH:mm");   //24 hours before
    var labelDateTimeToStartBigaLatest = dayjs(labelStepFinalMixDateTimeLatest).subtract(16, 'hour').format("ddd, DD-MMM-YYYY HH:mm");   //24 hours before


    $("#labelDateTimeLastFermentation").html("<i class='bi bi-clock'></i> Recommended time to start: Between <b>" + labelDateTimeToStartBakeEarliest + "</b> and <b>" + labelDateTimeToStartBakeLatest + "</b>");
    $("#labelStepFinalMixDateTime").html("<i class='bi bi-clock'></i> Recommended time to start: <b>" + labelStepFinalMixDateTimeEarliest + "</b> and <b>" + labelStepFinalMixDateTimeLatest + "</b>");
    $("#labelDateTimeToStartBiga").html("<i class='bi bi-clock'></i> Recommended time to start: Between <b>" + labelDateTimeToStartBigaEarliest + "</b> and <b>" + labelDateTimeToStartBigaLatest + "</b>");



    var firstYeast = roundToDecimalPlaces( (0.5/100*flourWeight)*0.6,2)
    var secondYeast = roundToDecimalPlaces( (0.5/100*flourWeight)*0.4,2)


    $("#inputTotalDoughWeight").val(totalDoughWeight); 
    $("#inputFlour").val(flourWeight); 
    $("#inputWater").val(waterWeight); 
    $("#inputSaltAmount").val(saltWeight); 

    $("#inputBigaFlour").val(flourWeight);
    $("#inputBigaWater").val(flourWeight/2);
    $("#inputBigaYeast").val(firstYeast);

    var bigaFlourWeight = parseInt($("#inputBigaFlour").val());
    var bigaWaterWeight = parseInt($("#inputBigaWater").val());
    var bigaYeastWeight = parseInt($("#inputBigaYeast").val());

    var remainingFlour = Math.round( flourWeight - bigaFlourWeight );
    var remainingWater = Math.round( waterWeight - bigaWaterWeight );
    var remainingSalt = Math.round( saltWeight );

    $("#inputRemainingYeast").val(secondYeast);
    $("#inputRemainingWater").val(remainingWater);
    $("#inputRemainingSalt").val(remainingSalt);

}

//Refresh when key is pressed
$( "input" ).keyup(function() {
    refresh_data();
});
$( "input" ).change(function() {
    refresh_data();
});

$("#toggleTime").click(function () {
    $(".timeModule").toggle();
});

//Initial refresh of numbers when page loads
$( document ).ready(function() {

    //Print button
    const printButton = document.getElementById("print-button");
    printButton.addEventListener('click', function() {
        window.print();
    });

    $("#inputDate").flatpickr({
        minDate: "today"
    });

    $("#inputTime").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    refresh_data();
    
});

</script>


</body>


</html>