<?php
include_once "../classes/users.php";
include_once "header.php";
include_once "../config/database.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



        <br>
  <h2 style="margin-left: 15px">My Account</h2>
  <hr class='my-4'>
<div class="container form-row">


     <div class="form-group col-md-12">
      <div class="card text-white bg-dark mb-3 border-success" style="max-width: 90;">
  <div class="card-header">Admin Account  
    <a class='btn btn-outline-info' style=' margin-left: 645px' update-id='{$IDnumber}'>Update Account</a>

    <a class='btn btn-outline-warning' style='margin-top: 0px;margin-left: 0px' href='myaccountChangePassword.php' >Change Password</a></div>
  <div class="card-body">
    <h4 class="card-title">ID Number: <b><?php echo $id1; ?></b></h4>
    <h4 class="card-title">First Name: <b><?php echo $name; ?></b></h4>
    <h4 class="card-title">Middle Name: <b><?php echo $name2; ?></b></h4>
    <h4 class="card-title">Last Name: <b><?php echo $name3; ?></b></h4>
    <h4 class="card-title">Address: <b><?php echo $name4; ?></b></h4>
    <h4 class="card-title">Contact Number: <b><?php echo $name5; ?></b></h4>

   
  </div>
</div>
      </div>


            
          
          
          </div>

<!--{START} Edit user modal-->
<div class="modal" id="editUserModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #808080; color:white">
        <h5 class="modal-title">Update Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <div class="modal-body" id="editUserForm">
    <?php include_once "myaccountedit.php"; ?>
    </div>
    
    
    </div>
  </div>
</div>
<!--{END} Edit user modal-->

<!--{START} Edit Pass user modal-->
<div class="modal" id="editUserPassModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #808080; color:white">
        <h5 class="modal-title">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <div class="modal-body" id="editUserPasswordForm">
    <?php include_once "myaccounteditpass.php"; ?>
    </div>
    
    
    </div>
  </div>
</div>
<!--{END} Edit user modal-->

<script>
//Edit User
$(document).on ('click', '.btn-outline-info', function(){
    var id = $(this).attr('update-id');

    $.ajax({
      url:"myaccountedit.php",
      method:"POST",
      data:{IDnumber:id},
      success:function(data){
        $('#editUserForm').html(data);
        $('#editUserModal').modal('show');
      }
    });
  });

//Edit User Pass
$(document).on ('click', 'btn-outline-warning', function(){
    var id = $(this).attr('update-id');

    $.ajax({
      url:"myaccountChangePassword.php",
      method:"POST",
      data:{IDnumber:id},
      success:function(data){
        $('#editUserPassForm').html(data);
        $('#editUserPassModal').modal('show');
      }
    });
  });
</script>
</body>
</html>