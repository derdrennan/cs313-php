<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe Sharing</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bubblegum+Sans" />
  <?php include('../project01/dbFunctions.php') ?>

</head>

<body>

  <div id="page-container">
    <div class="topnav">
      <a href="../week02/assignmentLinks.html">Home</a>
    </div>

    <h1 id="header-1">Family Recipe Sharing</h1><br>

    <div id="wrapper">
      <div id="intro">
        Welcome to my "Recipe Sharing" website! I live so far from family that I miss
        not being able to have family over for dinner. One of my favorite things is
        experiencing new meals and seeing what other people like to eat. This is a way
        I set up for us to share our favorite recipes with each other so we can make them
        and bond through food, even if it's from different parts of the country.<br><br>
        When this site is finished, you will be able to add yourself as a member, and then
        add your favorite recipes.
      </div><br>

      <div id="card-container">
        <section class="basic-grid">
          <?php
          $db = get_db();
          foreach ($db->query('SELECT id, username FROM public.user') as $row) {
          ?>
            <a href="../project01/recipeList.php?user=<?php echo $row['id'] ?>" class="assignment-style link-style">
              <?php echo $row['username']; ?>
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