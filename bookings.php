
<?php
include('checklogin.php');
check_login();


if(isset($_POST['submit']))
{
  $bid=$_GET['bookid'];
  $name=$_POST['name'];
  $mobnum=$_POST['contact'];
  $email=$_POST['email'];
  $edate=$_POST['eventdate'];
  $est=$_POST['est'];
  $eetime=$_POST['eetime'];
  $vaddress=$_POST['address'];
  $eventtype=$_POST['eventtype'];
  $addinfo=$_POST['info'];
  $bookingid=mt_rand(100000000, 999999999);
  $sql="insert into tblbooking(BookingID,ServiceID,Name,MobileNumber,Email,EventDate,EventStartingtime,EventEndingtime,VenueAddress,EventType,AdditionalInformation)values(:bookingid,:bid,:name,:mobnum,:email,:edate,:est,:eetime,:vaddress,:eventtype,:addinfo)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
  $query->bindParam(':bid',$bid,PDO::PARAM_STR);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':edate',$edate,PDO::PARAM_STR);
  $query->bindParam(':est',$est,PDO::PARAM_STR);
  $query->bindParam(':eetime',$eetime,PDO::PARAM_STR);
  $query->bindParam(':vaddress',$vaddress,PDO::PARAM_STR);
  $query->bindParam(':eventtype',$eventtype,PDO::PARAM_STR);
  $query->bindParam(':addinfo',$addinfo,PDO::PARAM_STR);
  $bookingDate = new DateTime($edate); // Use the event date from the form
  $month = $bookingDate->format('F'); // Full month name (e.g., 'October')
  $day = $bookingDate->format('j'); // Day of the month without leading zeros (e.g., '26')
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    echo '<script>alert("Booking Request Has Been added.")</script>';
    echo "<script>window.location.href ='new_bookings.php'</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }

}

?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bookings</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
             .wrappers {
            display: flexbox;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin: 20px 0;}
        </style>

<script src="https://kit.fontawesome.com/5e4b38806c.js" crossorigin="anonymous"></script>

    </head>
    
    <body class="bookings-page" id="top">

        <main>

        <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="homepage.php">
                        <i class="bi-back"></i>
                        <span>A Beautiful Event</span>
                    </a>
                    <div class="d-lg-none ms-auto me-4">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="homepage.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2">Venues</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_5">Contact</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="./all_bookings.php">Bookings</a></li>

                                    <li><a class="dropdown-item" href="contact.php">Contact Form</a></li>
                                </ul>
                            </li>
                        </ul>
                        

                        <div class="d-none d-lg-block">
  <div class="col-md-12 d-flex justify-content-between align-items-center ">
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
            <p class="mb-1 text-white fs-1.5" ><?php echo htmlspecialchars($row->full_name); ?></p>
          </div>
          <?php
        }
      }
      ?>
    </div>
    <div class="dropdown">
  <!-- Button triggering the dropdown -->
  <a href="#" class="navbar-icon bi-person smoothscroll" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.5em; color: #000;">
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

<section class="section-padding">
<div class="container-fluid">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card w-100">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Your Bookings</h5>
                </div>
                
              
              
              <!-- Trigger Button -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editData4">
  View Booking Details
</button>

<!-- Modal for Viewing Booking Details -->
<div id="editData4" class="modal fade">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">View Booking Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="info_update4">
        <?php include("view_newbookings.php"); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

            
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead>
                <tr>
                 <th class="text-center"></th>
                 <th>Booking ID</th>
                 <th class="d-none d-sm-table-cell">Cutomer Name</th>
                 <th class="d-none d-sm-table-cell">Mobile Number</th>
                 <th class="d-none d-sm-table-cell">Email</th>
                 <th class="d-none d-sm-table-cell">Booking Date</th>
                 <th class="d-none d-sm-table-cell">Status</th>
                 
               </tr>
             </thead>

