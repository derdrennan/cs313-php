<?php

require_once("../project01/dbFunctions.php");

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $username = test_input($_POST['username']);
  $email = test_input($_POST['email']);
  $password = test_input($_POST['password']);

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  echo "hashed password: ";
  echo $hashedPassword;

  //Adding the title
  $usernameQuery = 'INSERT INTO public.user(username, email, password) VALUES(:username, :email, :password)';
  $usernameArray = array(':username' => $username, ':email' => $email, ':password' => $hashedPassword);

  insert($usernameQuery, $usernameArray);

  //Take 
  //header("Location: ../project01/main.php");

  die();
} else {

  exit('Invalid Request');
}
