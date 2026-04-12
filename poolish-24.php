<?php include "./include/vars.php"; ?>

<!doctype html>

<head>
    <?php
        //Add analytics code here
        include_once "gtag.txt";
    ?>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="A Pizza-dough calculator">
	<meta name="viewport" content="width=device-width">

    <?php include './include/includes.php'; ?>

    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <title>Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">
    <?php include './include/navbar.php';?>
    
    <div class="mb-3">
        <span class="h2 mb-3 font-monospace">Original 24-hour Pizza Dough</span>
        <a href="<?=GITHUB_ROOT;?>/discussions/2"><span class="badge text-bg-secondary align-text-top">Beta</span></a>
    </div>

    <?php include './include/page-actions.php'; ?>

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
        <div class="col-md-2 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Portions</span>
            <input type="text" id="inputPortions" class="form-control" aria-label="" value="2">
            <span class="input-group-text">balls</span>
            </div> <!-- Input group -->
        </div>

        <!-- Portion size -->
        <div class="col-md-3 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Portion Size</span>
            <input type="text" id="inputPortionSize" class="form-control" aria-label="" value="260">
            <span class="input-group-text">g</span>
            </div> <!-- Input group -->
        </div>

        <!-- Hydration -->
        <div class="col-md-2 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Hydration</span>
            <input type="text" id="inputHydration" class="form-control" aria-label="" value="70">
            <span class="input-group-text">%</span>
            </div> <!-- Input group -->
        </div>

        <!-- Poolish Percentage -->
        <div class="col-md-2 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">
                <input class="form-check-input me-2" type="checkbox" role="switch" id="switchPoolishPercentage"> 
                Poolish Percentage
            </span>
            
            <input type="text" id="inputPoolishPercentage" class="form-control" aria-label="" value="70">
            <span class="input-group-text">%</span>
            </div> <!-- Input group -->
        </div>


        <!-- Salt -->
        <div class="col-md-2 w-auto">
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
        <div class="col">
            <div class="alert alert-warning" id="portion-warning" role="alert">
                The poolish amount of 300:300 is ideal for portions up to 12. For more portions, I recommend splitting the recipe in 2 or more!
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
    <h4 class="font-monospace">Final Result:</h4>

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

    <hr class="mt-3">

    <div class="row mb-3">
        <h2 class="font-monospace">Step 1 - Make the poolish:</h2>
        <p class="timeModule" id="labelDateTimeToStart"></p>
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputPoolishFlour" class="form-control" value="100" aria-describedby="" disabled readonly>
                <label for="inputPoolishFlour">Flour (g)</label>
            </form>
        </div>
        
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputPoolishWater" class="form-control" value="100" aria-describedby="" disabled readonly>
                <label for="inputPoolishWater">Water (g)</label>
            </form>
        </div>

        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputPoolishYeast" class="form-control" value="3" aria-describedby="" disabled readonly>
                <label for="inputPoolishYeast">Instant Yeast (g)</label>
            </form>
        </div>

        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputPoolishHoney" class="form-control" value="6" aria-describedby="" disabled readonly>
                <label for="inputPoolishHoney">Honey (g)</label>
            </form>
        </div>
    </div> <!-- row -->

    <div class="row gy-1">
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="poolish-step1">
                <label class="form-check-label stretched-link" for="poolish-step1">Mix and let sit for 1 hour at room temperature.</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="poolish-step2">
                <label class="form-check-label stretched-link" for="poolish-step2">Refrigerate for 16-24 hrs (until the time below, depending on when you started)</label>
            </li>
            </ul>
        </div>
    </div>

    <div class="row mb-3">
        <h2 class="gy-5 font-monospace">Step 2 - Final Mix:</h2>
        <p class="timeModule" id="labelStep2DateTime"></p>

        <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="step2">
                <label class="form-check-label stretched-link" for="step2">Add the following to your fermented poolish, and continue to the final steps</label>
            </li>
        </ul>
    </div>

    <div class="row gy-1">
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputRemainingFlour" class="form-control" value="194" aria-describedby="" disabled readonly>
                <label for="inputRemainingFlour">Flour (g)</label>
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
        <h2 class="gy-5 font-monospace">Final Steps:</h2>
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="final-step1">
                <label class="form-check-label stretched-link" for="final-step1">Mix all together by hand or mixer</label>
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
                <label class="form-check-label stretched-link" for="final-step4"><p>Cover and let rest another 15-20 minutes.</p> <p>Dough will be easier to work with after this period.</p> <p>Dough should be smooth on the surface, bounce back when poked, and pass the windowpane test.</p></label>
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
    </div>

    <?php include './include/footer.php'; ?>

</div> <!-- container -->
</div> <!-- container -->

<script>

function setDefaults() {
    $('#inputDate').val(dayjs().format('YYYY-MM-DD'));
    $('#inputTime').val(dayjs().add(25, 'hour').format('HH:mm'));
    $('#inputPortions').val('2');
    $('#inputPortionSize').val('260');
    $('#inputHydration').val('70');0
    $('#inputPoolishHydration').val('70');
    $('#inputSalt').val('3');
}

