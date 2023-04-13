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
 	 <a </i> &nbsp;&nbsp;Dashboard</a>
 	 <a </i> &nbsp;&nbsp;Employee</a>
 	 <a </i> &nbsp;&nbsp;Projects</a>
 	 <a </i> &nbsp;&nbsp;Payment</a>
 	 <a </i> &nbsp;&nbsp;Support</a>
  

</div>
	
	<div class="logout">
		<p>Logout</p>
	</div>
</div>


</body>


</html>
