<?php
session_start();
//var_dump($_SESSION['cart']);
require_once("..\week03\product.php");
$product = new Product();
$productArray = $product->getAllProduct();
//var_dump($productArray);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>03 Prove View Cart</title>
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
      if (action == 'remove') {
        document.getElementById("row-" + ID).remove();
      }
    }
  </script>
</head>

<body>
  <div id="page-container">

    <div class="topnav">
      <a href="">Home</a>
      <a href="..\week03\browse.php">Browse Store</a>
      <a class="active" href="..\week03\viewCart.php">View Cart</a>
    </div>

    <header id="header">
      My Cart
    </header>

    <div>
      <section>
        <div>
          <?php
          if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $k => $v) {
          ?>
              <div style="color: white; margin: 8px;" id="row-<?php echo $k; ?>">
                <?php echo $productArray[$k]["name"]; ?>
                <input disabled class="quantity" type="number" id="input-<?php echo $k; ?>" min="1" max="5" placeholder="1">
                <button type="button" onClick="cartActions('remove', '<?php echo $k ?>')">Remove From Cart</button>
              </div>
          <?php
            }
          }
          ?>
          <button onClick="window.location.href='../week03/checkout.php'">Go to checkout</button>
        </div>
      </section>
    </div>

    <footer id="footer">
      <p>All cards have been certified by PSA Authentication and grading services.</p>
    </footer>

  </div>
</body>

</html>