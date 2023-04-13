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
	<link rel="stylesheet" href="css/dashboard.css" type="text/css"/>
	
</head>

<body>
	<div class="sidebar">
	<p class="logo"></span>Project Management Plus</p>
	<ul>
		<li><a class ="active" href='dashboard1.php'>Dashboard</a></li>
		<li><a href='employees.php'>Employee</a></li>
		<li><a href='projects.php'>Projects</a></li>
		<li><a href='projectplans.php'>Project Plans</a></li>
		<li><a href='support.php'>Support</a></li>
	</ul>

	</div>

	<div class="logout">
	<p>
		<form>
			<button type="submit" formaction="logout.php">Logout</button>
		</form>
	</p>
	</div>




</body>


</html>