<tbody>
               <?php
               $sql="SELECT * from tblbooking";
               $query = $dbh -> prepare($sql);
               $query->execute();
               $results=$query->fetchAll(PDO::FETCH_OBJ);

               $cnt=1;
               if($query->rowCount() > 0)
               {
                foreach($results as $row)
                  {               ?>
                    <tr>
                      <td class="text-center"><?php echo htmlentities($cnt);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->BookingID);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->Name);?></td>
                      <td class="font-w600">0<?php  echo htmlentities($row->MobileNumber);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                      <td class="font-w600">
                        <span class="badge badge-info"><?php  echo htmlentities($row->BookingDate);?></span>
                      </td>
                      <?php if($row->Status=="")
                      { 
                        ?>
                        <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                        <?php 
                      } else { ?>
                        <td class="d-none d-sm-table-cell">
                          <span class="badge badge-info"><?php  echo htmlentities($row->Status);?></span>
                        </td>
                        
                        <?php 
                      } ?> 
                      
                    </tr>
                    <?php
                    $cnt=$cnt+1;
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  

  
</div>

</div>

</div>





  <div class="col-lg-12 col-12 text-center" style="margin-top: 50px; margin-right: 200px;">
    <button type="button" class="custom-btn" data-toggle="modal" data-target="#AddData4">
      <i class="fas fa-plus"></i> Add Bookings
    </button>
  </div>


