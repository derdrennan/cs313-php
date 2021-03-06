<?php
session_start();

//var_dump($_GET);
$_SESSION["address"] = $_GET;
foreach ($_SESSION["address"] as $k => $v) {
  $_SESSION["address"][$k] = htmlspecialchars($v);
}
//var_dump($_SESSION["address"]);

require_once("../week03/product.php");
$product = new Product();
$productArray = $product->getAllProduct();
//var_dump($productArray);
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>03 Prove Checkout</title>
  <link rel="stylesheet" type="text/css" href="../week03/03prove.css">
</head>

<body>
  <div id="page-container">
    <div>
      <a class="active" href="../week02/assignmentLinks.html">Home</a>
      <a href="../week03/browse.php">Browse Store</a>
      <a href="../week03/viewCart.php">View Cart</a>
    </div><br>

    <header id="header">
      Confirmation Page
    </header><br>

    <!-- Store Items -->
    <div style="color: white; margin: 8px;">
      Name: <?php echo $_SESSION["address"]["fname"] . " " . $_SESSION["address"]["lname"] ?><br>
      Address: <?php echo $_SESSION["address"]["address"] ?><br>
      City/State: <?php echo $_SESSION["address"]["city"] . ", " . $_SESSION["address"]["state"] ?><br><br>

      Cart <Br>
      <?php
      if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $k => $v) {
      ?>
          <div id="row-<?php echo $k; ?>">
            <?php echo $productArray[$k]["name"]; ?>
            <input disabled class="quantity" type="number" id="input-<?php echo $k; ?>" min="1" max="5" placeholder="1">
          </div>
      <?php
        }
      }
      ?><br>

      <div style="color: white; margin: 8px;">
        Your order was submitted.
      </div>

    </div>

    <footer id="footer">
      <p>All cards have been certified by PSA Authentication and grading services.</p>
    </footer>
  </div>
</body>

</html>