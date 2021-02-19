<?php

require_once("../project01/dbFunctions.php");

session_start();

$badLogin = false;

$fakePassword = "Fakepassword";
$fakeHash = password_hash($fakePassword, PASSWORD_DEFAULT);

echo "Testing fake password: <br>";
echo password_verify($fakePassword, $fakeHash);
echo "<br>";
echo gettype($fakePassword);
echo "<br>";
echo gettype($fakeHash);
echo "<br>";

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $email = test_input($_POST['emailLI']);
  $password = test_input($_POST['passwordLI']);

  //For debugging
  echo "E-mail: " . $email . "<br>";
  echo "Password: " . $password . "<br>";
  echo "Post Data: ";
  print_r($_POST);
  echo "<br>";

  //Get hashed password to compare to login password.
  $loginQuery = 'SELECT password, id FROM public.user WHERE email = :email';
  $loginArray = array(':email' => $email);

  $row = basicQuery($loginQuery, $loginArray);

  $hashedPassword = $row['password'];
  $userID = $row['id'];

  //For debugging
  echo "Hash: " . $hashedPassword . " type: " . gettype($hashedPassword) . "<br>";
  echo "Password: " . $password . " type: " . gettype($password) . "<br>";
  echo "UserID: " . $userID . "<br>";
  echo "Verify Password: ";

  if (password_verify($password, $hashedPassword)) {
    echo "inside passwordVerify statement<br>";

    //Put user ID in session variable. 
    $_SESSION['userID'] = $userID;
    header("Location: ../project01/main.php");

    die();
  } else {
    $badLogin = true;
    exit('Invalid Request');
  }
}
