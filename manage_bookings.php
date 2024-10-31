<?php
include('includes/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php"); ?>
<body>
<div class="container-scroller">
  <?php @include("includes/header.php"); ?>
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="modal-header">
                <h5 class="modal-title" style="float: left;">Bookings</h5>
              </div>

              <!-- Modal for Viewing Booking Details -->
              <div id="editData4" class="modal fade">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">View Booking Details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="info_update4">
                      <!-- The booking details will be loaded here from view_newbookings.php -->
                      <?php @include("view_newbookings.php");?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Table to Display Bookings -->
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead>
                    <tr>
                      <th class="text-center"></th>
                      <th>Booking ID</th>
                      <th class="d-none d-sm-table-cell">Customer Name</th>
                      <th class="d-none d-sm-table-cell">Mobile Number</th>
                      <th class="d-none d-sm-table-cell">Email</th>
                      <th class="d-none d-sm-table-cell">Booking Date</th>
                      <th class="d-none d-sm-table-cell">Status</th>
                      <th class="text-center" style="width: 15%;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM tblbooking";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                      foreach ($results as $row) {
                    ?>
                    <tr>
                      <td class="text-center"><?php echo htmlentities($cnt); ?></td>
                      <td class="font-w600"><?php echo htmlentities($row->BookingID); ?></td>
                      <td class="font-w600"><?php echo htmlentities($row->Name); ?></td>
                      <td class="font-w600">0<?php echo htmlentities($row->MobileNumber); ?></td>
                      <td class="font-w600"><?php echo htmlentities($row->Email); ?></td>
                      <td class="font-w600">
                        <span class="badge badge-info"><?php echo htmlentities($row->BookingDate); ?></span>
                      </td>
                      <td class="d-none d-sm-table-cell">
                        <span class="badge badge-info"><?php echo $row->Status ? htmlentities($row->Status) : "Not Updated Yet"; ?></span>
                      </td>
                      <td class="text-center">
                        <!-- Edit Booking Button -->
                        <a href="edit_booking.php?BookingID=<?php echo htmlentities($row->BookingID); ?>" class="btn btn-primary btn-sm">Edit</a>
                        <!-- View Details Button to trigger modal -->
                        <button type="button" class="btn btn-info btn-sm view_data" data-id="<?php echo htmlentities($row->BookingID); ?>">View Details</button>
                      </td>
                    </tr>
                    <?php $cnt = $cnt + 1; } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php @include("includes/footer.php"); ?>
    </div>
  </div>
</div>

<?php @include("includes/foot.php"); ?>

<!-- jQuery Script to Load Modal Content -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '.view_data', function(){
      var bookingID = $(this).data('id'); // Get Booking ID
      $.ajax({
        url: "view_newbookings.php",
        type: "post",
        data: {bookingID: bookingID},
        success: function(data){
          $("#info_update4").html(data); // Load content in modal
          $("#editData4").modal('show'); // Show modal
        }
      });
    });
  });
</script>
</body>
</html>
