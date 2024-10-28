<?php
session_start();
error_reporting(0);
include('dbconnection.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL to check if the username exists
    $sql = "SELECT * FROM tbladmin WHERE username = :username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    // Check if a user was found and if the password is correct
    if ($result && password_verify($password, $result->password_hash)) {
        $_SESSION['odmsaid'] = $result->id;
        $_SESSION['login'] = $result->username;
        $_SESSION['permission'] = $result->full_name; // Store full name in session
        $status = $result->status;
        $role = $result->role; // Get the role from the database

        // Check if the account is active (status = 1)
        if ($status == "1") {
            // Redirect based on role
            if ($role === 'Admin') {
                echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
            } elseif ($role === 'Customer') {
                echo "<script type='text/javascript'> document.location ='homepage.php'; </script>";
            } else {
                // If role is neither Admin nor Customer
                echo "<script>
                    alert('Your role does not have access.');
                    document.location ='index.php';
                    </script>";
            }
        } else {
            echo "<script>
                alert('Your account is disabled. Please approach the Admin.');
                document.location ='index.php';
                </script>";
        }
    } else {
        // If the login details are incorrect
        echo "<script>
            alert('Invalid credentials or only admins and customers can log in.');
            document.location ='index.php';
        </script>";
    }
}
?>
