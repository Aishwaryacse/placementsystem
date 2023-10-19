<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('pic1.jpeg'); /* Replace with your background image file's name and path */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #0077B5;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
        .navbar-left {
            font-weight: bold;
        }
        .navbar-right {
            display: flex;
            align-items: center;
        }
        .navbar-right a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s;
            margin: 0 10px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        form {
            text-align: center;
        }
        form input, form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            background-color: #0077B5;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">PLACEMENTCELL</div>
        <div class="navbar-right">
            <a href="home.php">Home</a>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        </div>
    </div>
    <div class="container">
        <h1>Sign Up</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Name: <input type="text" name="name" required><br>
            Register Number: <input type="text" name="registernumber" required><br>
            Password: <input type="password" name="password" required><br>
            User Type:
            <select name="usertype">
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select><br>
            <input type="submit" name="signup" value="Sign Up">
        </form>

        <?php
        if (isset($_POST['signup'])) {
            $name = $_POST["name"];
            $registernumber = $_POST["registernumber"];
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $usertype = $_POST["usertype"];

            // Connect to the database
            $db = new mysqli("localhost", "root", "12345", "placementcell");

            // Check if the register number is unique
            $check_query = "SELECT * FROM users WHERE registernumber = '$registernumber'";
            $check_result = $db->query($check_query);

            if ($check_result->num_rows > 0) {
                echo "Register Number already exists. Please choose a different one.";
            } else {
                // Insert the user into the database
                $insert_query = "INSERT INTO users (name, registernumber, password, usertype) VALUES ('$name', '$registernumber', '$password', '$usertype')";
                if ($db->query($insert_query) === TRUE) {
                    echo "Signup successful. You can now <a href='login.php'>log in</a>.";
                } else {
                    echo "Error: " . $db->error;
                }
            }

            // Close the database connection
            $db->close();
        }
        ?>
    </div>
</body>
</html>
