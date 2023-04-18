<?php
// Database connection information
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

// Get the data from the form
$contactName = $_POST['contactName'];
$contactEmail = $_POST['contactEmail'];
$contactMessage = $_POST['contactMessage'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contactform (contactName, contactEmail, contactMessage) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $contactName, $contactEmail, $contactMessage);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and the connection
$stmt->close();
$conn->close();
?>
