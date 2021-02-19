<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project 01: Recipe Sharing</title>
  <link rel="stylesheet" type="text/css" href="../project01/styles.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bubblegum+Sans" />
  <?php include('../project01/dbFunctions.php') ?>
  <script>
    function openForm(formID) {
      document.getElementById(formID).style.display = "block";
    }

    function closeForm(formID) {
      document.getElementById(formID).style.display = "none";
    }

    function verifyMatch(input) {
      if (input.value != document.getElementById('passwordSU').value) {
        input.setCustomValidity('Password must match.');
      } else {
        input.setCustomValidity('');
      }
    }
  </script>
</head>

<body>

  <div id="page-container">
    <div id="content-wrap">

      <div class="topnav">
        <a href="../week02/assignmentLinks.html">Home</a>
        <a class="open-button" onclick="openForm('login')">Log In</a>
        <a class="open-button" onclick="openForm('signup')">Sign Up</a>
      </div>

      <div class="form-popup" id="login">
        <form action="login.php" class="form-container" method="POST" onblur="closeForm('login')">
          <h1>Log In</h1>

          <label for="emailLI"><b>E-mail</b></label>
          <input type="email" id="emailLI" placeholder="E-mail" name="emailLI" required>

          <label for="passwordLI"><b>Password</b></label>
          <input type="password" id="passwordLI" placeholder="Password" name="passwordLI" minlength="6" required>

          <button type="submit" class="btn">Submit</button>
          <!-- <button type="button" class="btn cancel" onclick="closeForm('login')">Close</button> -->
        </form>
      </div>

      <div class="form-popup" id="signup">
        <form action="insertUser.php" class="form-container" method="POST">
          <h1>Add New User</h1>

          <label for="username"><b>Username</b></label>
          <input type="text" id="username" placeholder="This name will be visible to the public" name="username" required>

          <label for="email"><b>E-mail</b></label>
          <input type="email" id="email" placeholder="Enter Name" name="email" required>

          <label for="passwordSU"><b>Password</b></label>
          <input type="password" id="passwordSU" placeholder="Password" name="passwordSU" minlength="6" required>

          <label for="vrfyPassword"><b>Verify Password</b></label>
          <input type="password" id="vrfyPassword" placeholder="Verify Password" name="vrfyPassword" minlength="6" oninput="verifyMatch(this)" required>

          <button type="submit" class="btn">Submit</button>
          <button type="button" class="btn cancel" onclick="closeForm('signup')">Close</button>
        </form>
      </div>

      <h1 id="header-1">Family Recipe Sharing</h1><br>

      <div id="wrapper">
        <div id="intro">
          Welcome to my "Recipe Sharing" website! I live so far from family that I miss
          not being able to have family over for dinner. One of my favorite things is
          experiencing new meals and seeing what other people like to eat. This is a way
          I set up for us to share our favorite recipes with each other so we can make them
          and bond through food, even if it's from different parts of the country.<br><br>
          When this site is finished, you will be able to add yourself as a member, and then
          add your favorite recipes.
        </div><br>

        <div id="card-container">
          <section class="basic-grid">
            <?php
            $db = get_db();
            foreach ($db->query('SELECT id, username FROM public.user') as $row) {
            ?>
              <a href="../project01/recipeList.php?user=<?php echo $row['id'] ?>" class="assignment-style link-style">
                <?php echo $row['username']; ?>
              </a>
            <?php
            }
            ?>

          </section>
        </div>
      </div>
    </div>

    <footer id="footer">
      <p>Thanks for visiting!</p>
    </footer>

  </div>

</body>

</html>