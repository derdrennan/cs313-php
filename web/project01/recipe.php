<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe Info</title>
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

    <!-- Get Recipe Title -->
    <?php
    $recipeID = $_GET['recipeID'];
    $statement =  $db->prepare('SELECT recipeTitle
        FROM public.recipeList
        WHERE id = :id');

    $statement->bindValue(':id', $recipeID);
    $statement->execute();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $recipeTitle = $row['recipetitle'];
    ?>
      <h1 id="header-1">
        <?php echo $recipeTitle; ?>
      </h1><br>
    <?php
    }
    ?>

    <div id="wrapper">
      <!-- Getting Recipe Info -->
      <?php
      $recipeID = $_GET['recipeID'];
      $statement =  $db->prepare('SELECT *
        FROM public.recipeInfo
        WHERE recipeList_id = :recipeList_id');

      $statement->bindValue(':recipeList_id', $recipeID);
      $statement->execute();

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        //For some reason, this query didn't work with camel case punctuation of 'recipeTitle'
        //even though that's how I created the row in that table. 
        $url = $row['url'];
        $userComment = $row['usercomment'];
        $category = $row['category'];
        $cookTime = $row['cooktime'];
        $difficulty = $row['difficulty'];
      ?>

        <div id="card-container">
          <section class="basic-grid">
            <div class="assignment-style">
              <?php echo $category ?>
            </div>
            <div class="assignment-style">
              <?php echo $cookTime ?>
            </div>
            <div class="assignment-style">
              <?php echo $difficulty ?>
            </div>
          </section>
        </div>

        <div id="card-container">
          <section class="basic-grid">
            <div class="assignment-style">
              <?php echo $url ?>
            </div>
          </section>
        </div>

        <div id="card-container">
          <section class="basic-grid">
            <div class="assignment-style">
              Special Instructions:
            </div>
          </section>
        </div><br>

        <div id="intro">
          <?php echo $userComment ?>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <footer id="footer">
    <p>Thanks for visiting!</p>
  </footer>

  </div>

</body>

</html>