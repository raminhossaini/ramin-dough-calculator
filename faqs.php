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
    
    <title>FAQs</title>
</head>

<body>


<div class="container">

<?php include './include/navbar.php';?>
   
    <div class="row g-3 align-items-center">
        <h2>FAQs</h2>

        <h3>Why is this open source?</h3>
        <p>Pizza has a lot of strong opinions. Food and taste is subjective. I've made this project open source so that anyone can tailor the calculator to their own tastes and needs. The Github project can be found <a href="https://github.com/raminhossaini/ramin-dough-calculator">here</a>.</p>

        <h3>Who came up with the Original 24-hour Pizza Dough?</h3>
        <p>The calculator for the Original 24-hour Pizza Dough is inspired by <a href="https://www.youtube.com/channel/UCopxVPFM021dpp8L6euX-qA">Vito Iacopelli's youtube videos</a>. His passion for pizza is contagious and I encourage any avid pizza maker to watch his videos.</p>

        <h3>Vito does a double fermentation, how come the calculator doesn't?</h3>
        <p>This calculator has now been added. You can find it <a href="<?=DOUBLE_FERMENTED;?>">here</a></p>

        <h3>How does the poolish percentage work with the Original recipe? Why does it go from 100 to 300?</h3>
        <p>The videos of Vito specify using 300:300 for the poolish, and I had to re-adjust this recipe to use 100:100 for smaller portions. I have created the Version 2 calculator to take the poolish percentage into consideration and you can access it <a href="<?=ORIGINAL_V2;?>">here</a></p>

    </div>
 
<?php include './include/footer.php'; ?>

</div> <!-- container -->


</body>


</html>
