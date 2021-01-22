<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>03 Prove</title>
    <link rel="stylesheet" type="text/css" href="..\week03\03prove.css">
</head>

<body>
  <div id="page-container">
  <header id="header">
      Pokemon Card Store
  </header>

  <!-- Store Items -->
  <div id="card-container">
  <section class="basic-grid">
    <div class="assignment-style">
        Base Set
        <img src="..\week03\pokemonPics\base-set.jpg" alt="Base Set" width="200" height="278">
        <div class="add-to-cart">
            $437
            <input class="quantity" type="number" id="base" name="base" value="437" min="0" max="5" placeholder="0">
            <button type="button" class="small-text">Add to Cart</button>
        </div>
    </div>
    <div class="assignment-style">
        Blastoise
        <img src="..\week03\pokemonPics\blastoise.jpg" alt="Blastoise" width="200" height="278">
        <div class="add-to-cart">
            $457
            <input class="quantity" type="number" id="blastoise" name="blastoise" value="457" min="0" max="5" placeholder="0">
            <button type="button" class="small-text">Add to Cart</button>
        </div>
    </div>
    <div class="assignment-style">
        Charizard
        <img src="..\week03\pokemonPics\charizard.jpg" alt="Charizard" width="200" height="278">
        <div class="add-to-cart">
            $1,750  
            <input class="quantity" type="number" id="charizard" name="charizard" value="1750" min="0" max="5" placeholder="0">
            <button type="button" class="small-text">Add to Cart</button>
        </div>
    </div>
    <div class="assignment-style">
        Fossil Set
        <img src="..\week03\pokemonPics\fossil-set.jpg" alt="Fossil Set" width="200" height="278">
        <div class="add-to-cart">
            $219
            <input class="quantity" type="number" id="fossil" name="fossil" value="219" min="0" max="5" placeholder="0">
            <button type="button" class="small-text">Add to Cart</button>
        </div>
    </div>
    <div class="assignment-style">
        Mew
        <img src="..\week03\pokemonPics\mew.jpg" alt="Mew" width="200" height="278">
        <div class="add-to-cart">
            $199
            <input class="quantity" type="number" id="mew" name="mew" value="199" min="0" max="5" placeholder="0">
            <button type="button" class="small-text">Add to Cart</button>
        </div>
    </div>
    <div class="assignment-style">
        Venusaur
        <img src="..\week03\pokemonPics\venusaur.jpg" alt="Venusaur" width="200" height="278">
        <div class="add-to-cart">
            $187
            <input class="quantity" type="number" id="venusaur" name="venusaur" value="187" min="0" max="5" placeholder="0">
            <button type="button" class="small-text">Add to Cart</button>
        </div>
    </div>
    <div class="assignment-style">
        XY Booster
        <img src="..\week03\pokemonPics\xy-booster.jpg" alt="XY Booster" width="200" height="278">
        <div class="add-to-cart">
            $768
            <input class="quantity" type="number" id="XY" name="XY" value="768" min="0" max="5" placeholder="0">
            <button type="button" class="small-text">Add to Cart</button>
        </div>
    </div>
 </section>
</div>

<?php
  //Set session variables
  $_SESSION["cartTotal"] = "$0.00";
  echo "Cart Total is: " print_r($_SESSION['cartTotal']);
?>
  

<footer id="footer">
  <p>All cards have been certified by PSA Authentication and grading services.</p>
</footer>

</div>
</body>

</html>