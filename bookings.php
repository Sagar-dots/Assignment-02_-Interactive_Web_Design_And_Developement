
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
    .new-bookings-container {
        display: flex; /* Use Flexbox */
        flex-direction: row; /* Stack the blocks vertically */
        gap: 60px; /* Space between blocks */
    }

    .new-booking-block {
        display: flex; /* Flex container for individual booking */
        justify-content: space-between; /* Space out the items */
        align-items: center;
        padding: left 0px; /* Center items vertically */
        padding: 10px; /* Padding inside each block */
        border: 1px solid #ddd; /* Border for visual separation */
        border-radius: 30px; /* Rounded corners */
        background-color: white; /* Background color */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for depth */
        background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        background-size: cover;
        height:400px;
        width: 800px;
    }

    .edit_data2 {
        background-color: #6f42c1; /* Button color */
        color: white; /* Text color */
        border: none; /* No border */
        padding: 6px 15px ;
        padding:auto; /* Padding for button */
        border-radius: 50px; /* Rounded button corners */
        cursor: pointer; /* Pointer cursor on hover */

    }

    .edit_data2:hover {
        background-color: #5a32a5; /* Darker shade on hover */
    }
        </style>

<script src="https://kit.fontawesome.com/5e4b38806c.js" crossorigin="anonymous"></script>

    </head>
    
    <body class="bookings-page" id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
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
                                <a class="nav-link click-scroll" href="index.php#section_1">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php#section_2">Venues</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php#section_3">Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php#section_4">FAQs</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="index.php#section_5">Contact</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item active" href="bookings.php">Bookings</a></li>

                                    <li><a class="dropdown-item" href="contact.html">Contact Form</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
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
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-12 text-center">
            <h3 class="mb-4">New Bookings</h3>
        </div>

        <div class="col-lg-8 col-12 mt-3 mx-auto">
            <div class="new-bookings-container"> <!-- New class applied here -->
                <?php
                $sql = "SELECT * from tblbooking where Status is null";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                if ($query->rowCount() > 0) {
                    foreach ($results as $row) { ?>
                        <div class="new-booking-block"> <!-- Unique class for individual bookings -->
                            <div class="flex-grow-1">
                                <h5 class="mb-2">Booking ID: <?php echo htmlentities($row->BookingID); ?></h5>
                                <p class="mb-1"><strong>Customer Name:</strong> <?php echo htmlentities($row->Name); ?></p>
                                <p class="mb-1"><strong>Mobile Number:</strong> 0<?php echo htmlentities($row->MobileNumber); ?></p>
                                <p class="mb-1"><strong>Email:</strong> <?php echo htmlentities($row->Email); ?></p>
                                <p class="mb-1"><strong>Booking Date:</strong> 
                                    <span class="badge badge-info"><?php echo htmlentities($row->BookingDate); ?></span>
                                </p>
                                <p class="mb-1"><strong>Status:</strong> 
                                    <?php echo ($row->Status == "") ? "Not Updated Yet" : htmlentities($row->Status); ?>
                                </p>
                            </div>
                            <div class="text-center">
                                <a href="#" class="edit_data2" id="<?php echo ($row->ID); ?>">
                                <i class="fa-solid fa-user-pen" style="align-items:center;" aria-hidden="true" title="Take action"></i>
                                </a>
                            </div>
                        </div>
                                     <?php 
                                              } 
                                         } else { ?>
                                              <div class="alert alert-warning text-center" role="alert">
                                                        No new bookings found.
                                     </div>
                              <?php } ?>
                        </div>
                   </div>
                 </div>
            </div>

<!-- 



                            <div class="custom-block custom-block-bookings bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <img src="images/topics/undraw_online_ad_re_ol62.png" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-bookings-info d-flex">
                                        <div>
                                            <h5 class="mb-2">The National Mueseum </h5>

                                            <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut sunt illo fuga natus molestias! Quod ea perferendis nostrum cum, totam quas reprehenderit molestias, exercitationem temporibus odit sint in incidunt dolorem.</p>

                                            <a href="topics-detail.html" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                                        </div>

                                        <span class="badge bg-large_venues rounded-pill ms-auto">30</span>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-block custom-block-bookings bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <img src="images/topics/undraw_Podcast_audience_re_4i5q.png" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-bookings-info d-flex">
                                        <div>
                                            <h5 class="mb-2">Edith Room</h5>

                                            <p class="mb-0">Address: Verity Lane Market</p>

                                            <a href="topics-detail.html" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                                        </div>

                                        <span class="badge bg-music rounded-pill ms-auto">60</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-lg-12 col-12">
                 
                            <nav aria-label="Page navigation example" style="padding-left: 500px;">
                                <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>

                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->

                    </div>
                </div>
            </section>
            <section class="section-padding">
             <!-- Button to trigger modal -->
<div class="col-lg-12 col-12">
  <div>
    <button type="button" class="btn btn-sm btn-info custom-btn" data-toggle="modal" data-target="#AddData4" style="float:right; margin-right:200px;">
      <i class="fas fa-plus"></i> Add Bookings
    </button>
  </div>
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
              <button type="submit" name="submit" class="btn btn-success">Book Event</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

                                   


            /section>

            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4">Other Bookings</h3>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mt-3 mb-4 mb-lg-0" style="height:450px">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="#" onclick:>
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

                        <div class="col-lg-6 col-md-6 col-12 mt-lg-3">
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
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mb-4 pb-2">
                        <a class="navbar-brand mb-2" href="index.php">
                            <i class="bi-back"></i>
                            <span><img src="logo.svg" alt=""></span>
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
                        <!-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English</button>

                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Thai</button></li>

                                <li><button class="dropdown-item" type="button">Myanmar</button></li>

                                <li><button class="dropdown-item" type="button">Arabic</button></li>
                            </ul>
                        </div> -->

                        <p class="copyright-text mt-lg-5 mt-4">Copyright © 2048 A Beautiful Events. All rights reserved.
                        <br><br>Event Management: <a rel="nofollow" href="about.php" target="_blank">Home</a></p>
                        
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/script.js"></script>

    </body>
</html>