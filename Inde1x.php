<?php

include('login.php');
// Includes Login Script
include('register.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management Login/Signup</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        body {
            width: 100%;
            height:100%
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="wrapper" id="wrapper">
    <div class="form-wrapper register-section">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" name="username" placeholder="Full Name" required="">
            <input type="text" name="address" placeholder="Address" required="">
            <input type="email" name="emailaddress" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Password" required="">
            <select name="gender" required="">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <button type="submit" name="register">Sign Up</button>
        </form>
    </div>

    <div class="form-wrapper login-section">
        <form action="homepage.php" method="POST">
            <h1>Sign In</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-x-twitter"></i></a>
            </div>
            <span>or use your email and password</span>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <a href="#">Forgot Password?</a>
            <button type="submit" name="submit">Sign In</button>
        </form>
    </div>

    <div class="toggle-wrapper">
        <div class="toggle-content">

            <div class="panel left-panel">
                <h1>Welcome Back, Event Enthusiast!</h1>
                <p>Enter your login details to plan your next amazing event.</p>
                <button class="hidden" id="login">Sign In</button>
            </div>

            <div class="panel right-panel">
                <h1>Join Us, Future Event Host!</h1>
                <p>Create an account to organize memorable events effortlessly.</p>
                <button class="hidden" id="register">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script src="js/script.js"></script>
</body>
</html>