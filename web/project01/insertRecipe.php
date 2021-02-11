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

  //Making sure values are correct
  // echo "title=$title\n";
  // echo "url=$url\n";
  // echo "category=$category\n";
  // echo "time=$time\n";
  // echo "difficulty=$difficulty\n";
  // echo "comment=$comment\n";
  // echo "userID=$userID\n";

  // we could (and should!) put additional checks here to verify that all this data is actually provided

  //Adding the title
  $recipeTitleQuery = 'INSERT INTO public.recipeList(recipeTitle, user_id) VALUES(:recipeTitle, :userID)';
  $titleArray = array(':recipeTitle' => $recipeTitle, ':userID' => $userID);

  insert($recipeTitleQuery, $titleArray);

  //Adding the recipe info
  $recipeInfoQuery = 'INSERT INTO public.recipeInfo(url, userComment, category, cookTime, difficulty, recipeList_id) 
                    VALUES(:url, :userComment, :category, :cookTime, :difficulty, :recipeList_id)';
  $recipeInfoArray = array(
    ':url' => $url, 'userComment' => $userComment, ':category' => $category, ':cookTime' => $cookTime,
    ':difficulty' => $difficulty, ':recipeList_id' => $userID
  );

  insert($recipeInfoQuery, $recipeInfoArray);
} else {

  exit('Invalid Request');
}
