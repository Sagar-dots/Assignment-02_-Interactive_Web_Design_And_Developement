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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
  <?php @include("includes/head.php");?>
  <body>

    <div class="container-scroller">
      
     <?php @include("includes/header.php");?>
      
      <div class="container-fluid page-body-wrapper">
        
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="card">
                   <div class="card-body">
                      <form method="post" onsubmit="return checkpass();" name="changepassword">
                          <div class="form-group row">
                              <label class="col-12" for="register1-username">Current Password:</label>
                              <div class="col-12">
                                  <input type="password" class="form-control" name="currentpassword" id="currentpassword"required='true'>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-12" for="register1-email">New Password:</label>
                              <div class="col-12">
                                   <input type="password" class="form-control" name="newpassword"  class="form-control" minlength="4" required="true">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-12" for="register1-password">Confirm Password:</label>
                              <div class="col-12">
                                  <input type="password" class="form-control"  name="confirmpassword" id="confirmpassword" minlength="4" required='true'>
                              </div>
                          </div>
                        
                          <div class="form-group row">
                              <div class="col-12">
                                  <button type="submit" class="btn btn-info" name="submit">
                                      <i class="fa fa-plus "></i> Change
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
      
          
        </div>
        
      </div>
      
    </div>
    <?php @include("includes/footer.php");?>
   

  </body>

</html>
