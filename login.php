<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 5px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            width: auto;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 8px 16px;
            margin-top: 10px;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <p>Please enter your username and password</p>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require 'connect.php';

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
                echo "<script>window.location.href = 'dashboard.php';</script>";
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
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>