<!-- Modal Structure -->
<div id="AddData4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">New Booking Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form method="POST" id="contactForm" name="contactForm" class="contactForm">
          <div class="row">
            <!-- Full Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="label" for="name">Full Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter full name">
              </div>
            </div>

            <!-- Email Address -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="label" for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address">
              </div>
            </div>

            <!-- Contact Number -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="label" for="contact">Contact No</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact number">
              </div>
            </div>

            <!-- Event Date -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="label" for="eventdate">Event Date</label>
                <input type="date" class="form-control" name="eventdate" id="eventdate">
              </div>
            </div>

            <!-- Event Start Time -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="label" for="est">Event Start Time</label>
                <select type="text" class="form-control" name="est" required="true">
                            <option value="">Select Starting Time</option>
                            <option value="1 a.m">1 a.m</option>
                            <option value="2 a.m">2 a.m</option>
                            <option value="3 a.m">3 a.m</option>
                            <option value="4 a.m">4 a.m</option>
                            <option value="5 a.m">5 a.m</option>
                            <option value="6 a.m">6 a.m</option>
                            <option value="7 a.m">7 a.m</option>
                            <option value="8 a.m">8 a.m"</option>
                            <option value="9 a.m">9 a.m</option>
                            <option value="10 a.m">10 a.m</option>
                            <option value="11 a.m">11 a.m</option>
                            <option value="12 p.m">12 p.m</option>
                            <option value="1 p.m">1 p.m</option>
                            <option value="2 p.m">2 p.m</option>
                            <option value="3 p.m">3 p.m</option>
                            <option value="4 p.m">4 p.m</option>
                            <option value="5 p.m">5 p.m</option>
                            <option value="6 p.m">6 p.m</option>
                            <option value="7 p.m">7 p.m</option>
                            <option value="8 p.m">8 p.m</option>
                            <option value="9 p.m">9 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="12 a.m">12 a.m</option>
                          </select>
              </div>
            </div>

            <!-- Event End Time -->
            <div class="col-md-6"> 
                        <div class="form-group">
                          <label class="label" for="email">Event Finish Time</label>
                          <select type="text" class="form-control" name="eetime" required="true">
                            <option value="">Select Finish Time</option>
                            <option value="1 a.m">1 a.m</option>
                            <option value="2 a.m">2 a.m</option>
                            <option value="3 a.m">3 a.m</option>
                            <option value="4 a.m">4 a.m</option>
                            <option value="5 a.m">5 a.m</option>
                            <option value="6 a.m">6 a.m</option>
                            <option value="7 a.m">7 a.m</option>
                            <option value="8 a.m">8 a.m"</option>
                            <option value="9 a.m">9 a.m</option>
                            <option value="10 a.m">10 a.m</option>
                            <option value="11 a.m">11 a.m</option>
                            <option value="12 p.m">12 p.m</option>
                            <option value="1 p.m">1 p.m</option>
                            <option value="2 p.m">2 p.m</option>
                            <option value="3 p.m">3 p.m</option>
                            <option value="4 p.m">4 p.m</option>
                            <option value="5 p.m">5 p.m</option>
                            <option value="6 p.m">6 p.m</option>
                            <option value="7 p.m">7 p.m</option>
                            <option value="8 p.m">8 p.m</option>
                            <option value="9 p.m">9 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="12 a.m">12 a.m</option>
                          </select>
                        </div>
                      </div>

            <!-- Venue Address -->
            <div class="col-md-12">
              <div class="form-group">
                <label class="label" for="address">Venue Address</label>
                <textarea name="address" class="form-control" id="address" cols="30" rows="3" placeholder="Enter venue address"></textarea>
              </div>
            </div>

            <!-- Type of Event -->
            <div class="col-md-12">
              <div class="form-group">
                <label class="label" for="eventtype">Type of Event</label>
                <select class="form-control" name="eventtype" required="true">
                  <option value="">Choose Event Type</option>
                  <?php 
                  $sql2 = "SELECT * from tbleventtype";
                  $query2 = $dbh->prepare($sql2);
                  $query2->execute();
                  $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                  foreach ($result2 as $row) { ?>  
                    <option value="<?php echo htmlentities($row->EventType);?>"><?php echo htmlentities($row->EventType);?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- Additional Information -->
            <div class="col-md-12">
              <div class="form-group">
                <label class="label" for="info">Additional Information</label>
                <textarea name="info" class="form-control" id="info" cols="30" rows="3" placeholder="Enter additional information"></textarea>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-12 text-right">
              <button type="submit" name="submit" class="custom-btn">Book Event</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

                                   


                  </section>

            <!-- <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4">Other Bookings</h3>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0" style="height:450px">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="approved_bookings.php" onclick:>
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Approved Bookings</h5>

                                            <p class="mb-0">Bookings that have been Approved by the Admin</p>
                                        </div>
                                    </div>

                                    <img src="https://cdn-icons-png.flaticon.com/512/637/637264.png" style="object-fit:contain ;height:300px;" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mt-lg-3" >
                        <a href="canceled_bookings.php" onclick:>
                            <div class="custom-block custom-block-overlay">
                                <div class="d-flex flex-column h-100">
                                    <img src="https://letsgofido.com.au/wp-content/uploads/2018/11/cancellation-300x197.png" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">Cancelled bookings</h5>

                                            <p class="text-white">Bookings that were canceled</p>

                                            <a href="manage_service.php" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">25</span>
                                    </div>

                                    <div class="social-share d-flex">
                                        <p class="text-white me-4">Share:</p>

                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>

                                        <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                    </div>

                                    <div class="section-overlay"></div>
                                </div>
                                
                  </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->
        </main>

        <!-- <footer class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mb-4 pb-2">
                        <a class="navbar-brand mb-2" href="homepage.php">
                            <i class="bi-back"></i>
                            <span><img src="/Sea/assets/img/companyimages/logo.jpg" width= '120 px' alt=""></span>
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
        </footer> -->

        <!-- JAVASCRIPT FILES -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/script.js"></script>
        <script>
          $(document).ready(function() {
  $('.view-details-btn').click(function() {
    var bookingID = $(this).data('id'); // Get booking ID from data attribute

    // AJAX request
    $.ajax({
      url: 'view_newbookings.php',
      type: 'POST',
      data: { edit_id4: bookingID },
      success: function(response) {
        // Load response into modal body
        $('#info_update4').html(response);
      }
    });
  });
});

        </script>

    </body>
</html>