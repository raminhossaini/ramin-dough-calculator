<?php include "./include/vars.php"; ?>

<!doctype html>
<!--
TODO:
    - Time calculations
    - FAQs section
        - How to make stiff sourdough starter
        - Note on 3% salt value
-->
<head>
    <?php
        //Add analytics code here
        include_once "gtag.txt";
    ?>
    <meta name="author" content="Ramin Hossaini">
	<meta name="description" content="A Sourdough Pizza-dough calculator">
	<meta name="viewport" content="width=device-width">

    <?php include './include/includes.php'; ?>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>

    <title>Ramin's Pizza-dough Calculator</title>
</head>

<body>


<div class="container">
    <?php include './include/navbar.php';?>

    <div class="mb-3">
        <span class="h2 mb-3 font-monospace">Ramin's Sourdough Pizza Recipe</span>
        <a href="<?=GITHUB_ROOT;?>/discussions/4"><span class="badge text-bg-secondary align-text-top">Beta</span></a>
    </div>

    <?php include './include/page-actions.php'; ?>
    
    
    <div class="row">
        
        <!-- Portions -->
        <div class="col-auto w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Portions</span>
            <input type="text" id="inputPortions" class="form-control" aria-label="" value="2">
            <span class="input-group-text">number of balls</span>
            </div>
        </div>

        <!-- Portion size -->
        <div class="col-auto w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Portion Size</span>
            <input type="text" id="inputPortionSize" class="form-control" aria-label="" value="250">
            <span class="input-group-text">g</span>
            </div>
        </div>
        </div>
        <div class="row">
        <!-- Hydration -->
        <div class="col-auto w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Hydration</span>
            <input type="text" id="inputHydration" class="form-control" aria-label="" value="68">
            <span class="input-group-text">%</span>
            </div>
        </div>

        <!-- Sourdough Starter % -->
        <div class="col-auto w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Sourdough Starter %</span>
            <input type="text" id="inputSourdoughPercentage" class="form-control" aria-label="" value="5">
            <span class="input-group-text">%</span>
            </div>
        </div>

        <!-- Salt % -->
        <div class="col-auto w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Salt</span>
            <input type="text" id="inputSaltPercentage" class="form-control" aria-label="" value="3">
            <span class="input-group-text">%</span>
            </div>
        </div>
    </div>

    <!-- Any warning messages come here -->
    <div class="row">
        <div class="col">
            <div class="alert alert-warning" id="hydration-warning" role="alert">
                Please note that I haven't experimented with hydration lower than 65% for this recipe, so I wouldn't personally deviate too much.
            </div>
        </div>
    </div> <!-- row -->



    <div class="row">
    <h4 class="font-monospace">Final Result:</h4>

    <div class="row mb-2 gy-1">
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
                <input type="text" id="totalFlour" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="totalFlour">Total Flour Weight (g)</label>
            </form>
        </div>

        <!-- Total Water -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="totalWater" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="totalWater">Total Water (g)</label>
            </form>
        </div>

    </div> <!-- row -->
    <div class="row gy-1">

        <!-- Total Sourdough Starter -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="totalSourdoughStarter" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="totalSourdoughStarter">Total Starter (g)</label>
            </form>
        </div>

        <!-- Total Salt -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="totalSalt" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="totalSalt">Total Salt (g)</label>
            </form>
        </div>
    </div> <!-- row -->

    <div class="row debug">
        <div class="col">
            <div class="alert alert-warning" id="calculationsCheck" role="alert">
                hello
            </div>
        </div>
    </div> <!-- row -->

    <hr class="mt-3">


    <div class="row mb-2 gy-1">
        <h2 class=" font-monospace">Step 1: Autolyse:</h2>
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputFlour" class="form-control" value="100" aria-describedby="" disabled readonly>
                <label for="inputFlour">Flour (g)</label>
            </form>
        </div>
        
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputWater" class="form-control" value="100" aria-describedby="" disabled readonly>
                <label for="inputWater">Water (g)</label>
            </form>
        </div>

        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputSourdoughStarter" class="form-control" value="6" aria-describedby="" disabled readonly>
                <label for="inputSourdoughStarter">Sourdough Starter (g)</label>
            </form>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-auto">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="autolyse-step1">
                <label class="form-check-label stretched-link" for="autolyse-step1">Add sourdough starter to water and turn on stand mixer</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="autolyse-step2">
                <label class="form-check-label stretched-link" for="autolyse-step2">Add flour little by little until all incorporated (about 10-15 minutes at low speed)</label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="autolyse-step3">
                <label class="form-check-label stretched-link" for="autolyse-step3">Let sit, covered, for 20-30 minutes.</label>
            </li>
            </ul>
        </div>
    </div>

    <div class="row gy-1">
        <h2 class="gy-5 font-monospace">Step 2: Bulk Ferment:</h2>

        <!-- Total Salt -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="inputSalt" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="inputSalt">Total Salt (g)</label>
            </form>
        </div>

        <div class="row gy-1">
            <div class="col">        
                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bulk-ferment-step1">
                        <label class="form-check-label stretched-link" for="bulk-ferment-step1">Start the mixer again, and add the salt little by little until fully incorporated. <br/> The best would be to knead by hand at this point, because you will feel when the salt has been dissolved into the dough.</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bulk-ferment-step2">
                        <label class="form-check-label stretched-link" for="bulk-ferment-step2">Form into balls. Let sit at room temperature, covered for 30 min</label>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row">
        <h2 class="gy-5 font-monospace">Step 3: Cold Proof:</h2>
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="cold-proof-step1">
                <label class="form-check-label stretched-link" for="cold-proof-step1">Transfer to refigerator till day of eating, ideally for the next 48 hours. You can cold ferment for 72 hours too if your flour is strong enough. <br/> If you feel the hydration and fermentation time combination is too sticky, try a lower hydration. <br/> Extended bulk fermentation or cold-fermentation causes enzymatic activity to break down the gluten structure. Highly hydrated doughs can become very loose and sticky over time, making it feel "wetter" and requiring reshaping to maintain tension.</label>
            </li>
            </ul>
        </div>
    </div>

    <div class="row mb-2">
        <h2 class="gy-5 font-monospace">Step 4: On Day of Eating:</h2>
        <div class="row gy-1">
            <div class="col">        

                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bake-day-step1">
                        <label class="form-check-label stretched-link" for="bake-day-step1">6 hours before eating, take out of the refrigerator to reach room temperature. May need more time if room temp is cold.</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bake-day-step2">
                        <label class="form-check-label stretched-link" for="bake-day-step2">Stretch and bake</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bake-step3">
                        <label class="form-check-label stretched-link" for="bake-step3">Target temp: Aim for a center stone temperature of around 400°C to 430°C (750°F - 800°F)</label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <?php include './include/footer.php'; ?>


