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

        <h3>Why is my pizza so salty?!</h3>
        <p>I used a typical baker's percentage of 3% for the salt. I wanted the user to be able to change key metrics without overwhelming the user with too many variables. Again, I've made this open-source so I encourage you to change it to your taste.</p>

        <h3>Who came up with the Original 24-hour Pizza Dough?</h3>
        <p>The calculator for the Original 24-hour Pizza Dough is inspired by <a href="https://www.youtube.com/channel/UCopxVPFM021dpp8L6euX-qA">Vito Iacopelli's youtube videos</a>. His passion for pizza is contagious and I encourage any avid pizza maker to watch his videos.</p>

        <h3>Vito does a double fermentation, how come the calculator doesn't?</h3>
        <p>I made the Original 24-hour Pizza Dough from one of his recipes. Vito has many other recipes, but I have not had the time to make calculators for them.</p>
    </div>
 
<?php include './include/footer.php'; ?>

</div> <!-- container -->


</body>


</html>
