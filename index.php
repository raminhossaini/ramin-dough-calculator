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
   
    <div class="row g-3 align-items-center">
        <h2 class="pt-3">Ramin's Pizza Calculators</h2>
    </div>
    <div class="row g-3 align-items-center">

<?php

  function printImageBlock($link, $image_url, $title, $description) {

    echo '<a href="'.$link.'" style="text-decoration: none;">';
    echo '<div class="card mb-3" style="">';
      echo '<div class="row g-0">';
        echo '<div class="col-md-3">';
          echo '<img src="'.$image_url.'" class="img-fluid rounded-start" alt="'.$title.'" style="width: 100%; height: 280px; object-fit: cover;">';
        echo '</div>';
        echo '<div class="col-md-9">';
          echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$title.'</h5>';
            echo '<p class="card-text">'.$description.'</p>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
    echo '</a>';
  }

?>


<?php

printImageBlock(ORIGINAL, "./img/poolish.png", "Original 24-hour Pizza Dough", "A Neapolitan pizza made with a poolish preferment boasts a light, airy crust with subtle complexity and a delicate tang from its long, slow fermentation. <strong>If you are a returning user, this was the default landing page.</strong>");
printImageBlock(ORIGINAL_V2, "./img/poolish.png", "Poolish 24-hour Pizza Dough Version 2", "A Neapolitan pizza made with a poolish preferment boasts a light, airy crust with subtle complexity and a delicate tang from its long, slow fermentation. <strong>Now with percentage control of the poolish</strong>");
printImageBlock(DOUBLE_FERMENTED, "./img/double-fermented.png", "Double-fermented 48-hour Pizza Dough", "A Neapolitan pizza made with a double-fermented poolish preferment delivers an exceptionally light, flavorful crust with deep aroma and nuanced tang from its extended, two-stage fermentation.");
printImageBlock(BIGA_24, "./img/biga-24.png", "Original 24-hour 100% Biga Recipe", "A Neapolitan pizza made with a biga preferment has a crisp yet airy crust with rich, nutty flavors and a subtle sweetness developed through its low-hydration, slow fermentation.");
printImageBlock(BIGA_48, "./img/biga-48.png", "Ramin's 48-hour 100% Biga Recipe", "A Neapolitan pizza made with a biga preferment fermented over 48 hours features a deeply complex flavor, airy open crumb, and a beautifully blistered crust with a delicate crunch.");
printImageBlock(SOURDOUGH, "./img/sourdough.png", "Ramin's Sourdough Pizza", "A Neapolitan pizza made with a sourdough starter offers a naturally leavened crust with a tangy depth of flavor, chewy texture, and rustic character.");

?>

<div class="table-responsive">
  <table class="table table-striped fa-check text-successtable-border border-light">
    <thead class="border-light">
      <tr>
        <th scope="col"></th>
        <th scope="col"><strong><a href="<?=ORIGINAL;?>">Original Poolish</a></strong></th>
        <th scope="col"><strong><a href="<?=DOUBLE_FERMENTED;?>">48 Hr Poolish</a></strong></th>
        <th scope="col"><strong><a href="<?=BIGA_24;?>">24 Hr Biga</a></strong></th>
        <th scope="col"><strong><a href="<?=BIGA_48;?>">48 Hr Biga</a></strong></th>
        <th scope="col"><strong><a href="<?=SOURDOUGH;?>">Sourdough</a></strong></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Instant yeast</th>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-x-lg text-danger"></i></td>
      </tr>
      <tr>
        <th scope="row">Sourdough Starter</th>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
      </tr>
      <tr>
        <th scope="row">24 Hours</th>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
      </tr>
      <tr>
        <th scope="row">48 Hours</th>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-x-lg text-danger"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
        <td><i class="bi bi-check-lg text-success"></i></td>
      </tr>
      <tr>
        <th scope="row">Flavour</th>
        <td>Delicate, Subtle</i></td>
        <td>Tangy</i></td>
        <td>Delicate, Subtle</i></td>
        <td>Deep Complex</i></td>
        <td>Tangy</i></td>
      </tr>
    </tbody>
  </table>
</div>




</div>

<!--
<a href="<?=ORIGINAL;?>" style="text-decoration: none;">
<div class="card mb-3" style="">
  <div class="row g-0">
    <div class="col-md-1">
      <img src="./img/poolish.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-11">
      <div class="card-body">
        <h5 class="card-title">Original 24-hour Pizza Dough</h5>
        <p class="card-text">A Neapolitan pizza made with a poolish preferment boasts a light, airy crust with subtle complexity and a delicate tang from its long, slow fermentation.</p>
      </div>
    </div>
  </div>
</div>
</a>
-->




<?php include './include/footer.php'; ?>

</div> <!-- container -->


</body>


</html>
