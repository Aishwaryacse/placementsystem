<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('pic1.jpeg'); /* Replace with your background image file's name and path */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
        }
        .navbar-right a:hover {
            color: #00568c;
        }
        .navbar-right a + a {
            margin-left: 20px; /* Increased margin to create more space between buttons */
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Add transparency to the background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .content {
            padding: 20px;
        }
        .buttons {
            text-align: center;
            margin-top: 20px;
        }
        .button {
            background-color: #0077B5;
            color: #fff;
            padding: 8px 16px; /* Adjust the button size */
            text-decoration: none;
            border-radius: 5px;
            display: inline-block; /* Place buttons adjacent to each other */
            margin-right: 10px; /* Add some spacing between buttons */
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
        <h1>Welcome to Our Professional Network</h1>
        <p>Connect with professionals, share your achievements, and grow your network.</p>
        <div class="content">
            <p>We empower you to take charge of your educational and career aspirations. Our platform offers a seamless blend of education and career management tools, along with personalized chatbot assistance, to help you navigate your path to success.</p>
            <hr />
            <h4>Key Features</h4>
            <p><b>Create your profile - </b>Build a comprehensive educational profile and resume that reflects your unique qualifications.</p>
            <p><b>Explore Opportunities - </b>Discover a world of job listings, internships, and career development programs.</p>
            <p><b>Chat with our careerbot - </b>Get instant answers to your career questions from our intelligent chatbot. Just ask, and we'll guide you.</p>
            <hr />
            <h4>Ready to Get Started?</h4>
            <p>Sign in or create your account to embark on your educational and career journey. Let's make your dreams a reality.</p>
        </div>
        <div class="buttons">
            <a class="button" href="login.php">Login</a>
            <a class="button" href="signup.php">Sign Up</a>
        </div>
    </div>
</body>
</html>
