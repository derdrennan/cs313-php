<?php
session_start();

require_once("../project01/dbFunctions.php");

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $username = sanitize_input($_POST['username']);
  $email = sanitize_input($_POST['emailSU']);
  $password = sanitize_input($_POST['passwordSU']);

  // Encrypting the password before it goes to the DB
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  //Make sure username and email are both unique
  $checkIfExistsQuery = 'SELECT * FROM public.user WHERE username = :username or email = :email';
  $checkIfExistsArray = array(':username' => $username, ':email' => $email);

  $row = basicQuery($checkIfExistsQuery, $checkIfExistsArray);

  $nameFromDB = $row['username'];
  $emailFromDB = $row['email'];

  if ($nameFromDB == $username || $emailFromDB == $email) {
    $_SESSION['entryExists'] = 'The username or e-mail already exists';
    header("Location: ../project01/main.php");
    die();
  } else {
    //Creating the string + array for adding a new user
    $usernameQuery = 'INSERT INTO public.user(username, email, password) VALUES(:username, :email, :password)';
    $usernameArray = array(':username' => $username, ':email' => $email, ':password' => $hashedPassword);

    insert($usernameQuery, $usernameArray);

    //Redirect
    header("Location: ../project01/main.php");

    die();
  }
} else {

  exit('Invalid Request');
}
