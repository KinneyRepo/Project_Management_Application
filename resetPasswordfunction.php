<?php
session_start();

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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Sanitize and validate user inputs
    $new_password = trim($_POST["newPassword"]);
    $confirm_password = trim($_POST["confirmPassword"]);
    
    if (empty($new_password)) {
      $password_err = "Please enter a new password.";
    } elseif (strlen($new_password) < 6) {
      $password_err = "Password must have at least 6 characters.";
    }
    
    if (empty($confirm_password)) {
      $confirm_password_err = "Please confirm the password.";
    } elseif ($new_password != $confirm_password) {
      $confirm_password_err = "Passwords do not match.";
    }
    
    // If inputs are valid, update password
    if (empty($password_err) && empty($confirm_password_err)) {

    // Retrieve user's current password hash from database
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT password FROM users WHERE idusers = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $current_password_hash = $user['password'];

    // Verify user's current password
    if (password_verify($_POST['currentPassword'], $current_password_hash)) {

    // Generate new password hash
    $new_password_hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

    // Update user's password in database
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE idusers = ?");
    $stmt->bind_param("si", $new_password_hash, $user_id);
    $stmt->execute();

    // Password updated successfully
    echo "Password updated successfully.";
    
    header("location: login.php");

    } else {

    // Incorrect current password
    echo "Incorrect current password.";

    }

    // Close database connection
    $conn->close();
      
    }
    
  }


?>