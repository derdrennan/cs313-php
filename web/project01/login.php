<?php

require_once("../project01/dbFunctions.php");

session_start();

$badLogin = false;
echo "On line 8\n";

$fakePassword = "truvoodoo";
$fakeHash = password_hash($fakePassword, PASSWORD_DEFAULT);

echo "testing fake password: \n";
echo password_verify($fakePassword, $fakeHash);

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $email = test_input($_POST['emailLI']);
  $password = test_input($_POST['passwordLI']);

  //For debugging
  echo "E-mail: " . $email . "\n";
  echo "Password: " . $password . "\n";
  echo "Post Data: ";
  print_r($_POST);
  echo "\n";

  //Get hashed password to compare to login password.
  $loginQuery = 'SELECT password, id FROM public.user WHERE email = :email';
  $loginArray = array(':email' => $email);

  $row = basicQuery($loginQuery, $loginArray);

  $hashedPassword = $row['password'];
  $userID = $row['id'];

  //For debugging
  echo "Hash: " . $hashedPassword . "\n";
  echo "UserID: " . $userID;

  //Password_verify is safe against timing attacks. 
  if (password_verify($password, $hashedPassword)) {
    echo "inside passwordVerify statement\n";

    //Put user ID in session variable. 
    $_SESSION['userID'] = $userID;
    header("Location: ../project01/main.php");

    die();
  } else {
    $badLogin = true;
    exit('Invalid Request');
  }
}
