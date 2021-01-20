<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>03 Teach</title>
    <link rel="stylesheet" type="text/css" href="..\week03\practice.css">
</head>

<body>
  <form action="studentInfo.php" method="post">
      <!-- Text data -->
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="email">E-mail:</label><br>
      <input type="text" id="email" name="email"><br><br>

      <!-- Radio Buttons -->
      <label for="major">Major:</label><br>
      <input type="radio" id="computerScience" name="major" value="computerScience">
      <label for="computerScience">Computer Science</label><br>

      <input type="radio" id="webDesign" name="major" value="webDesign">
      <label for="webDesign">Web Design and Development</label><br>
      
      <input type="radio" id="CIT" name="major" value="CIT">
      <label for="CIT">Computer Information Technology</label><br>

      <input type="radio" id="CE" name="major" value="CE">
      <label for="CE">Computer Engineering</label><br><br>

      <!-- Comment box -->
      <label for="userComments">Comments:</label><br>
      <textarea rows="5" cols="50" id="userComments" name="userComments"></textarea><br>

      <!-- Submit Button -->
      <input type="submit">
  </form>

</body>

</html>