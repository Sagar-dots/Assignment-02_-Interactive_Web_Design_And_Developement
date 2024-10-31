<?php
include('includes/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
    $adminid = $_SESSION['odmsaid'];
    $AName = $_POST['username'];
    $FName = $_POST['fullname'];
    $mobno = $_POST['phone_number'];
    $email = $_POST['email'];
    $sql = "UPDATE tbladmin SET username=:username, full_name=:full_name, phone_number=:phone_number, email_address=:email_address WHERE id=:aid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $AName, PDO::PARAM_STR);
    $query->bindParam(':full_name', $FName, PDO::PARAM_STR);
    $query->bindParam(':phone_number', $mobno, PDO::PARAM_STR);
    $query->bindParam(':email_address', $email, PDO::PARAM_STR);
    $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Profile has been updated")</script>';
}

// Fetch the user's name for display in the navbar
$adminid = $_SESSION['odmsaid'];
$sql = "SELECT full_name FROM tbladmin WHERE id=:aid";
$query = $dbh->prepare($sql);
$query->bindParam(':aid', $adminid, PDO::PARAM_STR);
$query->execute();
$user = $query->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <style>
        .profile-container {
            max-width: 600px;
            margin: auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }
    </style>


    <script>
        function enableEditing() {
            document.querySelectorAll('input[type="text"], input[type="email"]').forEach(input => input.readOnly = false);
            document.getElementById("updateButton").style.display = "inline-block";
            document.getElementById("cancelButton").style.display = "inline-block";
            document.getElementById("editButton").style.display = "none";
        }

        function disableEditing() {
            document.querySelectorAll('input[type="text"], input[type="email"]').forEach(input => input.readOnly = true);
            document.getElementById("updateButton").style.display = "none";
            document.getElementById("cancelButton").style.display = "none";
            document.getElementById("editButton").style.display = "inline-block";
        }
        
    </script>
</head>
<body style="background-color: #f0f8ff;">
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.querySelector('.navbar');
        
        // Function to toggle the scrolled class based on scroll position
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {  // Adjust threshold as needed
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    });
</script>



<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand custom-logo" href="homepage.php" style="color: #000;">
            <i class="bi-back"></i>
            <span>A Beautiful Event</span>
        </a>
        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll" style="color: #fff;"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll text-white" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll text-white" href="homepage.php">Venues</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll text-white" href="homepage.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll text-white" href="homepage.php">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll text-white" href="homepage.php">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="./bookings.php">Bookings</a></li>
                        <li><a class="dropdown-item" href="contact.php">Contact Form</a></li>
                    </ul>
                </li>
            </ul>

            <!-- User Profile Section -->
            <div class="d-none d-lg-block" >
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <div class="nav-item nav-profile me-3">
                        <?php
                        session_start();
                        error_reporting(0);
                        include('includes/dbconnection.php');
                        $aid = $_SESSION['odmsaid'];
                        $sql = "SELECT * from tbladmin where id=:aid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':aid', $aid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {
                                ?>
                                <div class="nav-profile-text">
                                    <p class="mb-1 text-white fs-5" style="font-weight: 600;"><?php echo htmlspecialchars($row->full_name); ?></p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="dropdown">
                        <!-- Button triggering the dropdown -->
                        <a href="#" class="navbar-icon bi-person smoothscroll" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.5em; color: black;">
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="profile.php">
                                <i class="mdi mdi-account mr-2 text-success"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="change_password.php">
                                <i class="mdi mdi-key mr-2 text-success"></i> Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php">
                                <i class="mdi mdi-logout mr-2 text-danger"></i> Signout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


<style>
    .navbar {
        background: linear-gradient(to right,#468e9e,#7bcac3 );
        transition: background-color 0.3s ease;
    }

    /* Navbar styling when scrolled */
    .navbar.scrolled {
        background-color: #80d0c7 !important;
    }

    
.custom-logo span {
    color: #000;
    font-size: 1.2rem;
    transition: transform 0.3s ease, font-size 0.3s ease; 
}

/* Hover effect for smooth scaling */
.custom-logo:hover span {
    transform: scale(1.1); 
    font-size: 1.7rem; 
    color: #000; 
}

.bi-back {
    font-size: 1.2rem; /* Set the icon size directly */
    color: #000; /* Icon color */
}
  
</style>


<!-- Profile Header -->
<header class="site-header d-flex flex-column justify-content-center align-items-center" style="background-color: #4b94a2; padding: 20px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: transparent; padding: 0;">
                        <li class="breadcrumb-item"><a href="homepage.php" class="text-white">Homepage</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Profile</li>
                    </ol>
                </nav>
                <h2 class="text-white" style="font-weight: 600;"><?php echo htmlspecialchars($row->full_name); ?>'s Profile</h2>
            </div>
        </div>
    </div>
</header>


<!-- Profile Form -->
<div class="profile-container mt-5" >
    <?php
    $sql = "SELECT * FROM tbladmin WHERE id=:aid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $row) {
    ?>
            <form method="post">
                <h2>Profile</h2>
                <div class="mb-3">
                    <label class="form-label">Full Name:</label>
                    <input type="text" class="form-control" name="fullname" value="<?php echo $row->full_name; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">User Name:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $row->username; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row->email_address; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact Number:</label>
                    <input type="text" class="form-control" name="phone_number" value="<?php echo $row->phone_number; ?>" readonly maxlength="10">
                </div>
                <div class="mb-3">
                    <label class="form-label">Registration Date:</label>
                    <input type="text" class="form-control" name="registration_date" value="<?php echo $row->admin_regdate; ?>" readonly>
                </div>
                <div class="btn-container">
                    <button type="button" id="editButton" class="btn btn-secondary" onclick="enableEditing()">Edit</button>
                    <button type="submit" name="submit" id="updateButton" class="btn btn-primary" style="display: none;">Update</button>
                    <button type="button" id="cancelButton" class="btn btn-secondary" style="display: none;" onclick="disableEditing()">Cancel</button>
                </div>
            </form>
    <?php 
        }
    } 
    ?>
</div>
<br>
<footer class="site-footer section-padding" style="background-color: #fff;">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mb-4 pb-2">
                        <a class="navbar-brand mb-2" href="#">
                            <i class="bi-back"></i>
                            <span><img src="./images/Logo.png" alt="" " style="width: 200px; height: auto;"></span>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <h6 class="site-footer-title mb-3">Resources</h6>

                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Home</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Books Events</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">FAQs</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                        <h6 class="site-footer-title mb-3">Information</h6>

                        <p class="text-white d-flex mb-1">
                            <a href="tel: 0451625328" class="site-footer-link">
                                0451625328
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:info@company.com" class="site-footer-link">
                                abeautifulevent@company.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                        <p class="copyright-text mt-lg-5 mt-4">Copyright © 2048 A Beautiful Events. All rights reserved.
                        <br><br>Event Management: <a rel="nofollow" href="about.php" target="_blank">Home</a></p>
                        
                    </div>

                </div>
            </div>
        </footer>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
