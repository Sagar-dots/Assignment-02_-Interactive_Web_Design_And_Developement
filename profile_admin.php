<?php
include('includes/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
  $adminid = $_SESSION['odmsaid'];
  $fullName = $_POST['full_name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phone_number'];
  
  $sql = "UPDATE tbladmin SET full_name = :full_name, email_address = :email, phone_number = :phone_number WHERE id = :aid";
  $query = $dbh->prepare($sql);
  $query->bindParam(':full_name', $fullName, PDO::PARAM_STR);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':phone_number', $phoneNumber, PDO::PARAM_STR);
  $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
  
  if ($query->execute()) {
    echo '<script>alert("Profile has been updated")</script>';
  } else {
    echo '<script>alert("Update failed! Try again later")</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
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
                                    <?php
                                    $adminid = $_SESSION['odmsaid'];
                                    $sql = "SELECT * FROM tbladmin WHERE id = :aid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $row) {  
                                    ?>
                                            <form method="post" id="profileForm">
                                                <div class="form-group row">
                                                    <label class="col-12" for="full_name">Full Name:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo htmlentities($row->full_name); ?>" readonly required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-12" for="username">Username:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="username" id="username" value="<?php echo htmlentities($row->username); ?>" readonly>
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row">
                                                    <label class="col-12" for="email">Email:</label>
                                                    <div class="col-12">
                                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlentities($row->email_address); ?>" readonly required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-12" for="phone_number">Contact Number:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo htmlentities($row->phone_number); ?>" readonly required maxlength="10">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-12" for="admin_regdate">Registration Date:</label>
                                                    <div class="col-12">
                                                        <input type="text" class="form-control" id="admin_regdate" name="admin_regdate" value="<?php echo htmlentities($row->admin_regdate); ?>" readonly>
                                                    </div>
                                                </div>

                                                <!-- Buttons -->
                                                <button type="button" id="editButton" class="btn btn-secondary btn-sm" onclick="enableEditing()">Edit</button>
                                                <button type="submit" name="submit" id="updateButton" class="btn btn-primary btn-sm mr-2" style="display: none;">Update</button>
                                                <button type="button" id="cancelButton" class="btn btn-secondary btn-sm" style="display: none;" onclick="disableEditing()">Cancel</button>
                                            </form>
                                    <?php 
                                        }
                                    } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php @include("includes/footer.php");?>

            </div>
        </div>
    </div>

    <script>
        // Function to enable editing
        function enableEditing() {
            document.getElementById("full_name").readOnly = false;
            document.getElementById("email").readOnly = false;
            document.getElementById("phone_number").readOnly = false;

            // Show Update and Cancel buttons, hide Edit button
            document.getElementById("editButton").style.display = "none";
            document.getElementById("updateButton").style.display = "inline-block";
            document.getElementById("cancelButton").style.display = "inline-block";
        }

        // Function to disable editing
        function disableEditing() {
            document.getElementById("full_name").readOnly = true;
            document.getElementById("email").readOnly = true;
            document.getElementById("phone_number").readOnly = true;

            // Hide Update and Cancel buttons, show Edit button
            document.getElementById("editButton").style.display = "inline-block";
            document.getElementById("updateButton").style.display = "none";
            document.getElementById("cancelButton").style.display = "none";
        }
    </script>
</body>
</html>
