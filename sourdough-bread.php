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

    <h2 class="font-monospace">Generic Sourdough Bread Calculator</h2>
    <?php include './include/page-actions.php'; ?>

    </div>

    <div class="container">
    <div class="row">
        <!-- Sourdough Starter Amount -->
        <div class="col-md-2 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Sourdough Starter</span>
            <input type="text" id="inputSourdoughStarter" class="form-control" aria-label="" value="80">
            <span class="input-group-text">g</span>
            </div> <!-- Input group -->
        </div>

        <!-- Sourdough starter hydration  -->
        <div class="col-md-3 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Sourdough Starter Hydration</span>
            <input type="text" id="inputSourdoughHydration" class="form-control" aria-label="" value="100">
            <span class="input-group-text">%</span>
            </div> <!-- Input group -->
        </div>

        <!-- Target Hydration -->
        <div class="col-md-2 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Target Hydration</span>
            <input type="text" id="inputTargetHydration" class="form-control" aria-label="" value="75">
            <span class="input-group-text">%</span>
            </div> <!-- Input group -->
        </div>

        <!-- Flour Amount -->
        <div class="col-md-2 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Target Total Weight</span>
            <input type="text" id="inputTotalWeight" class="form-control" aria-label="" value="900">
            <span class="input-group-text">g</span>
            </div> <!-- Input group -->
        </div>

        <!-- Salt Percentage -->
        <div class="col-md-2 w-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Salt</span>
            <input type="text" id="inputSalt" class="form-control" aria-label="" value="2">
            <span class="input-group-text">%</span>
            </div> <!-- Input group -->
        </div>

    </div>
    </div>

    <div class="container">
 
    <div class="row gy-1">
    <h2 class="font-monospace">Final Result:</h2>

        <h4 class="font-monospace">Starter Amounts:</h2>

        <!-- Total sourdough flour -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="outputSourdoughFlour" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="outputSourdoughFlour" class="col-form-label">Starter flour</label>
            </form>
        </div>

        <!-- Total sourdough water -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="outputSourdoughWater" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="outputSourdoughWater" class="col-form-label">Starter Water</label>
            </form>
        </div>


        <h4 class="font-monospace">Dough Amounts:</h2>

        <!-- Total Flour Weight -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="outputFlour" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="outputFlour">Flour Weight</label>
            </form>
        </div>

        <!-- Total Water -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="outputWater" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="outputWater">Water</label>
            </form>
        </div>

        <!-- Total Salt -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="outputSaltAmount" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="outputSaltAmount">Total Salt</label>
            </form>
        </div>

        <!-- Total Dough Weight -->
        <div class="col-auto">
            <form class="form-floating font-monospace">
                <input type="text" id="outputTotalDoughWeight" class="form-control" value="" aria-describedby="" disabled readonly>
                <label for="outputTotalDoughWeight" class="col-form-label">Total Dough Weight</label>
            </form>
        </div>


    <div class="row">
        <h2 class="gy-5 font-monospace">Steps:</h2>
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="final-step1">
                <label class="form-check-label stretched-link" id="final-step1-label" for="final-step1"></label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="final-step2">
                <label class="form-check-label stretched-link" id="final-step2-label" for="final-step2"></label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="final-step3">
                <label class="form-check-label stretched-link" id="final-step3-label" for="final-step3"></label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="final-step4">
                <label class="form-check-label stretched-link" id="final-step4-label" for="final-step4"></label>
            </li>
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="final-step5">
                <label class="form-check-label stretched-link" id="final-step5-label" for="final-step4"></label>
            </li>
            </ul>
        </div>
    </div>





        <div class="row mb-4">
            
        </div>

    </div> <!-- row -->

    <?php include './include/footer.php'; ?>

</div> <!-- container -->
</div> <!-- container -->

<script>

function setDefaults() {
    $('#inputSourdoughStarter').val('80');
    $('#inputSourdoughHydration').val('100');
    $('#inputTargetHydration').val('75');
    $('#inputTotalWeight').val('900');
    $('#inputSalt').val('2');
}

function roundToDecimalPlaces(num, decimalPlaces) {
  const factor = Math.pow(10, decimalPlaces);
  return Math.round(num * factor) / factor;
}

function refresh_data() {
/*
    var outputSourdoughFlour = parseInt($("#outputSourdoughFlour").val()); 
    var outputSourdoughWater = parseInt($("#outputSourdoughWater").val());
    var outputTotalDoughWeight = parseInt($("#outputTotalDoughWeight").val());
    var outputFlour = parseInt($("#outputFlour").val());
    var outputWater = parseInt($("#outputWater").val());
    var outputSaltAmount = parseInt($("#outputSaltAmount").val());
*/
    var inputTotalWeight = parseFloat($("#inputTotalWeight").val());
    var inputSourdoughStarter = parseFloat($("#inputSourdoughStarter").val());
    var inputSourdoughHydration = parseFloat($("#inputSourdoughHydration").val());
    var inputTargetHydration = parseFloat($("#inputTargetHydration").val());
    var inputSalt = parseFloat($("#inputSalt").val());

    // Flour and water inside the starter
    var outputSourdoughFlour = inputSourdoughStarter / (1 + inputSourdoughHydration / 100);
    var outputSourdoughWater = inputSourdoughStarter - outputSourdoughFlour;

    // Baker's percentage: totalWeight = totalFlour * (1 + hydration% + salt%)
    var totalFlour = inputTotalWeight / (1 + inputTargetHydration / 100 + inputSalt / 100);

    // Flour to add = total flour minus the flour already in the starter
    var outputFlour = totalFlour - outputSourdoughFlour;

    // Water to add = total water minus the water already in the starter
    var totalWater = totalFlour * (inputTargetHydration / 100);
    var outputWater = totalWater - outputSourdoughWater;

    // Salt is a percentage of total flour
    var outputSalt = totalFlour * (inputSalt / 100);

    $("#outputSourdoughFlour").val(roundToDecimalPlaces(outputSourdoughFlour, 1) + " g");
    $("#outputSourdoughWater").val(roundToDecimalPlaces(outputSourdoughWater, 1) + " g");
    $("#outputFlour").val(Math.round(outputFlour) + " g");
    $("#outputWater").val(Math.round(outputWater) + " g");
    $("#outputSaltAmount").val(roundToDecimalPlaces(outputSalt, 1) + " g");
    $("#outputTotalDoughWeight").val(inputTotalWeight + " g");

    //labels
    $("#final-step1-label").text("Add " + Math.round(outputWater) + "g water");
    $("#final-step2-label").text("Add " + Math.round(outputFlour) + "g flour.");
    $("#final-step3-label").text("Allow to autolyse for 30 min");
    $("#final-step4-label").text("Add " + inputSourdoughStarter + "g sourdough starter");
    $("#final-step5-label").text("Add " + roundToDecimalPlaces(outputSalt, 1) + "g salt");

    // Verify totals sum to target weight
    console.log("Starter: " + inputSourdoughStarter + "g");
    console.log("Flour to add: " + Math.round(outputFlour) + "g (total flour: " + roundToDecimalPlaces(totalFlour, 1) + "g)");
    console.log("Water to add: " + Math.round(outputWater) + "g (total water: " + roundToDecimalPlaces(totalWater, 1) + "g)");
    console.log("Salt: " + roundToDecimalPlaces(outputSalt, 1) + "g");
    console.log("Sum: " + (outputFlour + outputWater + outputSalt + inputSourdoughStarter) + "g (target: " + inputTotalWeight + "g)");
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