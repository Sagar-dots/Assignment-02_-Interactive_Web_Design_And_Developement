<?php
include('includes/checklogin.php');
check_login();

if(isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = "UPDATE tbladmin SET status = '0' WHERE id = :rid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':rid', $rid, PDO::PARAM_STR);
    if ($query->execute()) { // Only execute once
        echo "<script>alert('User blocked');</script>"; 
        echo "<script>window.location.href = 'userregister.php'</script>";
    } else {
        echo '<script>alert("Update failed! Try again later");</script>';
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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="modal-header">
                                <h5 class="modal-title" style="float: left;">Registered Users</h5>    
                                <div class="card-tools" style="float: right;">
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#delete" ></i> Blocked users
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#registeruser" ><i class="fas fa-plus" ></i> Register User
                                    </button>
                                </div>      
                            </div>
                            
                            <div class="modal fade" id="registeruser">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Register user</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <?php @include("newuser_form.php");?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="modal fade" id="delete">
                                <div class="modal-dialog modal-xl ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Deleted user</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <?php @include("deleted_users.php");?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            
                            <div id="editData" class="modal fade">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit user info</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="info_update">
                                            <?php @include("update_user.php");?>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="card-body table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="">Name</th>
                                            <th class="text-center">Role</th>
                                            <th class="">Email</th>
                                            <th class=" text-center">Date registered</th>
                                            <th class="text-center" style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    
<tbody><?php
$sql = "SELECT * FROM tbladmin WHERE status = '1'";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

if($query->rowCount() > 0) {
    foreach($results as $row) {    
?>
    <tr>
        <td class="text-center"><?php echo htmlentities($cnt); ?></td>
        <td><?php echo htmlentities($row->full_name); ?></td>
        <td class="text-center"><?php echo htmlentities($row->role); ?></td>
        <td><?php echo htmlentities($row->email_address); ?></td>
        <td class="text-center">
            <span><?php echo htmlentities(date("d-m-Y", strtotime($row->admin_regdate))); ?></span>
        </td>
        <td class="text-center">
            <a href="#" class="edit_data btn btn-purple rounded" id="<?php echo htmlentities($row->id); ?>" title="Click to edit">
                <i class="mdi mdi-pencil-box-outline" aria-hidden="true"></i>
            </a>
            <a href="userregister.php?delid=<?php echo htmlentities($row->id); ?>" onclick="return confirm('Do you really want to delete?');" title="Block this User" class="btn btn-danger rounded">
                <i class="mdi mdi-block-helper"></i>
            </a>
        </td>
    </tr>
<?php
        $cnt++;
    }
}
?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <?php @include("includes/footer.php");?>
                
            </div>
            
        </div>
        
    </div>
    
    
    
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.edit_data',function()
            {
                var edit_id=$(this).attr('id');
                $.ajax(
                {
                    url:"update_user.php",
                    type:"post",
                    data:{edit_id:edit_id},
                    beforeSend: function(){
                        $(".se-pre-con").show();
                    },
                    complete:function(){
                        $(".se-pre-con").hide();
                    },

                    success:function(data)
                    {
                        $("#info_update").html(data);
                        $("#editData").modal('show');
                    }

                });
            });
        });
    </script>
</body>

</html>
