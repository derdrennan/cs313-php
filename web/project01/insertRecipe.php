<?php

require_once("../project01/dbFunctions.php");

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $recipeTitle = sanitize_input($_POST['recipeTitle']);
  $url = sanitize_input($_POST['url']);
  $category = sanitize_input($_POST['category']);
  $cookTime = sanitize_input($_POST['cookTime']);
  $difficulty = sanitize_input($_POST['difficulty']);
  $userComment = sanitize_input($_POST['userComment']);
  $userID = sanitize_input($_POST['userID']);

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
