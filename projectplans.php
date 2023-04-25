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
	<title>Project Plans</title>
	<link rel="stylesheet" href="css/projectplans.css" type="text/css"/>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  	<script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

	function daysToMilliseconds(days) {
      return days * 24 * 60 * 60 * 1000;
    }

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
	  data.addColumn('string', 'Resource');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');
	  
	  console.log(data.getNumberOfColumns());

      data.addRows([
		/* ['2014Spring', 'Spring 2014', 'spring', new Date(2014, 2, 22), new Date(2014, 5, 20), null, 100, null],
		['2014Summer', 'Summer 2014', 'summer', new Date(2014, 5, 21), new Date(2014, 8, 20), null, 100, null],
		['2014Autumn', 'Autumn 2014', 'autumn', new Date(2014, 8, 21), new Date(2014, 11, 20), null, 100, null],
		['2014Winter', 'Winter 2014', 'winter', new Date(2014, 11, 21), new Date(2015, 2, 21), null, 100, null],
		['2015Spring', 'Spring 2015', 'spring', new Date(2015, 2, 22), new Date(2015, 5, 20), null, 50, null],
		['2015Summer', 'Summer 2015', 'summer', new Date(2015, 5, 21), new Date(2015, 8, 20), null, 0, null],
		['2015Autumn', 'Autumn 2015', 'autumn', new Date(2015, 8, 21), new Date(2015, 11, 20), null, 0, null],
		['2015Winter', 'Winter 2015', 'winter', new Date(2015, 11, 21), new Date(2016, 2, 21), null, 0, null],
		['Football', 'Football Season', 'sports', new Date(2014, 8, 4), new Date(2015, 1, 1), null, 100, null],
		['Baseball', 'Baseball Season', 'sports', new Date(2015, 2, 31), new Date(2015, 9, 20), null, 14, null],
		['Basketball', 'Basketball Season', 'sports', new Date(2014, 9, 28), new Date(2015, 5, 20), null, 86, null],
		['Hockey', 'Hockey Season', 'sports', new Date(2014, 9, 8), new Date(2015, 5, 21), null, 89, null]
		*/

		/*['cite', 'Repaint Room 2', 'John', new Date(2023,4,22), new Date(2023,4,26), 2, 10, null],
        ['complete', 'New Floors room 1', 'John', new Date(2023,4,22), new Date(2023,4,26), 2, 20, null],
        ['i am bored', 'Replace Furniture Room 1', 'Joe', new Date(2023,5,12), new Date(2023,5,14), 4, 30, null],
        ['outline', 'New Floors room 2', 'Joe ', new Date(2023,4,22), new Date(2023,4,31), 4, 0, null],
        ['Research', 'Remove Furniture', 'Xou', new Date(2023,4,12), new Date(2023,4,19), 2, 0, null],
        ['write', 'Repaint Room 1', 'Xou', new Date(2023,4,22), new Date(2023,4,23), 4, 0, null],
        ['write more', 'Replace Furniture Room 2', 'Seyoung', new Date(2023,5,15), new Date(2023,5,16), 2, 0, null]*/
        <?php 
			// Creates connection to the database
			$servername = "pm-app-itm-4900.ct1nzqwsnahv.us-east-1.rds.amazonaws.com";
			$username = "JJonas50";
			$password = "Wyoming!12";
			$dbname = "sys";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT * FROM tasks";
			$result = mysqli_query($conn, $sql);
			
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['idtasks'];
                $taskName = $row['tasksName'];
				$duration = $row['tasksDuration'];
                $startDate = new \DateTime($row['tasksStartDate']);
                $endDate = new \DateTime($row['tasksEndDate']);
				$resource = $row['tasksEmployeeID'];
                $percentComplete = $row['percentComplete'];
                $dependencies = $row['tasksDependencies'];

                // Add a row to the DataTable for this task
                echo "['$id', '$taskName', '$resource', new Date(" . $startDate->format('Y') . "," . ($startDate->format('n') - 1) . "," . $startDate->format('j') . "), new Date(" . $endDate->format('Y') . "," . ($endDate->format('n') - 1) . "," . $endDate->format('j') . "), $duration, $percentComplete, '$dependencies'],";
			}
		?>
		
      ]);

      var options = {
		
		height: 600,
        width: 1200,
		gantt: {
          trackHeight: 30
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
	
</head>

<body>
	
	<div class="sidebar">
		<p class="logo"></span>Project Management Plus</p>
		<ul>
			<li><a href='dashboard1.php'>Dashboard</a></li>
			<li><a href='employees.php'>Employee</a></li>
			<li><a href='projects.php'>Projects</a></li>
			<li><a class ="active" href='projectplans.php'>Project Plans</a></li>
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
		<p>Gantt Chart for project 1<br><p>
		<div id="chart_div" style="max-width:1200px; height:600px; margin-left: 325px"></div>
	</div>




</body>


</html>


