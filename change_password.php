<?php
session_start();
include('includes/dbconnection.php');

// Redirect to logout if the session is not active
if (strlen($_SESSION['odmsaid']) == 0) {
    header('location:logout.php');
    exit();
}

if (isset($_POST['submit'])) {
    $adminid = $_SESSION['odmsaid'];
    $currentPassword = $_POST['currentpassword'];
    $newPassword = $_POST['newpassword'];

    // Fetch the current password hash from the database
    $sql = "SELECT password_hash FROM tbladmin WHERE id=:adminid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':adminid', $adminid, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if ($result && password_verify($currentPassword, $result->password_hash)) {
        // Hash the new password
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $con = "UPDATE tbladmin SET password_hash=:newpassword WHERE id=:adminid";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1->bindParam(':adminid', $adminid, PDO::PARAM_STR);
        $chngpwd1->bindParam(':newpassword', $newPasswordHash, PDO::PARAM_STR);
        $chngpwd1->execute();

        echo '<script>alert("Your password has been successfully changed");</script>';
    } else {
        echo '<script>alert("Your current password is incorrect");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

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

</head>
<body style="background-color: #f0f8ff;">

<div class="container-scroller">
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
                    <li class="nav-item"><a class="nav-link click-scroll text-white" href="homepage.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll text-white" href="homepage.php">Venues</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll text-white" href="homepage.php">Events</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll text-white" href="homepage.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link click-scroll text-white" href="homepage.php">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="./bookings.php">Bookings</a></li>
                            <li><a class="dropdown-item" href="contact.php">Contact Form</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- User Profile Section (Removed redundant session_start here) -->
                <div class="d-none d-lg-block">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="nav-item nav-profile me-3">
                            <?php
                            $aid = $_SESSION['odmsaid'];
                            $sql = "SELECT * FROM tbladmin WHERE id=:aid";
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
                            <a href="#" class="navbar-icon bi-person smoothscroll" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.5em; color: black;"></a>
                            <!-- Dropdown menu -->
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account mr-2 text-success"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-key mr-2 text-success"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php"><i class="mdi mdi-logout mr-2 text-danger"></i> Signout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
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
                <h2 class="text-white" style="font-weight: 600;"> Change Password</h2>
            </div>
        </div>
    </div>
</header>

<div class="custom-container-wrapper">
    <div class="custom-main-panel">
        <div class="custom-content-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="custom-card">
                        <div class="custom-card-body">
                            <h3 class="custom-card-title">Change Password</h3>
                            <form method="post" onsubmit="return checkpass();" name="changepassword">
                                <div class="custom-form-group">
                                    <label class="custom-form-label" for="currentpassword">Current Password:</label>
                                    <input type="password" class="custom-form-control" name="currentpassword" required>
                                </div>
                                <div class="custom-form-group">
                                    <label class="custom-form-label" for="newpassword">New Password:</label>
                                    <input type="password" class="custom-form-control" name="newpassword" minlength="4" required>
                                </div>
                                <div class="custom-form-group">
                                    <label class="custom-form-label" for="confirmpassword">Confirm Password:</label>
                                    <input type="password" class="custom-form-control" name="confirmpassword" minlength="4" required>
                                </div>
                                <div class="custom-btn-container">
                                    <button type="submit" class="custom-btn" name="submit">
                                        Change Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
  .custom-container-wrapper {
    background-color: #f0f8ff;
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Align items to the top */
   
}

.custom-main-panel {
    width: 100%;
}

.custom-content-wrapper {
    padding: 20px;
}

.custom-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    
}

.custom-card-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: black;
    text-align: center;
    margin-bottom: 1.5rem;
}

.custom-form-group {
    margin-bottom: 1.5rem;
}

.custom-form-label {
    font-weight: 500;
    color: black;
    margin-bottom: 0.5rem;
    display: block;
}

.custom-form-control {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    background-color: #e9ecef;
    border: none;
}

.custom-btn-container {
    text-align: center;
    margin-top: 1.5rem;
}

.custom-btn {
    background-color: #17a2b8;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.custom-btn:hover {
    background-color: #138496;
}

</style>




</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
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
</html>
