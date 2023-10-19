<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
            justify-content: space-between; /* Move buttons to the right */
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
        form input {
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
        <h1>Login</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Register Number: <input type="text" name="registernumber" id="registernumber" required onkeyup="getUserType()"><br>
            Password: <input type="password" name="password" required><br>
            User Type: <input type="text" name="usertype" id="usertype" disabled><br>
            <input type="submit" name="login" value="Login">
        </form>

        <script>
            function getUserType() {
                // Get the register number from the input field
                const registernumber = document.getElementById('registernumber').value;

                // You can fetch the user type based on the register number using AJAX or any server-side method.
                // For this example, we'll set a default value.
                let usertype = "student";

                // Set the usertype in the usertype input field
                document.getElementById('usertype').value = usertype;
            }
        </script>

        <?php
        if (isset($_POST['login'])) {
            $registernumber = $_POST["registernumber"];
            $password = $_POST["password"];

            // Connect to the database
            $db = new mysqli("localhost", "root", "12345", "placementcell");

            // Check if the user exists
            $check_query = "SELECT * FROM users WHERE registernumber = '$registernumber'";
            $check_result = $db->query($check_query);

            if ($check_result->num_rows == 1) {
                $user = $check_result->fetch_assoc();
                if (password_verify($password, $user["password"])) {
                    // Authentication successful, store user info in session
                    session_start();
                    $_SESSION["user"] = $user;

                    // Redirect based on usertype
                    if ($user["usertype"] === "admin") {
                        header("Location: admin.php"); // Redirect to admin page
                    } elseif ($user["usertype"] === "student") {
                        header("Location: student.php"); // Redirect to student page
                    } else {
                        echo "Unknown usertype. Contact the administrator.";
                    }
                } else {
                    echo "Incorrect password.";
                }
            } else {
                echo "User not found.";
            }

            // Close the database connection
            $db->close();
        }
        ?>
    </div>
</body>
</html>
