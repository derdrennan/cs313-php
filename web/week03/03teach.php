<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>03 Teach</title>
    <link rel="stylesheet" type="text/css" href="..\week03\practice.css">
</head>

<body>
  <form action="..\week03\studentInfo.php" method="post">
      <!-- Text data -->
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="email">E-mail:</label><br>
      <input type="text" id="email" name="email"><br><br>

      <!-- Radio Buttons -->
      <label for="major">Major:</label><br>
      <input type="radio" id="computerScience" name="major" value="Computer Science">
      <label for="computerScience">Computer Science</label><br>

      <input type="radio" id="webDesign" name="major" value="Web Design">
      <label for="webDesign">Web Design and Development</label><br>
      
      <input type="radio" id="CIT" name="major" value="Computer Information Technology">
      <label for="CIT">Computer Information Technology</label><br>

      <input type="radio" id="CE" name="major" value="Computer Engineering">
      <label for="CE">Computer Engineering</label><br><br>

      <!-- Comment box -->
      <label for="userComments">Comments:</label><br>
      <textarea rows="5" cols="50" id="userComments" name="userComments"></textarea><br>

      <!-- Checkboxes -->
      <label for="continents">Continents visited:</label><br>
      <input type="checkbox" id="NA" name="continents" value="North America">
      <input type="checkbox" id="SA" name="continents" value="South America">
      <input type="checkbox" id="EU" name="continents" value="Europe">
      <input type="checkbox" id="AS" name="continents" value="Asia">
      <input type="checkbox" id="AU" name="continents" value="Australia">
      <input type="checkbox" id="AF" name="continents" value="Africa">
      <input type="checkbox" id="AN" name="continents" value="Antarctica">

      <!-- Submit Button -->
      <input type="submit">
  </form>

</body>

</html>