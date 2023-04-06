<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <style>
         body {
            font-family: 'Poppins', sans-serif;
            background-color: #345d84;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #signUpBtn {
            text-align: center;
        }

        #clientLoginLink {
            text-align: end;
        }

        a {
            color: #345d84;
        }

        .container {
            position: relative;
            background-color: #ffffff;
            padding: 30px 30px 50px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 400;
            color: #345d84;
        }

        p {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 300;
            color: #345d84;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 300;
            color: #345d84;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c4d4e2;
            border-radius: 5px;
            font-size: 14px;
            background-color: #ffffff;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #345d84;
            color: white;
            border: none;
            cursor: pointer;
            padding: 12px 0;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 400;
        }

        input[type="submit"]:hover {
            background-color: #2d4a6b;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div id = "clientLoginLink">
    <a href="">Client login</a>
    </div>
    <div>
    <h1>Login</h1>
    <p>Please enter your username and password</p>
    </div>
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
        <div id = "loginBtn">
        <input type="submit" value="Login">
        </div>
        <div id = "signUpBtn">
        <a href="">Sign Up</a>
        </div>
    </form>
</div>
</body>
</html>
