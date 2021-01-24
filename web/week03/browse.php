<?php
session_start();

require_once("..\week03\product.php");
$product = new Product();
$productArray = $product->getAllProduct();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>03 Prove</title>
  <link rel="stylesheet" type="text/css" href="..\week03\03prove.css">

  <script>
    function cartActions(action, ID) {
      fetch("../week03/cartFunctions.php", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            ID,
            action
          })
        })
        .then(response => response.json())
        .then(data => console.log(data));
    }
  </script>
</head>

<body>
  <div id="page-container">

    <div class="topnav">
      <a class="active" href="#home">Home</a>
      <a href="..\week03\viewCart.php">View Cart</a>
    </div>

    <header id="header">
      Pokemon Card Store
    </header>

    <!-- Store Items -->
    <div id="card-container">
      <section class="basic-grid">

        <?php
        if (!empty($productArray)) {
          foreach ($productArray as $k => $v) {
        ?>
            <div class="assignment-style">
              <?php echo $productArray[$k]["name"]; ?>
              <img src="<?php echo $productArray[$k]["image"]; ?>" alt="<?php echo $productArray[$k]["name"]; ?>" width="200" height="278">
              <div class="add-to-cart">
                Price: <?php echo $productArray[$k]["price"]; ?>
                <button type="button" class="small-text" onClick="cartActions('add', '<?php echo $k; ?>')">Add to Cart</button>
              </div>
            </div>
        <?php
          }
        }
        ?>

      </section>
    </div>

    <footer id="footer">
      <p>All cards have been certified by PSA Authentication and grading services.</p>
    </footer>

  </div>
</body>

</html>