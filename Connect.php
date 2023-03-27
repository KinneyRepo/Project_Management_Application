<?php
//Creates connection to the database
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
echo "Connected successfully";



// Checking login on the webpage 
// To check if it is working use username = jajonas and password = 1234

// Retrieve the user's information from the database
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();

// Verify that the user exists and the password is correct
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  if (password_verify($_POST['password'], $row['password'])) {
    // Password is correct, store user information in session
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];

    // Redirect to the appropriate page
    header("Location: dashboard.php");
    exit();
  } else {
    // Password is incorrect, display error message
    $error = "Invalid username or password";
  }
} else {
  // User does not exist, display error message
  $error = "Invalid username or password";
}

?>