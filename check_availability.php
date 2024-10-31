<?php 
include('includes/dbconnection.php');
// code user email availablity
if(!empty($_POST["username"])) { // Check for "username" instead of "fullname"
  $username = $_POST["username"];
  
  $sql = "SELECT username FROM tbladmin WHERE username = :username";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);

  if($query->rowCount() > 0) {
    echo "<span style='color:red'> Username already exists.</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else {
    echo "<span style='color:green'> Username available for registration.</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}

if(!empty($_POST["companyname"])) {
  $companyname= $_POST["companyname"];

  $sql ="SELECT companyname FROM tblcompany WHERE companyname=:companyname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':companyname', $companyname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> company name already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{

    echo "<span style='color:green'> company name available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


if(!empty($_POST["email_address"])) { // Check for "email_address" instead of "emailid"
  $email = $_POST["email_address"];
  
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo "error : You did not enter a valid email.";
  } else {
    $sql = "SELECT email_address FROM tbladmin WHERE email_address = :email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0) {
      echo "<span style='color:red'> Email already exists.</span>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {
      echo "<span style='color:green'> Email available for registration.</span>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
}


if(!empty($_POST["BidName"])) {
  $bidname= $_POST["BidName"];
  
  $sql ="SELECT BidName FROM tblbid WHERE BidName=:bidname";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':bidname', $bidname, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query -> rowCount() > 0)
  {
    echo "<span style='color:red'> Bid name already exists .</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  } else{
    
    echo "<span style='color:green'> Bid name available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
}


?>
