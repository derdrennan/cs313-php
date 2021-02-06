<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe Sharing</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <?php include('../connections.php') ?>

</head>

<body>

  <ul>
    <li><a href="../week02/assignmentLinks.html">Home</a></li>
    <li><a href="#news">News</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
  </ul>

  <div class="main-div">
    <div>Family Recipe Sharing</div><br>
    <div>Click a name to see their favorite recipes!</div><br>
    <button>Add New Member</button>

    <div id="card-container">
      <section class="basic-grid">
        <?php
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

</body>

</html>