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
    <?php
    /* Execute a prepared statement by passing an array of values */
    /* https://www.php.net/manual/en/pdo.prepare.php */
    $userID = $_GET['user'];
    $statement =  $db->prepare('SELECT username
        FROM public.user
        WHERE id = :id');

    $statement->bindValue(':id', $userID, PDO::PARAM_INT);
    $statement->execute();

    //$statement = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    //$sth->execute(array(':id' => $_GET['user']));
    //$name = $sth->fetch();
    //echo "Testing name: " . $statement;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $userName = $row['username'];
      echo "Testing name in while loop: " . $userName;
    }

    ?>
  </div>

  <div>Click a recipe!</div><br>

</body>

</html>