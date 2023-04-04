<?php
require 'connect.php';

// Set the username and new password (use the actual values)
$username = "jokinne";
$new_password = "8967";

// Hash the new password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Update the user's password in the database
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $hashed_password, $username);
$stmt->execute();

if ($stmt->affected_rows === 1) {
    echo "Password updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}
?>
