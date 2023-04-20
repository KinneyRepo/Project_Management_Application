<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


?>

<!Doctype HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="css/grid-resetpassword.css" type="text/css"/>
</head>

<body>
  <div class="grid-container">
  
    <div class="item1">
      <p> Project <br> Management<br> Plus</p>
    </div>

    <div class="item2"></div>
  
    <div class="item3">
      <form>
        <button type="submit" formaction="logout.php">Logout</button>
      </form>
    </div>

    <div class="item4">
        <ul>
          <li><a href='dashboard1.php'>Dashboard</a></li>
          <li><a href='employees.php'>Employee</a></li>
          <li><a href='projects.php'>Projects</a></li>
          <li><a href='projectplans.php'>Project Plans</a></li>
          <li><a href='support.php'>Support</a></li>
          <li><a class ="active" href='resetPassword.php'>Reset Password</a></li>
        </ul>
    </div> 

  <div class="item5">
    <h1> Reset Your Password </h1>
  
  <form action="resetPasswordfunction.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Current Password:</label>
        <input type="password" id="password" name="currentPassword" required>
        <br>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="newPassword" required>
        <br>
        <label for="password">Confirm Password:</label>
        <input type="password" id="password" name="confirmPassword" required>
        <br>
        <input type="submit" value="Submit">
    </form>

  </div>

  <div class="item6">Footer</div>
  </div>
  
</body>

</html>