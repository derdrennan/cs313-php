<?php

require("../connections.php");

function insert($query, $array)
{
  $db = get_db();

  try {

    // Add the Scripture
    // We do this by preparing the query with placeholder values
    //$query = 'INSERT INTO public.recipeList(recipetitle, user_id) VALUES(:title, :userID)';
    $statement = $db->prepare($query);

    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    foreach ($array as $key => &$value) {
      if (is_int($value)) {
        $statement->bindValue($key, $value, PDO::PARAM_INT);
      } else {
        $statement->bindValue($key, $value, PDO::PARAM_STR);
      }
    }

    $statement->execute();
  } catch (Exception $ex) {
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
  }

  // finally, redirect them to a new page to actually show the topics
  header("Location: ../project01/recipeList.php");

  die();
}