</div> <!-- container -->

<script>
    var debug = false;

    function setDefaults() {
        $('#inputPortions').val('2');
        $('#inputPortionSize').val('250');
        $('#inputHydration').val('68');
        $('#inputSourdoughPercentage').val('5');
        $('#inputSaltPercentage').val('3');
    }

    function refresh_data()
    {
        var portionSize = parseInt($("#inputPortionSize").val());
        var portions = parseInt($("#inputPortions").val());
        var hydration = parseInt($("#inputHydration").val());
        var sourdoughPercentage = parseFloat($("#inputSourdoughPercentage").val());
        var saltPercentage = parseFloat($("#inputSaltPercentage").val());

        var totalDoughWeight = Math.round( portions * portionSize);                 //Dough weight is PORTIONS * PORTION-SIZE - this is the targer

        var flourWeight = Math.round( totalDoughWeight / ((hydration/100) + (saltPercentage/100) + (sourdoughPercentage/100) +1) );     //Flour weight is TOTAL-DOUGH-WEIGHT / ((HYDRATION / 100) + 1)
        var waterWeight = Math.round((hydration / 100) * flourWeight);              //Water is HYDRATION /100 * flourWeight
        var sourdoughStarterWeight = Math.round((sourdoughPercentage/100) * flourWeight);
        var saltWeight = Math.round( (saltPercentage/100) * flourWeight);


        $("#inputTotalDoughWeight").val(totalDoughWeight); 
        $("#totalFlour").val(flourWeight); 
        $("#totalWater").val(waterWeight);
        $("#totalSourdoughStarter").val(sourdoughStarterWeight); 
        $("#inputFlour").val(flourWeight); 
        $("#inputWater").val(waterWeight); 
        $("#totalSalt").val(saltWeight); 
        $("#inputSalt").val(saltWeight); 
        $("#inputSourdoughStarter").val(sourdoughStarterWeight);

        //hide warnings by default
        $("#hydration-warning").hide();
        $("#calculationsCheck").hide();

        //Show/Hide the Hydration Warning
        if (hydration < 60 || hydration > 75) {
            $("#hydration-warning").show();
        }

        if (debug == true) {
            $("#calculationsCheck").show();

            //do some calulcations and checks
            //add all weights together
            var calc1 = flourWeight + waterWeight + sourdoughStarterWeight + saltWeight;
            var calc2 = totalDoughWeight;
            if (calc1 / calc2 > 0.99) {
                $("#calculationsCheck").text("Value totals are correct");
            }
            else
            {
                $("#calculationsCheck").text("Value totals are not correct: Looking for "+calc2+" but got "+calc1);
            }

            $("#calculationsCheck").append("<p>Salt % is: " + Math.round(saltWeight / flourWeight * 100) + "</p>");
            $("#calculationsCheck").append("<p>Water % is: " + Math.round(waterWeight / flourWeight * 100) + "</p>");
            $("#calculationsCheck").append("<p>Sourdough Starter % is: " + Math.round(sourdoughStarterWeight / flourWeight * 100) + "</p>");
        }

    }

    //Refresh when key is pressed
    $( "input" ).keyup(function() {
        refresh_data();
    });
    $( "input" ).change(function() {
        refresh_data();
    });

    //Initial refresh of numbers when page loads
    $( document ).ready(function() {

        //Reset button
        document.getElementById("reset-button").addEventListener('click', function(e) {
            e.preventDefault();
            clearPageStorage();
            setDefaults();
            refresh_data();
        });

        refresh_data();
    });

</script>


</body>


</html>