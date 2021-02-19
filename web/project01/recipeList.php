<?php
session_start();
?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe List</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bubblegum+Sans" />
  <?php include('../project01/dbFunctions.php') ?>
  <script>
    function validateUser($userID) {
      //Is User logged in?
      <?php
      if ($_SESSION['userID'] != $userID) {
        //Redirect to current page instead of letting them go to recipe form
        header("Location: ../project01/recipeList.php?user=$userID");
      ?>
        alert("Must be logged in and on your own user profile to add a recipe.")
      <?php
        die();
      } else { ?>
        href = "../project01/recipeForm.php?user=<?php echo $userID ?>"
      <?php
      }
      ?>
    }
  </script>
</head>

<body>
  <div id="page-container">
    <div class="topnav">
      <a href="../week02/assignmentLinks.html">Home</a>
      <a href="../project01/main.php">List of Users</a>
      <?php
      $userID = $_GET['user'];
      ?>
      <a onclick="validateUser($userID)">+Add Recipe</a>
    </div>

    <!-- Getting the user name -->
    <h1 id="header-1">
      <?php
      $db = get_db();
      //$userID = $_GET['user'];
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
    </h1><br>

    <div id="wrapper">
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
    </div>

    <footer id="footer">
      <p>Thanks for visiting!</p>
    </footer>
  </div>

</body>

</html>