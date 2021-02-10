<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe List</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bubblegum+Sans" />
  <?php include('../connections.php') ?>
</head>

<body>
  <div id="page-container">
    <div class="topnav">
      <a href="../week02/assignmentLinks.html">Home</a>
      <a href="../project01/main.php">List of Users</a>
    </div>

    <!-- Getting the user name -->
    <h1 id="header-1">
      Entry Form
    </h1><br>

    <div id="wrapper">
      <form id="mainForm" action="insertTopic.php" method="POST">

        <input type="text" id="recipeTitle" name="recipeTitle"></input>
        <label for="recipeTitle">Title</label>
        <br /><br />

        <input type="text" id="recipeLink" name="recipeLink"></input>
        <label for="recipeLink">Link to Recipe</label>
        <br /><br />

        <p>Category </p>
        <input type="radio" id="breakfast" name="category"></input>
        <label for="breakfast">Breakfast</label>

        <input type="radio" id="lunch" name="category"></input>
        <label for="lunch">Lunch</label>

        <input type="radio" id="dinner" name="category"></input>
        <label for="dinner">Dinner</label>
        <br /><br />

        <p>Cook Time</p>
        <input type="radio" id="30min" name="cookTime"></input>
        <label for="30min">30 minutes or Less</label>

        <input type="radio" id="30-60min" name="cookTime"></input>
        <label for="30-60min">30-60min</label>

        <input type="radio" id="60+min" name="cookTime"></input>
        <label for="60+min">60+ min</label>
        <br /><br />

        <p>Difficulty</p>
        <input type="radio" id="easy" name="difficulty"></input>
        <label for="easy">Easy</label>

        <input type="radio" id="medium" name="difficulty"></input>
        <label for="medium">Medium</label>

        <input type="radio" id="hard" name="difficulty"></input>
        <label for="hard">Hard</label>
        <br /><br />

        <label for="txtContent">Special Instructions:</label><br />
        <textarea id="txtContent" name="txtContent" rows="8" cols="100"></textarea>
        <br /><br />


        <input type="hidden" id="userID" name="userID" value="1">

        <input type="submit" value="Add to Database" />

      </form>

    </div>

    <footer id="footer">
      <p>Thanks for visiting!</p>
    </footer>
  </div>

</body>

</html>