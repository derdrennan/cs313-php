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

  <div><?php echo $_GET['subject'] ?>s' favorite Recipes!</div><br>

  <div>
    <?php $statement = $db->query('SELECT username FROM public.user WHERE id = subject');
    while ($row = $statment->fetch(PDO::FETCH_ASSOC)) {
      echo $row['username'];
    } ?>
    's favorite recipes!
  </div>

  <div>Click a recipe!</div><br>

</body>

</html>