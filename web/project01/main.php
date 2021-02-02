<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Project 01: Recipe Sharing</title>
  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <?php include('../connections.php')
  ?>

</head>

<body>

  <ul>
    <li><a href="../week02/assignmentLinks.html">Home</a></li>
    <li><a href="#news">News</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
  </ul>

  <div>Family Recipe Sharing</div><br>
  <div>Click a name to see their favorite recipes!</div><br>
  <button>Add New Member</button>

  <?php
  foreach ($db->query('SELECT username FROM public.user') as $row) {
    echo 'username: ' . $row['username'];
  }
  ?>

</body>

</html>