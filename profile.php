<?php
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
  $adminid=$_SESSION['odmsaid'];
  $AName=$_POST['username'];
  $FName=$_POST['full_name'];
  $mobno=$_POST['phone_number'];
  $email=$_POST['email_address'];
  $sql="update tbladmin set username=:username,full_name=:full_name,phone_number=:phone_number,email_address=:email_address where id=:aid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
  $query->bindParam(':full_name',$FName,PDO::PARAM_STR);
  $query->bindParam(':email_address',$email,PDO::PARAM_STR);
  $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
  $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
  $query->execute();
  echo '<script>alert("Profile has been updated")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Profile</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        

<script src="https://kit.fontawesome.com/5e4b38806c.js" crossorigin="anonymous"></script>

    </head>
    
    <body class="profile-page" id="top">

        <main>

        <nav class="navbar navbar-expand-lg" style="background-color: #4b94a2;">
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


            
<body id='top'>
    

   
        
        
        
        <div class="container-fluid page-body-wrapper">
            
            
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <?php
                                    $adminid=$_SESSION['odmsaid'];
                                    $sql="SELECT * from  tbladmin where id=:aid";
                                    $query = $dbh -> prepare($sql);
                                    $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                        foreach($results as $row)
                                        {  
                                            ?>
                                            <form method="post">
                                                <h2>Profile</h2>
                                            <div class="form-group row">
                                                    <label class="col-12" for="register1-email">Full Name:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="username" value="<?php  echo $row->full_name;?>" readonly='true' >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-12" for="register1-email">User Name:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="username" value="<?php  echo $row->username;?>" required='true' >
                                                    </div>
                                                </div>
                                               
                                             
                                           <div class="form-group row">
                                            <label class="col-12" for="register1-password">Email:</label>
                                            <div class="col-12">
                                              <input type="email" class="form-control" name="email" value="<?php  echo $row->email_address;?>" required='true'>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                        <label class="col-12" for="register1-password">Contact Number:</label>
                                        <div class="col-12">
                                         <input type="text" class="form-control" name="phone_number" value="<?php  echo $row->phone_number;?>" required='true' maxlength='10'>
                                     </div>
                                 </div>
                                 <div class="form-group row">
                                  <label class="col-12" for="register1-password">Registration Date:</label>
                                  <div class="col-12">
                                   <input type="text" class="form-control" id="email2" name="" value="<?php  echo $row->admin_regdate;?>" readonly="true">
                               </div>
                           </div>
                           
                  </div>       
                  <?php 
              }
          } ?>
          <br>
         
      </form>
  </div>
</div>
</div>
</div>
</div>


<?php @include("includes/footer.php");?>

</div>

</div>

</div>

<?php @include("includes/foot.php");?>

</body>

</html>