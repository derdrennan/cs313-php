<?php
session_start();
?>

<?php
$userID = $_GET['user'];
if ($_SESSION['userID'] != $userID) {
  header("Location: ../project01/recipeList.php?user$echo$userID");

  die();
}
?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe List</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bubblegum+Sans" />
  <?php include('../project01/dbFunctions.php') ?>
</head>

<body>
  <div id="page-container">
    <div class="topnav">
      <a href="../week02/assignmentLinks.html">Home</a>
      <a href="../project01/main.php">List of Users</a>
    </div>

    <!-- This form collects all the info to add a new recipe for a user -->
    <h1 id="header-1">
      New Recipe
    </h1><br>

    <div id="wrapper">
      <form id="mainForm" action="insertRecipe.php" method="POST">

        <input type="text" id="recipeTitle" name="recipeTitle" minlength="2"></input>
        <label for="recipeTitle" class="form-style">Recipe Title</label>
        <br /><br />

        <input type="text" id="url" name="url" placeholder="https://www.allrecipes.com/" pattern="^(?:(?:https?|HTTPS?|ftp|FTP):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)*)(?::\d{2,})?(?:[\/?#]\S*)?$"></input>
        <label for="url" class="form-style">Recipe Link</label>
        <br /><br />

        <p class="form-style">Category:</p>
        <input type="radio" id="breakfast" name="category" value="Breakfast" class="boxed-input" required></input>
        <label for="breakfast" class="boxed-label">Breakfast</label>

        <input type="radio" id="lunch" name="category" value="Lunch" class="boxed-input"></input>
        <label for="lunch" class="boxed-label">Lunch</label>

        <input type="radio" id="dinner" name="category" value="Dinner" class="boxed-input"></input>
        <label for="dinner" class="boxed-label">Dinner</label>

        <input type="radio" id="snack/treat" name="category" value="Snack/Treat" class="boxed-input"></input>
        <label for="snack/treat" class="boxed-label">Snack/Treat</label>
        <br /><br />

        <p class="form-style">Cook Time:</p>
        <input type="radio" id="30min" name="cookTime" value="<30 Min" class="boxed-input" required></input>
        <label for="30min" class="boxed-label">30 minutes or Less</label>

        <input type="radio" id="30-60min" name="cookTime" value="30-60 Min" class="boxed-input"></input>
        <label for="30-60min" class="boxed-label">30-60min</label>

        <input type="radio" id="60+min" name="cookTime" value="+60 Min" class="boxed-input"></input>
        <label for="60+min" class="boxed-label">60+ min</label>
        <br /><br />

        <p class="form-style">Difficulty:</p>
        <input type="radio" id="easy" name="difficulty" value="Easy" class="boxed-input" required></input>
        <label for="easy" class="boxed-label">Easy</label>

        <input type="radio" id="medium" name="difficulty" value="Medium" class="boxed-input"></input>
        <label for="medium" class="boxed-label">Medium</label>

        <input type="radio" id="hard" name="difficulty" value="Hard" class="boxed-input"></input>
        <label for="hard" class="boxed-label">Hard</label>
        <br /><br />

        <label for="userComment" class="form-style">Special Instructions:</label><br />
        <textarea id="userComment" name="userComment" rows="8" cols="100"></textarea>
        <br /><br />

        <?php $userID = $_GET['user']; ?>
        <input type="hidden" id="userID" name="userID" value="<?php echo $userID ?>">

        <input type="submit" class="form-style" value="Add to Database" />

      </form>

    </div>

    <footer id="footer">
      <p>Thanks for visiting!</p>
    </footer>
  </div>

</body>

</html>