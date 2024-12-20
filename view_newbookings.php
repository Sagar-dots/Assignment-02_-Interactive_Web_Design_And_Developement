<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Use bookingID as the parameter based on the earlier setup
$bookingID = $_POST['bookingID'];
$sql = "SELECT tblbooking.BookingID, tblbooking.Name, tblbooking.MobileNumber, tblbooking.Email, tblbooking.EventDate, 
        tblbooking.EventStartingtime, tblbooking.EventEndingtime, tblbooking.VenueAddress, tblbooking.EventType, 
        tblbooking.AdditionalInformation, tblbooking.BookingDate, tblbooking.Remark, tblbooking.Status, 
        tblbooking.UpdationDate, tblservice.ServiceName, tblservice.SerDes, tblservice.ServicePrice 
        FROM tblbooking 
        LEFT JOIN tblservice ON tblbooking.ServiceID = tblservice.ID 
        WHERE tblbooking.BookingID = :bookingID";

$query = $dbh->prepare($sql);
$query->bindParam(':bookingID', $bookingID, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
  foreach ($results as $row) { 
    ?>
    <table border="1" class="table align-items-center table-flush table-bordered">
      <tr>
        <th>Booking Number</th>
        <td><?php echo htmlentities($row->BookingID); ?></td>
        <th>Client Name</th>
        <td><?php echo htmlentities($row->Name); ?></td>
      </tr>
      <tr>
        <th>Mobile Number</th>
        <td><?php echo htmlentities($row->MobileNumber); ?></td>
        <th>Email</th>
        <td><?php echo htmlentities($row->Email); ?></td>
      </tr>
      <tr>
        <th>Event Date</th>
        <td><?php echo htmlentities($row->EventDate); ?></td>
        <th>Event Starting Time</th>
        <td><?php echo htmlentities($row->EventStartingtime); ?></td>
      </tr>
      <tr>
        <th>Event Ending Time</th>
        <td><?php echo htmlentities($row->EventEndingtime); ?></td>
        <th>Venue Address</th>
        <td><?php echo htmlentities($row->VenueAddress); ?></td>
      </tr>
      <tr>
        <th>Event Type</th>
        <td><?php echo htmlentities($row->EventType); ?></td>
        <th>Additional Information</th>
        <td><?php echo htmlentities($row->AdditionalInformation); ?></td>
      </tr>
      <tr>
        <th>Service Name</th>
        <td><?php echo htmlentities($row->ServiceName ?? "Not Added Yet"); ?></td>
        <th>Service Description</th>
        <td><?php echo htmlentities($row->SerDes ?? "Not Added Yet"); ?></td>
      </tr>
      <tr>
        <th>Service Price</th>
        <td>$<?php echo htmlentities($row->ServicePrice ?? "Not Added Yet"); ?></td>
        <th>Booking Date</th>
        <td><?php echo htmlentities($row->BookingDate); ?></td>
      </tr>
      <tr>
        <th>Order Final Status</th>
        <td>
          <?php
          if ($row->Status == "Approved") {
            echo "Your Booking has been approved";
          } elseif ($row->Status == "Cancelled") {
            echo "Your Booking has been cancelled";
          } else {
            echo "Not Responded Yet";
          }
          ?>
        </td>
        <th>Admin Remark</th>
        <td><?php echo htmlentities($row->Remark ?? "Not Updated Yet"); ?></td>
      </tr>
      <tr>
        <th>Last Updated</th>
        <td colspan="3"><?php echo htmlentities($row->UpdationDate ?? "Not Updated Yet"); ?></td>
      </tr>
    </table>
    <?php
  }
} else {
  echo "<p>No booking details found.</p>";
}
?>
