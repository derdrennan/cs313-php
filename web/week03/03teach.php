<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>03 Teach</title>
    <link rel="stylesheet" type="text/css" href="../week03/practice.css">
</head>

<body>
  <form action="../week03/studentInfo.php" method="post">
      <!-- Text data -->
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="name"><br>
      <label for="email">E-mail:</label><br>
      <input type="text" id="email" name="email"><br><br>

      <!-- Radio Buttons -->
      <?php
        $studentsMajor = array(
          array("CS", "Computer Science"),
          array("WD", "Web Design"),
          array("CIT", "Computer Information Technology"),
          array("CE", "Computer Engineering")
        );
      ?>

      <?php
        for ($row = 0; $row < studentsMajor.count(); $row++) {
          for ($col = 0; $col < 1; $col++){
            <input type ="radio" id="studentsMajor[row]" name="major"
             if (isset($major) && $major=="studentsMajor[row]") echo "checked";?>
            value="studentsMajor[row][col]">
          }
        }
      ?>

      <!-- Original Radio Buttons -->
      <!-- <label for="major">Major:</label><br>
      <input type="radio" id="computerScience" name="major" value="Computer Science">
      <label for="computerScience">Computer Science</label><br>

      <input type="radio" id="webDesign" name="major" value="Web Design">
      <label for="webDesign">Web Design and Development</label><br>
      
      <input type="radio" id="CIT" name="major" value="Computer Information Technology">
      <label for="CIT">Computer Information Technology</label><br>

      <input type="radio" id="CE" name="major" value="Computer Engineering">
      <label for="CE">Computer Engineering</label><br><br> -->

      <!-- Comment box -->
      <label for="userComments">Comments:</label><br>
      <textarea rows="5" cols="50" id="userComments" name="userComments"></textarea><br>

      <!-- Continent Checkboxes -->
      <label for="continents">Continents visited:</label><br>
      <input type="checkbox" id="NA" name="continents[]" value="North America">
      North America<br>

      <input type="checkbox" id="SA" name="continents[]" value="South America">
      <label for="SA">South America</label><br>

      <input type="checkbox" id="EU" name="continents[]" value="Europe">
      <label for="EU">Europe</label><br>

      <input type="checkbox" id="AS" name="continents[]" value="Asia">
      <label for="AS">Asia</label><br>

      <input type="checkbox" id="AU" name="continents[]" value="Australia">
      <label for="AU">Australia</label><br>

      <input type="checkbox" id="AF" name="continents[]" value="Africa">
      <label for="AF">Africa</label><br>

      <input type="checkbox" id="AN" name="continents[]" value="Antarctica">
      <label for="AN">Antarctica</label><br>

      <!-- Submit Button -->
      <input type="submit">
  </form>

</body>

</html>