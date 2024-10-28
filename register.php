<?php

if (isset($_POST['register'])) {
    // Check for empty fields
    if (empty($_POST['full_name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['address']) || empty($_POST['gender']) || empty($_POST['emailaddress']) || empty($_POST['role'])) {
        echo "All fields are required.";
    } else {
        // Retrieve and sanitize inputs
        $fullName = htmlspecialchars($_POST['full_name']);  // Updated to 'full_name'
        $username = htmlspecialchars($_POST['username']);  // New field for username
        $address = htmlspecialchars($_POST['address']);
        $emailAddress = filter_var($_POST['emailaddress'], FILTER_SANITIZE_EMAIL);
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        
        // Hash the password securely
        $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Set default status (active)
        $status = 1; // Adjust as needed.

        // Database credentials
        $servername = "localhost";
        $usernamehost = "root";
        $passwordhost = "";
        $dbname = "a_beautiful_events";

        // Create connection
        $conn = mysqli_connect($servername, $usernamehost, $passwordhost, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare SQL query to insert data into tbladmin
        $sql = "INSERT INTO tbladmin (full_name, username, address, email_address, status, password_hash, role, gender, admin_regdate) 
                VALUES ('$fullName', '$username', '$address', '$emailAddress', $status, '$passwordHash', '$role', '$gender', NOW())";
          
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Redirect to main page after successful registration
            header("Location: /Sea/index.php"); // Replace "/Sea/Index.php" with the path to your main page
            exit(); // Make sure to call exit() after header to stop further script execution
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
}
?>
