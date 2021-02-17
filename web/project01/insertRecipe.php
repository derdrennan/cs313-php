<?php

require_once("../project01/dbFunctions.php");

//Sanitization
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //Defining the variables
  // $recipeTitle = $url = $category = $cookTime = $difficulty = $userComment = "";
  // $recipeTitleErr = $urlErr = $categoryErr = $cookTimeErr = $difficultyErr = $userCommentErr = "";

  // if (empty($_POST["recipeTitle"])) {
  //   $recipeTitleErr = "Title is required";
  // } else {
  //   $recipeTitle = test_input($_POST["recipeTitle"]);
  // }

  // if (empty($_POST["url"])) {
  //   $urlErr = "URL is required";
  // } else {
  //   $url = test_input($_POST["url"]);
  //   if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
  //     $urlErr = "Invalid URL (https:// is required)";
  //   }
  // }

  // if (empty($_POST["category"])) {
  //   $categoryErr = "Category is required";
  // } else {
  //   $category = test_input($_POST["category"]);
  // }

  // if (empty($_POST["cookTime"])) {
  //   $cookTimeErr = "Choose a cooktime";
  // } else {
  //   $cookTime = test_input($_POST["cookTime"]);
  // }

  // if (empty($_POST["difficulty"])) {
  //   $difficultyErr = "Choose a difficulty";
  // } else {
  //   $difficulty = test_input($_POST["difficulty"]);
  // }

  // Values for queries
  $recipeTitle = test_input($_POST['recipeTitle']);
  $url = test_input($_POST['url']);
  $category = test_input($_POST['category']);
  $cookTime = test_input($_POST['cookTime']);
  $difficulty = test_input($_POST['difficulty']);
  $userComment = test_input($_POST['userComment']);
  $userID = test_input($_POST['userID']);

  //Adding the title
  $recipeTitleQuery = 'INSERT INTO public.recipeList(recipeTitle, user_id) VALUES(:recipeTitle, :userID) RETURNING id';
  $titleArray = array(':recipeTitle' => $recipeTitle, ':userID' => $userID);

  $recipeList_id = insert($recipeTitleQuery, $titleArray);

  //Adding the recipe info
  $recipeInfoQuery = 'INSERT INTO public.recipeInfo(url, userComment, category, cookTime, difficulty, recipeList_id) 
                    VALUES(:url, :userComment, :category, :cookTime, :difficulty, :recipeList_id)';
  $recipeInfoArray = array(
    ':url' => $url, 'userComment' => $userComment, ':category' => $category, ':cookTime' => $cookTime,
    ':difficulty' => $difficulty, ':recipeList_id' => $recipeList_id
  );

  insert($recipeInfoQuery, $recipeInfoArray);

  //Take 
  header("Location: ../project01/recipeList.php?user=$userID");

  die();
} else {

  exit('Invalid Request');
}
