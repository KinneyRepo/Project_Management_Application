<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css" type="text/css"/>
    </style>
</head>

<body>

<div class="container">
    <div>
    <h1>Login</h1>
    <p>Please enter your username and password</p>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'Connect.php';

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
                $_SESSION['user_id'] = $row['idusers'];
                $_SESSION['username'] = $row['username'];

                // Redirect to the appropriate page
                echo "<script>window.location.href = 'dashboard1.php';</script>";
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            // User does not exist, display error message
            $error = "Invalid username or password";
        }

        if (isset($error)) {
            echo "<p style='color: red;'>$error</p>";
            if (isset($stmt)) {
                echo "Error: " . $stmt->error . "<br>";
            }
        }

    };

    ?>

    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <div id = "loginBtn">
        <input type="submit" value="Login">
        </div>
        <div id = "signUpBtn">
        <a class="signup" href="">Sign Up</a>
        <a class="support" href="support.php">Support</button>
        </div>
    </form>
</div>
</body>
</html>
