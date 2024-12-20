<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Contact Page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet">

    </head>
    
    <body class="topics-listing-page" id="top">

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
                                <a class="nav-link click-scroll" href="homepage.php">Venues</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="homepage.php">Events</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="homepage.php">FAQs</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="homepage.php">Contact</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>

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

                                    <li class="breadcrumb-item active" aria-current="page">Contact Form</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Contact Form</h2>
                        </div>

                    </div>
                </div>
            </header>


            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4 pb-2">We'd love to hear from you</h3>
                        </div>

                        <div class="col-lg-6 col-12">
                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required="">
                                            
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="subject" id="name" class="form-control" placeholder="Name" required="">
                                            
                                            <label for="floatingInput">Subject</label>
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control" id="message" name="message" placeholder="Tell me about the project"></textarea>
                                            
                                            <label for="floatingTextarea">Tell me about the project</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-12 ms-auto">
                                        <button type="submit" class="form-control">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-lg-5 col-12 mx-auto mt-5 mt-lg-0">
                        <iframe class="google-map" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Barton%20St,%20North%20Parramatta%20NSW%202151,+(A%20beautiful%20Event%20)&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/" width="100%" height="850 px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">gps devices</a></iframe>
                            
                            <h5 class="mt-4 mb-2">Topic Listing Center</h5>

                            <p>Bay St &amp;, Larkin St, San Francisco, CA 94109, United States</p>
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
        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/styles.js"></script>

    </body>
</html>