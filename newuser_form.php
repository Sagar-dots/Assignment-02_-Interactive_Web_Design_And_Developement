<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(!empty($_POST["username"])) {
  $username = $_POST["username"];
  
  $sql = "SELECT username FROM tbladmin WHERE username = :username";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0) {
    echo "<script>alert('Username already exists. Try another one');</script>";
  } else {
    if(isset($_POST['signup'])) { 
        $fullname = $_POST['full_name'];
        $address = $_POST['address'];
        $email = $_POST['email_address']; 
        $phone = $_POST['phone_number'];
        $password = md5($_POST['password']);
        $role = $_POST['dignity']; // Assuming role is selected as Admin/User
        $gender = $_POST['gender'];
        $admin_regdate = date("Y-m-d H:i:s"); // Assuming registration date is set to current date and time
        $photo = ''; // Placeholder, assuming no photo upload in this form

        $sql = "INSERT INTO tbladmin(full_name, address, email_address, phone_number, password_hash, role, gender, admin_regdate, username, photo) 
                VALUES(:fullname, :address, :email, :phone, :password, :role, :gender, :admin_regdate, :username, :photo)";
        $query = $dbh->prepare($sql);

        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':role', $role, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':admin_regdate', $admin_regdate, PDO::PARAM_STR);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':photo', $photo, PDO::PARAM_STR);

        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId) {
            echo "<script>alert('Registration successful. Now you can log in');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
  }
}
?>

<script>
    function checkAvailability() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data: 'email_address=' + $("#emailid").val(),
            type: "POST",
            success: function(data)
            {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>

<script>
    function checkAvailability2() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data: 'username=' + $("#username").val(),
            type: "POST",
            success: function(data)
            {
                $("#user-availability-status2").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>

<script type="text/javascript">
    function valid()
    {
        if(document.signup.password.value!= document.signup.confirmpassword.value)
        {
            alert("Password and Confirm Password Field do not match  !!");
            document.signup.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
<div class="card-body">
    <form  method="post" name="signup" onSubmit="return valid();">
        <div class="row ">
            <div class="form-group col-md-6">
                <select class="form-control"   name="dignity"  id="dignity"  required>
                    <option value="">Select permisions</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="username" id="username" placeholder="User Name" onBlur="checkAvailability2()" required="required">
                <span id="user-availability-status2" style="font-size:12px;"></span>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required="required">
            </div>
        </div>
        <div class="row">
            
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="phone_number" placeholder="Mobile Number" maxlength="10" required="required">
            </div>
            <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email_address" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                <span id="user-availability-status" style="font-size:12px;"></span> 
            </div>
        </div>
        <div class="row">
            
            <div class="form-group col-md-6">
                <input type="password"  class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group col-md-6">
                <input type="password"  class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
            </div>
        </div>
        <div class="row">
            
        </div>
        <div class="form-group">
            <input type="submit" value="Register" name="signup" id="submit" class="btn btn-info">
        </div>
    </form>
</div>