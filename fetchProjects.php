<?php
function fetchProjects() {
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

    // Fetch projects
    $sql = "SELECT projectName, projectDescription, projectStatus FROM project";
    $result = $conn->query($sql);

    $projects = [];
    if ($result->num_rows > 0) {
        // Store the fetched projects in an array
        while($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }

    // Close the connection
    $conn->close();

    return $projects;
}
?>
