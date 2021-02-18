<?php

require_once("../project01/dbFunctions.php");

session_start();

$badLogin = false;

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = test_input($_POST['email']);
  $password = test_input($_POST['password']);

  $loginQuery = 'SELECT password FROM public.user WHERE email = :email';
  $loginArray = array(':email' => $email);

  //I want the user ID to be saved as a session variable to determine access to
  //site functions
  $getIDQuery = 'SELECT id FROM public.user WHERE email = :email';
  $getIDArray = array(':id' => $id);

  $hashedPassword = basicQuery($loginQuery, $loginArray);
  $userID = basicQuery($getIDQuery, $getIDQuery);

  if (password_verify($password, $hashedPassword)) {
    //Correct. Put user ID in session variable. 
    $_SESSION['userID'] = $userID;
    header("Location: ../project01/main.php");
    die();
  } else {
    $badLogin = true;
    exit('Invalid Request');
  }
}
