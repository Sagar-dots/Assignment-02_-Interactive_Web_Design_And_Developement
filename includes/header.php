<?php @include("includes/head.php");?>

<body>

  <div class="container-scroller">
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row">

  <div class="navbar-menu-wrapper d-flex align-items-stretch w-100">
   
    <ul class="navbar-nav navbar-nav-left">
    <li>
  <div class="col-md-4" style="background-color: transparent;">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: transparent;">
      <a class="navbar-brand brand-logo" href="dashboard.php">
        <img class="img-avatar" style="height: 70px; width: 70 px; background-color: transparent; position: relative; z-index: 1000;" src="/Sea/assets/img/companyimages/logo.jpg" alt="">
      </a>
    </div>          
  </div>
</li>


        <li class="nav-item dropdown">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="manage_service.php">Manage Service</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="manage_event.php">Manage Events</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking management</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="manage_bookings.php">Manage Bookings</a>
              <a class="dropdown-item" href="approved_bookings_admin.php">Approved Bookings</a>
              <a class="dropdown-item" href="cancelled_bookings.php">Cancelled Bookings</a>
            </div>
          </li>


          
           <?php
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where id=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {  
            foreach($results as $row)
            { 
                if($row->role=="Admin"  )
                { 
                    ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User management</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="userregister.php">Manage users</a>
              <?php
                                $aid=$_SESSION['odmsaid'];
                                $sql="SELECT * from  tbladmin where id=:aid";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':aid',$aid,PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {  
                                    foreach($results as $row)
                                    { 
                                        if($row->role=="Admin" )
                                        { 
                                            ?>
              <a class="dropdown-item" href="user_permission.php">User Roles</a>

                                            <?php 
                                        } 
                                    }
                                } ?> 
            </div>
          </li>
              <?php 
                } 
            }
        } ?> 
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
            <div class="dropdown-menu  navbar-dropdown" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="event_report.php">Events List Reports</a>
              <!-- <a class="dropdown-item" href="services_report.php">Services List Reports</a> -->
              <a class="dropdown-item" href="booking_report.php">Booking Reports</a>
              <a class="dropdown-item" href="btndates_report.php">Btndates Reports</a>

            </div>
          </li>

          <li class="nav-item nav-profile dropdown">
        <?php
        session_start();
        error_reporting(0);
        include('dbconnection.php');
        $aid=$_SESSION['odmsaid'];
        $sql="SELECT * from  tbladmin where id=:aid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $row)
          { 
            ?>
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <?php 
                if($row->Photo=="avatar15.jpg")
                { 
                  ?>
                  <img class="img-avatar" src="assets/img/avatars/profile.jpeg" alt="">
                  <?php 
                } else { 
                  ?>
                  <img class="img-avatar" src="assets/img/profileimages/profile.jpeg<?php  echo $row->photo;?>" alt=""> 
                  <?php 
                } ?>
              </div>
              <div class="nav-profile-text ">
                <p class="mb-1 text-white"><?php  echo $row->full_name;?> </p>
              </div>
            </a>
            <?php
          }
        } ?>

        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="profile_admin.php">
            <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="change_password.php"><i class="mdi mdi-key mr-2 text-success"></i> Change Password </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">
              <i class="mdi mdi-logout mr-2 text-danger"></i> Signout </a>
            </div>
          </li>
    
        </ul>

         <ul class="navbar-nav navbar-nav-right">

      
      
      
        </ul>
      </div>
    </nav>


<script>
  $(window).scroll(function () {
  console.log($(window).scrollTop())
  if ($(window).scrollTop() > 63) {
    $('.navbar').addClass('navbar-fixed');
  }
  if ($(window).scrollTop() < 64) {
    $('.navbar').removeClass('navbar-fixed');
  }
});
</script>
<style>
  .navbar-fixed {
  top: 0;
  z-index: 100;
  position: fixed;
  width: 100%;
}
</style>