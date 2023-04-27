<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once 'fetchEmployees.php';
?>
<!Doctype HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee</title>
	<!--<link rel="stylesheet" href="css/dashboard.css" type="text/css"/>-->
	<link rel="stylesheet" href="css/employee.css" type="text/css"/>

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
        <form>
        <button type="submit" formaction="logout.php">Logout</button>
        </form>
    </div>
  </div>

  <div class="main-body">

    <div class="employee_lists">

      <h2>Employee Directory</h2>
      <table>
        <thead>
          <tr>
          <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Title</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $employees = fetchEmployees();
          foreach ($employees as $employee) {
              echo "<tr>";
              echo "<td>{$employee['employeeFName']}</td>";
              echo "<td>{$employee['employeeLName']}</td>";
              echo "<td>{$employee['employeeAddress']}</td>";
              echo "<td>{$employee['employeeCity']}</td>";
              echo "<td>{$employee['employeeTitle']}</td>";
              echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>


    <div class="add_employee">

      <h2>Add Employee</h2>
          <form action="createEmployees.php" method="Post">
            <label for="fname"> First Name:</label>
            <input type="text" id="fname" name="fname" pattern=".{1,45}" required><br><br>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" pattern=".{1,45}" required><br><br>

            <label for="ssn">SSN:</label>
            <input type="number" pattern="[0-9]{9}" id="ssn" name="ssn" required><br><br>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" pattern=".{1,100}" required><br><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" pattern=".{1,50}" required><br><br>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" pattern=".{1,2}" Value="Please use abbreviation" required><br><br>

            <label for="zipcode">Zip Code:</label>
            <input type="number" id="zipcode" name="zipcode" pattern="[0-9]{5}" required><br><br>
            
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" pattern=".{1,45}" required><br><br>

            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary" pattern="[0-9]{5-6}" required><br><br>

            <input type="submit" name="submit" value="Submit">
          </form>    

    </div>
  </div>
       



</body>


</html>