function refresh_data() {
    var portionSize = parseInt($("#inputPortionSize").val());
    var portions = parseInt($("#inputPortions").val());
    var hydration = parseInt($("#inputHydration").val());
    var salt = parseFloat($("#inputSalt").val());
    var poolishPercentage = parseInt($("#inputPoolishPercentage").val());

    var totalDoughWeight = Math.round( portions * portionSize );                //Dough weight is PORTIONS * PORTION-SIZE
    var flourWeight = Math.round( totalDoughWeight / ((hydration/100) + (salt/100)+1));     //Flour weight is TOTAL-DOUGH-WEIGHT / ((HYDRATION / 100) + 1)
    var waterWeight = Math.round((hydration / 100) * flourWeight);              //Water is HYDRATION /100 * flourWeight
    var saltWeight = Math.round( (salt / 100) * flourWeight);                   //Salt is 3% of Flour weight

    var poolishAmount = Math.round((poolishPercentage / 100) * flourWeight);               //The total amount of poolish required
    var yeastAmount = Math.round( (1/100) * poolishAmount );     // Yeast is 1% of poolish value
    var honeyAmount = Math.round( (1/100) * poolishAmount );     // Honey is 1% of poolish value

    var poolishPercentageActive = $("#switchPoolishPercentage");

    if (poolishPercentageActive.prop('checked')) {
        // Advanced method
        $("#portion-warning").hide();

        $("#inputPoolishPercentage").prop('disabled', false);

        $("#inputPoolishFlour").val(poolishAmount / 2); //Our standard poolish proportion is 1:1 water:flour
        $("#inputPoolishWater").val(poolishAmount / 2);
        $("#inputPoolishYeast").val(yeastAmount);               
        $("#inputPoolishHoney").val(honeyAmount);
    }
    else {
        // Simple method
        $("#inputPoolishPercentage").prop('disabled', true);

        //Show a warning if making more than 12 portions
        if (portions > 12) {
            $("#portion-warning").show();	
        }
        else {
            $("#portion-warning").hide();
        }

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
    }

    var poolishFlourWeight = parseInt($("#inputPoolishFlour").val());
    var poolishWaterWeight = parseInt($("#inputPoolishWater").val());
    var poolishYeastWeight = parseInt($("#inputPoolishYeast").val());

    // Time calculations. Working backwards from time to eat
    var dateTimeString = $("#inputDate").val() + " " + $("#inputTime").val();
    var eatDateTime = dayjs(dateTimeString);

    //work backwards
    // The last steps should be started 2-3 hours before the eating time
    var step2DateTime = dayjs(eatDateTime).subtract(2, 'hour');
    var step2StartTime = dayjs(step2DateTime).format("ddd, DD-MMM-YYYY HH:mm");
    
    var step2EarliestDateTime = dayjs(eatDateTime).subtract(3, 'hour');
    var step2EarliestStartTime = dayjs(step2EarliestDateTime).format("ddd, DD-MMM-YYYY HH:mm");

    $("#labelStep2DateTime").html("<i class='bi bi-clock'></i> Recommended time to start: <b>" + step2EarliestStartTime + "</b> and <b>" + step2StartTime + "</b>");

    //Next step is to calculate the 16 + 1 hour ferment
    var latestStartDateTime = dayjs(eatDateTime).subtract(17+3, 'hour').format("ddd, DD-MMM-YYYY HH:mm");

    //And lastly the longest ferment of 24 + 1 hours
    var earliestStartDateTime = dayjs(eatDateTime).subtract(25+3, 'hour').format("ddd, DD-MMM-YYYY HH:mm");

    //set date & time to start
    $("#labelDateTimeToStart").html("<i class='bi bi-clock'></i> Recommended time to start: Between <b>" + earliestStartDateTime + "</b> and <b>" + latestStartDateTime + "</b>");

    var remainingFlour = Math.round( flourWeight - poolishFlourWeight );
    var remainingWater = Math.round( waterWeight - poolishWaterWeight );
    var remainingSalt = Math.round( saltWeight );

    $("#inputTotalDoughWeight").val(totalDoughWeight); 
    $("#inputFlour").val(flourWeight); 
    $("#inputWater").val(waterWeight); 
    $("#inputSaltAmount").val(saltWeight); 
    $("#inputRemainingFlour").val(remainingFlour);
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

    var datePicker = $("#inputDate").flatpickr({
        minDate: "today"
    });

    var timePicker = $("#inputTime").flatpickr({
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    //Reset button
    document.getElementById("reset-button").addEventListener('click', function(e) {
        e.preventDefault();
        clearPageStorage();
        setDefaults();
        datePicker.setDate(dayjs().toDate(), false);
        timePicker.setDate(dayjs().add(25, 'hour').toDate(), false);
        refresh_data();
    });

    refresh_data();

});

</script>


</body>


</html>