<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['saveupdates'])) {
  $adminid = $_SESSION['editid2'];
  $fullName = $_POST['fullname'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  
  $sql4 = "UPDATE tbladmin SET full_name = :fullname, address = :address, email_address = :email WHERE id = :aid";
  $query4 = $dbh->prepare($sql4);
  $query4->bindParam(':fullname', $fullName, PDO::PARAM_STR);
  $query4->bindParam(':address', $address, PDO::PARAM_STR);
  $query4->bindParam(':email', $email, PDO::PARAM_STR);
  $query4->bindParam(':aid', $adminid, PDO::PARAM_STR);
  
  if ($query4->execute()) {
    echo '<script>alert("Profile has been updated")</script>';
  } else {
    echo '<script>alert("Update failed! Try again later")</script>';
  }
}
?>

<div class="card-body">
  <h4 class="card-title">Update User Form</h4>
  <form class="forms-sample" method="post" enctype="multipart/form-data">
    <?php
    $eid = $_POST['edit_id'];
    $sql = "SELECT * FROM tbladmin WHERE id = :eid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    
    if ($query->rowCount() > 0) {
      foreach ($results as $row) { 
        $_SESSION['editid2'] = $row->id;
    ?>
        <div class="form-group">
          <label for="fullname">Full Name</label>
          <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo htmlentities($row->full_name); ?>" required>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" id="address" value="<?php echo htmlentities($row->address); ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlentities($row->email_address); ?>" required>
        </div>
    <?php
      }
    }
    ?>
    <button type="submit" name="saveupdates" class="btn btn-primary btn-fw mr-2">Update</button>
    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
  </form>
</div>
