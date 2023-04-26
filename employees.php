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
	<title>Employee</title>
	<link rel="stylesheet" href="css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="css/employee.css" />

	<style>
	tr:hover
	{
		background-color:#345d84;
		color:white;
		cursor:pointer;
	}

	</style>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('table tbody tr').click(function () {
				alert($(this).text());
			});
		});

	</script>

</head>

<body>
	<div class="sidebar">
	<p class="logo"></span>Project Management Plus</p>
  <ul>
		<li><a href='dashboard1.php'>Dashboard</a></li>
		<li><a class ="active" href='employees.php'>Employee</a></li>
		<li><a href='projects.php'>Projects</a></li>
		<li><a href='projectplans.php'>Project Plans</a></li>
		<li><a href='support.php'>Support</a></li>
    <li><a href='resetPassword.php'>Reset Password</a></li>

	</ul>
  
</div>
<div class="top-navbar">

<div class="logout">
	<p>
		<form>
		<button type="submit" formaction="logout.php">Logout</button>
		</form>
	</p>
</div>

<div class="main-body">

      <div class="employee_lists">
        <div class="list1">
          <div class="row">
            <h1 style="font-size:10">Employees</h1>
            <a href="#">See all</a>
          </div>

          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Project Plan</th>
                <th>Active</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>John</td>
                <td>Jonas</td>
                <td>Plan A</td>
                <td>Yes</td>
              </tr>

              <tr>
                <td>2</td>
                <td>Katy</td>
                <td>McCabe-Schaller</td>
                <td>Plan B</td>
                <td>Yes</td>
              </tr>

              <tr>
                <td>3</td>
                <td>Joe</td>             
                <td>Kinney</td>
                <td>Plan B</td>
                <td>Yes</td>
              </tr>

              <tr>
                <td>4</td>
                <td>Seyoung</td>
                <td>Yoon</td>
                <td>Plan A</td>
                <td>Yes</td>
              </tr>

              <tr>
                <td>5</td>
                <td>Xou</td>
                <td>Xiong</td>
                <td>Plan C</td>
                <td>No</td>
              </tr>
            </tbody>
          </table>

        </div>


        <div class="list2">

		<h2>Add Employee</h2>
    		<form>
        	<label for="name">Name:</label>
        	<input type="text" id="name" name="name" required><br><br>
        	<label for="lname">Last Name:</label>
        	<input type="lname" id="password" name="lname" required><br><br>
        	<label for="pplan">Project Plan:</label>
        	<input type="pplan" id="pplan" name="pplan" required><br><br>
        	<input type="submit" name="submit" value="Submit">
    		</form>    

</div>
</div>
</div>
       



</body>


</html>