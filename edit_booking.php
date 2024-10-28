<?php
include('includes/dbconnection.php');
if (isset($_GET['BookingID'])) {
    $bookingID = $_GET['BookingID'];

    // Fetch the booking details
    $sql = "SELECT * FROM tblbooking WHERE BookingID = :bookingID";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bookingID', $bookingID, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);

    if (isset($_POST['update'])) {
        // Update booking details
        $name = $_POST['name'];
        $mobileNumber = $_POST['mobileNumber'];
        $email = $_POST['email'];
        $status = $_POST['status'];

        $sql = "UPDATE tblbooking SET Name = :name, MobileNumber = :mobileNumber, Email = :email, Status = :status WHERE BookingID = :bookingID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobileNumber', $mobileNumber, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':bookingID', $bookingID, PDO::PARAM_STR);
        
        if ($query->execute()) {
            echo "<script>alert('Booking updated successfully!');</script>";
            echo "<script>window.location.href = 'manage_bookings.php';</script>";
        } else {
            echo "<script>alert('Failed to update booking.');</script>";
        }
    }
} else {
    echo "<script>alert('Invalid booking ID.'); window.location.href = '.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Booking</title>
</head>
<body>
<div class="container mt-5">
    <h2>Edit Booking</h2>
    <?php if ($result) { ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Customer Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlentities($result->Name); ?>" required>
            </div>
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label>
                <input type="text" name="mobileNumber" class="form-control" value="<?php echo htmlentities($result->MobileNumber); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlentities($result->Email); ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="Pending" <?php if ($result->Status == "Pending") echo "selected"; ?>>Pending</option>
                    <option value="Approved" <?php if ($result->Status == "Approved") echo "selected"; ?>>Approved</option>
                    <option value="Cancelled" <?php if ($result->Status == "Cancelled") echo "selected"; ?>>Cancelled</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update Booking</button>
            <a href="all_bookings.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php } ?>
</div>
</body>
</html>
