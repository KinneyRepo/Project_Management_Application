<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once 'fetchProjects.php';
?>

<!Doctype HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Projects</title>
	<link rel="stylesheet" href="css/project.css" type="text/css"/>
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
      <form>
        <button type="submit" formaction="logout.php">Logout</button>
      </form>
    </div>
  </div>

  <div class="main-body">

    <div class="project_lists">

      <h2>Project Directory</h2>
        <table>
          <thead>
            <tr>
              <th>Project Name</th>
              <th>Description</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $projects = fetchProjects();
            foreach ($projects as $project) {
                echo "<tr>";
                echo "<td>{$project['projectName']}</td>";
                echo "<td>{$project['projectDescription']}</td>";
                echo "<td>{$project['projectStatus']}</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
    </div>


    <div class="add_projects">
      <h2>Create New Project</h2>
          <form action="createProject.php" method="Post">
            <label for="name"> Name:</label>
            <input type="text" id="name" name="name" pattern=".{1,45}" required><br><br>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" pattern=".{1,100}" required><br><br>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" pattern=".{1,45}" required><br><br>

            <label for="state">State:</label>
            <input type="text" id="state" name="state" pattern=".{1,2}" Value="Please use abbreviation" required><br><br>

            <label for="zipcode">Zip Code:</label>
            <input type="number" id="zipcode" name="zipcode" pattern="[0-9]{5}" required><br><br>
            
            <label for="projectManager">Project Manager:</label>
            <input type="number" id="projectManager" name="projectManager" pattern="[0-9]{1-3}" required><br><br>

            <label for="salesperson">SalesPerson:</label>
            <input type="number" id="salesperson" name="salesperson" pattern="[0-9]{1-3}" required><br><br>

            <label for="client">Client:</label>
            <input type="number" id="client" name="client" pattern="[0-9]{1-3}" required><br><br>
            
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" pattern=".{1,45}" required><br><br>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" pattern=".{1,45}" required><br><br>
            
            <input type="submit" name="submit" value="Submit">
          </form>        
    </div>
  
  </div>
       
</body>

</html>
