<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
require_once 'fetchProjects.php';
require_once 'fetchContacts.php';
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
	<p class="logo">Project Management Plus</p>
	<ul>
		<li><a class ="active" href='dashboard1.php'>Dashboard</a></li>
		<li><a href='employees.php'>Employee</a></li>
		<li><a href='projects.php'>Projects</a></li>
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
<div class ="main-content">
<div class="contact-list">
    <h2>Contacts</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $contacts = fetchContacts();
        foreach ($contacts as $contact) {
            echo "<tr>";
            echo "<td>{$contact['contactName']}</td>";
            echo "<td>{$contact['contactEmail']}</td>";
            echo "<td>{$contact['contactMessage']}</td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
	<div class="project-list">
  <h2>Current Projects</h2>
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
      $statusClass = '';
      $statusColor = '';
      switch ($project['projectStatus']) {
          case 'green':
              $statusClass = 'project-status-green';
              $statusColor = 'green';
              break;
          case 'yellow':
              $statusClass = 'project-status-yellow';
              $statusColor = 'yellow';
              break;
          case 'red':
              $statusClass = 'project-status-red';
              $statusColor = 'red';
              break;
          case 'canceled':
              $statusClass = 'project-status-canceled';
              $statusColor = 'grey';
              break;
      }
      echo "<tr>";
      echo "<td>{$project['projectName']}</td>";
      echo "<td>{$project['projectDescription']}</td>";
      echo "<td><span class='status-circle' style='background-color: {$statusColor}'></span><span class='{$statusClass}'>{$project['projectStatus']}</span></td>";
      echo "</tr>";
  }
  ?>
  
</tbody>
  </table>
</div>

</div>





</body>


</html>
