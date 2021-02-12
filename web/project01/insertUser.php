<?php

require_once("../project01/dbFunctions.php");

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $username = $_POST['username'];

  // we could (and should!) put additional checks here to verify that all this data is actually provided

  //Adding the title
  $usernameQuery = 'INSERT INTO public.user(username) VALUES(:username)';
  $usernameArray = array(':username' => $username);

  insert($usernameQuery, $usernameArray);

  //Take 
  header("Location: ../project01/main.php");

  die();
} else {

  exit('Invalid Request');
}
