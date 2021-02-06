<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe Info</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <?php include('../connections.php') ?>

</head>

<body style="background: white;">

  <ul>
    <li><a href="../week02/assignmentLinks.html">Home</a></li>
    <li><a href="../project01/main.php">List of Users</a></li>
  </ul>


  <div>Recipe Info Page</div><br>
  <!-- Get Recipe Title -->

  <div>
    <!-- Getting Recipe Info -->
    <?php
    $recipeID = $_GET['recipeID'];
    $statement =  $db->prepare('SELECT *
        FROM public.recipeInfo
        WHERE recipeList_id = :recipeList_id');

    $statement->bindValue(':recipeList_id', $recipeID);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      //For some reason, this query didn't work with a camel case spelling of 'recipeTitle'
      //even though that's how I created the row in that table. 
      $url = $row['url'];
      $userComment = $row['usercomment'];
      $category = $row['category'];
      $cookTime = $row['cooktime'];
      $difficulty = $row['difficulty'];
      echo $url;
      echo "<br>";
      echo $userComment;
      echo "<br>";
      echo $category;
      echo "<br>";
      echo $cookTime;
      echo "<br>";
      echo $difficulty;
    }
    ?>
  </div>

</body>

</html>