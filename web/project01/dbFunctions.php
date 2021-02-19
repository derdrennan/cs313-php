<?php

function get_db()
{
  $db = NULL;

  try {
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  return $db;
}


function insert($query, $array)
{
  $db = get_db();

  try {
    $statement = $db->prepare($query);

    foreach ($array as $key => &$value) {
      if (is_int($value)) {
        $statement->bindValue($key, $value, PDO::PARAM_INT);
      } else {
        $statement->bindValue($key, $value, PDO::PARAM_STR);
      }
    }

    $statement->execute();
    $row = $statement->fetch();
    $id = $row['id'];
  } catch (Exception $ex) {
    //echo "Error with DB. Details: $ex";
    die();
  }
  //Normally there would be die(); here, but I am doing two queries from the same form. There
  //was no way to do both, because die(); would end the process before it could cycle out
  //and come back in to run the second query. die(); will need to be added after any calls to insert();

  return $id;
}

function basicQuery($query, $array)
{
  $db = get_db();

  try {
    $statement = $db->prepare($query);

    foreach ($array as $key => &$value) {
      if (is_int($value)) {
        $statement->bindValue($key, $value, PDO::PARAM_INT);
      } else {
        $statement->bindValue($key, $value, PDO::PARAM_STR);
      }
    }

    $statement->execute();
    $row = $statement->fetch();
    $result = $row['password'];
  } catch (Exception $ex) {
    //echo "Error with DB. Details: $ex";
    die();
  }

  return $result;
}

//Sanitization
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
