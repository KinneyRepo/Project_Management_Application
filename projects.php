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
	<title>Projects</title>
	<link rel="stylesheet" href="css/dashboard.css" type="text/css"/>
	<link rel="stylesheet" href="css/project.css" />

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
		<li><a href='employees.php'>Employee</a></li>
		<li><a class ="active" href='projects.php'>Projects</a></li>
		<li><a href='projectplans.php'>Project Plans</a></li>
		<li><a href='support.php'>Support</a></li>
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

      <div class="project_lists">
        <div class="list1">
          <div class="row">
            <h1 style="font-size:10">Projects</h1>
            <a href="#">See all</a>
          </div>


          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Project Status</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>


              <tr>
                <td>0</td>
                <td>1001</td>
                <td>Pet Rescue 1</td>
                <td>green</td>
                <td>Pet Rescue</td>
              </tr>

              <tr>
                <td>1</td>
                <td>1002</td>
                <td>Fast Phone Repair</td>
                <td>green</td>
                <td>New Electronic Repair Shop</td>
              </tr>

              <tr>
                <td>2</td>
                <td>1003</td>             
                <td>Music Mash</td>
                <td>yellow</td>
                <td>Reorg Music Shop</td>
              </tr>

              <tr>
                <td>3</td>
                <td>1004</td>
                <td>Peddle Pusher</td>
                <td>red</td>
                <td>Bike Shop New Coffee Shop</td>
              </tr>

              <tr>
                <td>4</td>
                <td>1005</td>
                <td>Tax Guys</td>
                <td>cancel</td>
                <td>Transition Ownership/restirement</td>
              </tr>
            </tbody>
          </table>
        </div>


        <div class="list2">

		<h2>Add Project</h2>
    		 <form>
        	 <label for="name">Project Name:</label>
        	 <input type="text" id="name" name="name" required><br><br>

        	 <label for="pman">Project Manager:</label>
        	 <input type="pman" id="pman" name="pman" required><br><br>

        	 <label for="pdesc">Project Desciption:</label>
        	 <input type="pdesc" id="pdesc" name="pdesc" required><br><br>
        	 <input type="submit" name="submit" value="Submit">
    		</form>    

</div>
</div>
</div>
       



</body>

</html>
