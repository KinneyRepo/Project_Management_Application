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
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$ssn = $_POST['ssn'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$title = $_POST['title'];
$salary = $_POST['salary'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO employee (employeeFName, employeeLName, employeeSSN, employeeAddress, employeeCity, employeeState, employeeZipCode, employeeTitle, employeeSALARY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind the parameters to the statement
$stmt->bind_param("ssisssisi", $fname, $lname, $ssn, $address, $city, $state, $zip, $title, $salary);

// Execute the statement
$stmt->execute();

// Check for errors
if ($stmt->error) {
  // Handle the error
} else {
  // Success
}

header('Location: employees.php');

echo "Redirecting...";
exit;



?>