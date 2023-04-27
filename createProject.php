<?php
// Database connection info
$servername = "pm-app-itm-4900.ct1nzqwsnahv.us-east-1.rds.amazonaws.com";
$username = "JJonas50";
$password = "Wyoming!12";
$dbname = "sys";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//assign variables from the form
$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$projectManager = $_POST['projectManager'];
$salesperson = $_POST['salesperson'];
$client = $_POST['client'];
$status = $_POST['status'];
$description = $_POST['description'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO project (projectName, projectAddress, projectCity, projectState, projectZipCode, projectManager, projectSalesPerson, projectClient, projectStatus, projectDescription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

// Bind the parameters to the statement
$stmt->bind_param("ssssiiiiss", $name, $address, $city, $state, $zip, $projectManager, $salesperson, $client, $status, $description);

// Execute the statement
$stmt->execute();

// Check for errors
if ($stmt->error) {
  // Handle the error
} else {
  // Success
}

header('Location: projects.php');

echo "Redirecting...";
exit;



?>