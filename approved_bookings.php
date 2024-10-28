<?php
include('checklogin.php');
check_login();

if (isset($_POST['submit'])) {
    $bid = $_GET['bookid'];
    $name = $_POST['name'];
    $mobnum = $_POST['contact'];
    $email = $_POST['email'];
    $edate = $_POST['eventdate'];
    $est = $_POST['est'];
    $eetime = $_POST['eetime'];
    $vaddress = $_POST['address'];
    $eventtype = $_POST['eventtype'];
    $addinfo = $_POST['info'];
    $bookingid = mt_rand(100000000, 999999999);
    
    $sql = "INSERT INTO tblbooking (BookingID, ServiceID, Name, MobileNumber, Email, EventDate, EventStartingtime, EventEndingtime, VenueAddress, EventType, AdditionalInformation) 
            VALUES (:bookingid, :bid, :name, :mobnum, :email, :edate, :est, :eetime, :vaddress, :eventtype, :addinfo)";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingid', $bookingid, PDO::PARAM_STR);
    $query->bindParam(':bid', $bid, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':edate', $edate, PDO::PARAM_STR);
    $query->bindParam(':est', $est, PDO::PARAM_STR);
    $query->bindParam(':eetime', $eetime, PDO::PARAM_STR);
    $query->bindParam(':vaddress', $vaddress, PDO::PARAM_STR);
    $query->bindParam(':eventtype', $eventtype, PDO::PARAM_STR);
    $query->bindParam(':addinfo', $addinfo, PDO::PARAM_STR);
    
    $query->execute();
    $LastInsertId = $dbh->lastInsertId();
    
    if ($LastInsertId > 0) {
        echo '<script>alert("Booking Request Has Been added.")</script>';
        echo "<script>window.location.href ='new_bookings.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookings</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <style>
        /* Custom CSS styles here */
        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 1em;
            background-color: #f9f9f9;
        }
        .table thead th {
            background-color: #145da0;
            color: #ffffff;
            padding: 12px 15px;
            text-align: center;
            font-weight: 600;
        }
        .table tbody tr:hover {
            background-color: #e0f7ff;
        }
        .badge-info {
            background-color: #2e8bc0;
            color: #ffffff;
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: 600;
        }
        .btn {
            padding: 6px 10px;
            font-size: 0.85em;
            color: #ffffff;
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #2e8bc0;
        }
        @media (max-width: 768px) {
            .table thead th, .table tbody td {
                font-size: 0.85em;
                padding: 8px;
            }
            .btn {
                padding: 5px 8px;
            }
        }
    </style>
</head>
<body class="bookings-page" id="top">

<main>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="homepage.php">
                <span>A Beautiful Event</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-5 me-lg-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php#section_1">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#section_2">Venues</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#section_3">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#section_4">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#section_5">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item active" href="bookings.php">Bookings</a></li>
                            <li><a class="dropdown-item" href="contact.php">Contact Form</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="homepage.php">Homepage</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bookings</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">Bookings</h2>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card w-100">
                            <div class="modal-header">
                                <h5 class="modal-title" style="float: left;">New Bookings</h5>
                            </div>

                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Booking ID</th>
                                            <th class="d-none d-sm-table-cell">Customer Name</th>
                                            <th class="d-none d-sm-table-cell">Mobile Number</th>
                                            <th class="d-none d-sm-table-cell">Email</th>
                                            <th class="d-none d-sm-table-cell">Booking Date</th>
                                            <th class="d-none d-sm-table-cell">Status</th>
                                            <th class="text-center" style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tblbooking WHERE Status='Approved'";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) { ?>
                                                <tr>
                                                    <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->BookingID); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->Name); ?></td>
                                                    <td class="font-w600">0<?php echo htmlentities($row->MobileNumber); ?></td>
                                                    <td class="font-w600"><?php echo htmlentities($row->Email); ?></td>
                                                    <td class="font-w600">
                                                        <span class="badge badge-info"><?php echo htmlentities($row->EventDate); ?></span>
                                                    </td>
                                                    <td class="font-w600">
                                                        <?php if ($row->Status == "") { 
                                                            echo "Not Updated Yet"; 
                                                        } else {
                                                            echo htmlentities($row->Status); 
                                                        } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="view_booking.php?bookingid=<?php echo htmlentities($row->BookingID); ?>" class="btn btn-info">View</a>
                                                        <a href="edit_booking.php?bookingid=<?php echo htmlentities($row->BookingID); ?>" class="btn btn-primary">Edit</a>
                                                        <a href="delete_booking.php?bookingid=<?php echo htmlentities($row->BookingID); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php $cnt++; }
                                        } else { ?>
                                            <tr>
                                                <td colspan="8" class="text-center">No bookings found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p class="text-center">© 2024 A Beautiful Event. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
