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

    // Fetch available services for the dropdown
    $sqlServices = "SELECT ID, ServiceName FROM tblservice";
    $queryServices = $dbh->prepare($sqlServices);
    $queryServices->execute();
    $services = $queryServices->fetchAll(PDO::FETCH_OBJ);

    if (isset($_POST['update'])) {
        // Update booking details with status, remarks, and service ID
        $status = $_POST['status'];
        $remarks = $_POST['remarks'];
        $serviceID = $_POST['serviceID'];

        $sql = "UPDATE tblbooking SET Status = :status, Remark = :remarks, ServiceID = :serviceID WHERE BookingID = :bookingID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->bindParam(':remarks', $remarks, PDO::PARAM_STR);
        $query->bindParam(':serviceID', $serviceID, PDO::PARAM_INT);
        $query->bindParam(':bookingID', $bookingID, PDO::PARAM_STR);
        
        if ($query->execute()) {
            echo "<script>alert('Booking updated successfully!');</script>";
            echo "<script>window.location.href = 'manage_bookings.php';</script>";
        } else {
            echo "<script>alert('Failed to update booking.');</script>";
        }
    }
} else {
    echo "<script>alert('Invalid booking ID.'); window.location.href = 'manage_bookings.php';</script>";
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
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pending" <?php if ($result->Status == "Pending") echo "selected"; ?>>Pending</option>
                    <option value="Approved" <?php if ($result->Status == "Approved") echo "selected"; ?>>Approved</option>
                    <option value="Cancelled" <?php if ($result->Status == "Cancelled") echo "selected"; ?>>Cancelled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea name="remarks" class="form-control" required><?php echo htmlentities($result->Remark); ?></textarea>
            </div>
            <div class="form-group">
                <label for="serviceID">Attach Service</label>
                <select name="serviceID" class="form-control" required>
                    <option value="">Select Service</option>
                    <?php foreach ($services as $service) { ?>
                        <option value="<?php echo $service->ID; ?>" <?php if ($result->ServiceID == $service->ID) echo "selected"; ?>>
                            <?php echo htmlentities($service->ServiceName); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update Booking</button>
            <a href="manage_bookings.php" class="btn btn-secondary">Cancel</a>
        </form>
    <?php } ?>
</div>
</body>
</html>
