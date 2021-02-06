<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe List</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <?php include('../connections.php') ?>

</head>

<body style="background: white;">

  <ul>
    <li><a href="../week02/assignmentLinks.html">Home</a></li>
    <li><a href="../project01/main.php">List of Users</a></li>
  </ul>

  <!-- Getting the user name -->
  <div>
    <?php
    $userID = $_GET['user'];
    $statement =  $db->prepare('SELECT username
        FROM public.user
        WHERE id = :id');

    $statement->bindValue(':id', $userID, PDO::PARAM_INT);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $userName = $row['username'];
      echo $userName . "'s favorite recipes!";
    }
    ?>
  </div><br>

  <div>Click a recipe!</div><br>

  <!-- Getting list of recipes -->
  <div id="card-container">
    <section class="basic-grid">
      <?php
      $userID = $_GET['user'];
      $statement =  $db->prepare('SELECT recipeTitle, id
        FROM public.recipeList
        WHERE user_id = :user_id');

      $statement->bindValue(':user_id', $userID);
      $statement->execute();

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        //For some reason, this query didn't work with a camel case spelling of 'recipeTitle'
        //even though that's how I created the row in that table. 
        $recipeTitle = $row['recipetitle'];
        $id = $row['id'];
      ?>
        <a href="../project01/recipe.php?recipeID=<?php echo $id ?>" class="assignment-style link-style">
          <?php echo $recipeTitle; ?>
        </a>
      <?php
      }
      ?>
    </section>
  </div>

</body>

</html>