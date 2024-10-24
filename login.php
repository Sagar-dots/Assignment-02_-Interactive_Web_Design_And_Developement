<?php
session_start(); // Start the session

// Initialize error message
$error = ''; 

if (isset($_POST['submit'])) {
    // Check if fields are empty
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is Empty";
    } else {
        // Define $username and $password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Establishing Connection with Server
        $connection = mysqli_connect("localhost", "root", "", "a_beautiful_event");

        // Check connection
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // To protect against MySQL injection
        $username = mysqli_real_escape_string($connection, stripslashes($username));
        $password = mysqli_real_escape_string($connection, stripslashes($password));

        // SQL query to fetch information of registered users
        $query = mysqli_query($connection, "SELECT * FROM customer WHERE username='$username'");
        
        // Check if username exists
        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_assoc($query);
            // Verify password
            if (password_verify($password, $row['password'])) {
                $_SESSION['login_customer'] = $username; // Initializing Session
                // redirection here; user will move to homepage
                header('location: index.php');
               
            } else {
                $error = "Username or Password is invalid";
            }
        } else {
            $error = "Username or Password is invalid";
        }

        mysqli_close($connection); // Closing Connection
    }
}
?>
