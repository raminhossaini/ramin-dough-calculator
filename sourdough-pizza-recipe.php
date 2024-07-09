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

    <h1>Ramin's Sourdough Pizza Recipe</h1>
    <div class="row">
        <div class="col">
            <div class="alert alert-warning" id="BETA-WARNING" role="alert">
                This is a recipe I have been experimenting with for while now. It is still in its early stages and might not be perfect. Treat it as such.
            </div>
        </div>
    </div> <!-- row -->
    
    <div class="row">
        
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
        </div>
        <div class="row">
        <!-- Hydration -->
        <div class="col-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Hydration</span>
            <input type="text" id="inputHydration" class="form-control" aria-label="" value="70">
            <span class="input-group-text">%</span>
            </div>
        </div>

        <!-- Sourdough Starter % -->
        <div class="col-auto">
            <div class="input-group mb-3">
            <span class="input-group-text">Sourdough Starter %</span>
            <input type="text" id="inputSourdoughPercentage" class="form-control" aria-label="" value="5">
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
    <h2 class="">Final Result:</h2>

    <div class="row mb-2">
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
    <div class="row">

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




    <div class="row mb-2">
        <h2 class="gy-5">Autolyse:</h2>
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
                <label class="form-check-label stretched-link" for="autolyse-step2">Let sit, covered, for 20-30 minutes.</label>
            </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <h2 class="gy-5">Bulk Ferment:</h2>

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
                        <label class="form-check-label stretched-link" for="bulk-ferment-step1">Start the mixer again, and add the salt little by little until fully incorporated.</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bulk-ferment-step2">
                        <label class="form-check-label stretched-link" for="bulk-ferment-step2">Let sit at room temperature for 2-3 hours if warm, 5-6 hours if cooler</label>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row">
        <h2 class="gy-5">Cold Proof:</h2>
        <div class="col">
            <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="cold-proof-step1">
                <label class="form-check-label stretched-link" for="cold-proof-step1">Form into a large ball and transfer to refigerator overnight</label>
            </li>
            </ul>
        </div>
    </div>

    <div class="row mb-5">
        <h2 class="gy-5">On Day of Eating:</h2>
        <div class="row gy-1">
            <div class="col">        

                <ul class="list-group">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bake-day-step1">
                        <label class="form-check-label stretched-link" for="bake-day-step1">6 hours before eating, take out of the refrigerator to reach room temperature. May need more time if room temp is cold.</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bake-day-step2">
                        <label class="form-check-label stretched-link" for="bake-day-step2">3 hours before baking, knead dough and divide to form into balls. Use olive oil if sticky. Don't use flour.</label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" value="" id="bake-day-step3">
                        <label class="form-check-label stretched-link" for="bake-day-step3">Place in proofing tray for 3 hours, and it will be ready to stretch and bake</label>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php include './include/footer.php'; ?>


</div> <!-- container -->

<script>
    var debug = false;

    function refresh_data()
    {
        var portionSize = parseInt($("#inputPortionSize").val());
        var portions = parseInt($("#inputPortions").val());
        var hydration = parseInt($("#inputHydration").val());
        var sourdoughPercentage = parseFloat($("#inputSourdoughPercentage").val()); 

        var totalDoughWeight = Math.round( portions * portionSize);                 //Dough weight is PORTIONS * PORTION-SIZE - this is the targer
        
        var flourWeight = Math.round( totalDoughWeight / ((hydration/100) + (3/100) + (sourdoughPercentage/100) +1) );     //Flour weight is TOTAL-DOUGH-WEIGHT / ((HYDRATION / 100) + 1)
        var waterWeight = Math.round((hydration / 100) * flourWeight);              //Water is HYDRATION /100 * flourWeight
        var sourdoughStarterWeight = Math.round((sourdoughPercentage/100) * flourWeight);
        var saltWeight = Math.round( 0.03 * flourWeight);                           //Salt is 3% of Flour weight        


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
        refresh_data();
    });

</script>


</body>


</html>