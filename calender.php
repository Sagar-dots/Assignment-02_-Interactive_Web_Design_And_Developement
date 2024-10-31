<?php
// Start the session at the very top of the file
session_start();
include('includes/dbconnection.php');
error_reporting(0);

if (!isset($_SESSION['odmsaid'])) {
    // Redirect if not logged in
    header('Location: index.php');
    exit;
}

$aid = $_SESSION['odmsaid'];
$sql = "SELECT * FROM tbladmin WHERE id=:aid";
$query = $dbh->prepare($sql);
$query->bindParam(':aid', $aid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <style>
body {
   
    text-align: center;
    font-size: 12px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}

#calendar {
    width: 700px;  /* Reduced width */
    margin: 20px auto; /* Center the calendar */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Optional shadow for better appearance */
    padding: 10px; /* Optional padding */
    border-radius: 8px; /* Rounded corners */
    background-color: #ffffff; /* White background for contrast */
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}
</style>

</head>

<body class="bookings-page" id="top" style="background-color: #f0f8ff;">
    <nav class="navbar navbar-expand-lg" style=" background: linear-gradient(to right,#468e9e,#7bcac3 );">
        <div class="container">
            <a class="navbar-brand" href="homepage.php">
                <i class="bi-back"></i>
                <span>A Beautiful Event</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
                <div class="d-none d-lg-block">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="nav-item nav-profile me-3">
                            <?php
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                                    echo '<p class="mb-1 text-white fs-1.5">' . htmlspecialchars($row->full_name) . '</p>';
                                }
                            }
                            ?>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="navbar-icon bi-person smoothscroll" data-toggle="dropdown" style="font-size: 1.5em; color: #000;"></a>
                            <div class="dropdown-menu navbar-dropdown">
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
                            <li class="breadcrumb-item active text-white" aria-current="page">Events</li>
                        </ol>
                    </nav>
                    <h2 class="text-white" style="font-weight: 600; text-align:start">Events</h2>
                </div>
            </div>
        </div>
    </header>

    <div class="response"></div>
    <div id="calendar"></div>

    <!-- FullCalendar and jQuery scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                editable: false,
                events: 'fetch-event.php',
                displayEventTime: true,
                selectable: true,
                selectHelper: true,
                eventClick: function (event) {
                    if (confirm("Do you really want to delete?")) {
                        $.ajax({
                            url: 'delete-event.php',
                            data: { id: event.id },
                            type: "POST",
                            success: function (response) {
                                if (parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    displayMessage("Deleted Successfully");
                                }
                            }
                        });
                    }
                }
            });
        });

        function displayMessage(message) {
            $(".response").html("<div class='success'>" + message + "</div>");
            setTimeout(function () { $(".success").fadeOut(); }, 2000);
        }
    </script>
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
