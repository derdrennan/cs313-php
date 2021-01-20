<html>
<body>
  <!-- Verifying Data -->
  <p>Name: <?php echo $_POST["name"]; ?><br>
  <p>Mailto: <?php echo $_POST["email"]; ?><br>
  <p>Major: <?php echo $_POST["major"]; ?><br>
  <p>Comment: <?php echo $_POST["userComments"]; ?><br>
  
  <p>Continents visited:</p>
  <?php 
    foreach($_POST["continents"] as $continent { echo $continent }
  ?><br>

</body>
</html>