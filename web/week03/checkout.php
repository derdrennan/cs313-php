<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>03 Prove Checkout</title>
  <link rel="stylesheet" type="text/css" href="..\week03\03prove.css">

  <script>
    function cartActions(action, ID) {
      fetch("../week03basic/addToCart.php", {
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
      <a href="..\week03\viewCart.php">View Cart</a>
    </div>

    <header id="header">
      Checkout
    </header><br>

    <!-- Store Items -->
    <div style="color: white; margin: 8px;">
      <form action="..\week03basic\confirm.php">
        <label>First Name</label>
        <input type="text" name="fname"><br>
        <label>Last Name</label>
        <input type="text" name="lname"><br>
        <label>Address</label>
        <input type="text" name="address"><br>
        <label>City</label>
        <input type="text" name="city"><br>
        <label>State</label>
        <input type="text" name="state"><br>
        <button type="submit">Confirm Purchase</button>
      </form>
    </div>

    <footer id="footer">
      <p>All cards have been certified by PSA Authentication and grading services.</p>
    </footer>

  </div>
</body>

</html>