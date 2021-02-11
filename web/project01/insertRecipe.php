<?php

require_once("../project01/dbFunctions.php");

//Validate the request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Values for queries
  $recipetitle = $_POST['recipetitle'];
  $url = $_POST['recipelink'];
  $category = $_POST['category'];
  $cookTime = $_POST['cooktime'];
  $difficulty = $_POST['difficulty'];
  $userComment = $_POST['txtcontent'];
  $userID = $_POST['userid'];

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
  $recipeTitleQuery = 'INSERT INTO public.recipeList(recipetitle, user_id) VALUES(:recipetitle, :userID)';
  $titleArray = array(':recipetitle' => $recipetitle, ':userID' => $userID);

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
