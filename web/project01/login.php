<?php

require_once("../project01/dbFunctions.php");

session_start();

$badLogin = false;
echo "On line 8\n";

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $email = test_input($_POST['emailLI']);
  $password = test_input($_POST['passwordLI']);

  //For debugging
  echo "E-mail: " . $email . "\n";
  echo "Password: " . $password . "\n";
  echo "Post Data: " . print_r($_POST) . "\n";

  $loginQuery = 'SELECT password FROM public.user WHERE email = :email';
  $loginArray = array(':email' => $email);

  //I want the user ID to be saved as a session variable to determine access to
  //site functions
  $getIDQuery = 'SELECT id FROM public.user WHERE email = :email';
  $getIDArray = array(':id' => $id);

  $hashedPassword = basicQuery($loginQuery, $loginArray);
  $userID = basicQuery($getIDQuery, $getIDQuery);

  //For debugging
  echo "Hash: " . $hashedPassword . "\n";
  echo "UserID: " . $userID;

  if (password_verify($password, $hashedPassword)) {
    //Correct. Put user ID in session variable. 
    echo "inside passwordVerify statement\n";
    $_SESSION['userID'] = $userID;
    header("Location: ../project01/main.php");
    die();
  } else {
    $badLogin = true;
    exit('Invalid Request');
  }
}
