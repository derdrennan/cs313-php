<?php

require_once("../project01/dbFunctions.php");

session_start();

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $email = sanitize_input($_POST['emailLI']);
  $password = sanitize_input($_POST['passwordLI']);

  //Get hashed password to compare to login password.
  $loginQuery = 'SELECT password, id FROM public.user WHERE email = :email';
  $loginArray = array(':email' => $email);

  $row = basicQuery($loginQuery, $loginArray);

  $hashedPassword = $row['password'];
  $userID = $row['id'];

  if (password_verify($password, $hashedPassword)) {

    //Put user ID in session variable. 
    $_SESSION['userID'] = $userID;
    header("Location: ../project01/main.php");

    die();
  } else {

    exit('Invalid Request');
  }
}
