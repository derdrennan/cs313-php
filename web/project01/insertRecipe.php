<?php

require_once("../project01/dbFunctions.php");

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $recipeTitle = $_POST['recipeTitle'];
  $url = $_POST['url'];
  $category = $_POST['category'];
  $cookTime = $_POST['cookTime'];
  $difficulty = $_POST['difficulty'];
  $userComment = $_POST['userComment'];
  $userID = $_POST['userID'];

  // we could (and should!) put additional checks here to verify that all this data is actually provided

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
