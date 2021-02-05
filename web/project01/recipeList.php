<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe Sharing</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <?php include('../connections.php') ?>

</head>

<body style="background: white;">

  <ul>
    <li><a href="../week02/assignmentLinks.html">Home</a></li>
    <li><a href="../project01/main.php">List of Users</a></li>
  </ul>

  <div><?php echo $_GET['user'] ?>s' favorite Recipes!</div><br>

  <div>
    <!-- Getting the user name -->
    <?php
    $userID = $_GET['user'];
    $statement =  $db->prepare('SELECT username
        FROM public.user
        WHERE id = :id');

    $statement->bindValue(':id', $userID, PDO::PARAM_INT);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $userName = $row['username'];
      echo "Testing name in while loop: " . $userName;
    }
    ?>
  </div>

  <div>
    <!-- Getting list of recipes -->
    <?php
    $userID = $_GET['user'];
    echo "User id = " . $userID;
    $statement =  $db->prepare('SELECT recipeTitle
        FROM public.recipeList
        WHERE user_id = :user_id');

    $statement->bindValue(':user_id', $userID);
    $statement->execute();

    echo "Testing userID: " . $userID;

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $recipeTitle = $row['recipeTitle'];
      //echo "Testing recipe list loop: " . $recipeTitle;
      var_dump($row);
    }
    ?>


  </div>

  <div>Click a recipe!</div><br>

</body>

</html>