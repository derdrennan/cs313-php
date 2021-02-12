<?php

require_once("../project01/dbFunctions.php");
require_once('../connections.php');

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

  //Making sure values are correct
  echo "recipeTitle=$recipeTitle\n";
  echo "url=$url\n";
  echo "category=$category\n";
  echo "cookTime=$cookTime\n";
  echo "difficulty=$difficulty\n";
  echo "userComment=$userComment\n";
  echo "userID=$userID\n";

  // we could (and should!) put additional checks here to verify that all this data is actually provided

  //Adding the title
  $recipeTitleQuery = 'INSERT INTO public.recipeList(recipeTitle, user_id) VALUES(:recipeTitle, :userID)';
  $titleArray = array(':recipeTitle' => $recipeTitle, ':userID' => $userID);

  insert($recipeTitleQuery, $titleArray);

  echo "Line 34 after first insert. ";
  $db = get_db();
  $newId = $db->lastInsertId('recipelist_id_seq');


  //Adding the recipe info
  $recipeInfoQuery = 'INSERT INTO public.recipeInfo(url, userComment, category, cookTime, difficulty, recipeList_id) 
                    VALUES(:url, :userComment, :category, :cookTime, :difficulty, :recipeList_id)';
  $recipeInfoArray = array(
    ':url' => $url, 'userComment' => $userComment, ':category' => $category, ':cookTime' => $cookTime,
    ':difficulty' => $difficulty, ':recipeList_id' => $newId
  );

  insert($recipeInfoQuery, $recipeInfoArray);

  echo "Line 46 after first insert. ";

  die();
} else {

  exit('Invalid Request');
}
