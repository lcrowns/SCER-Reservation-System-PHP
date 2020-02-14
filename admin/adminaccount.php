<?php
include_once "../classes/admin.php";
include_once "header.php";
include_once "../config/database.php";
require 'name.php';
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
    <a class='btn btn-outline-info' style=' margin-left: 645px' update-id='{$adminID}'>Update Account</a>

    <a class='btn btn-outline-warning' style='margin-top: 0px;margin-left: 0px' href='adminChangePassword.php' >Change Password</a></div>
  <div class="card-body">
    <h4 class="card-title">ID Number: <b><?php echo $adid; ?></b></h4>
    <h4 class="card-title">First Name: <b><?php echo $name; ?></b></h4>
    <h4 class="card-title">Middle Name: <b><?php echo $mname; ?></b></h4>
    <h4 class="card-title">Last Name: <b><?php echo $lname; ?></b></h4>
    <h4 class="card-title">Admin Username: <b><?php echo $adusername; ?></b></h4>

   
  </div>
</div>
      </div>


            
          
          
          </div>
        
  


<!--{START} Edit Admin modal-->
<div class="modal" id="editAdminModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #808080; color:white">
        <h5 class="modal-title">Update Admin Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <div class="modal-body" id="editAdminForm">
    <?php include_once "adminaccountEdit.php"; ?>
    </div>
    
    
    </div>
  </div>
</div>
<!--{END} Edit Admin modal-->

<!--{START} Change password modal-->
    <div class="modal" id="ChangePasswordModal" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <div class="modal-header" style="background-color: yellowgreen; color:white">
            <h5 class="modal-title">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        
        <div class="modal-body" id="ChangePasswordForm">
        <?php include_once "myaccountchangepassword.php"; ?>
        </div>
        
        
        </div>
      </div>
    </div>
    <!--{END} Change password modal-->

<script>
//Edit ADmin
$(document).on ('click', '.btn-outline-info', function(){
    var id = $(this).attr('update-id');

    $.ajax({
      url:"adminaccountEdit.php",
      method:"POST",
      data:{adminID:id},
      success:function(data){
        $('#editAdminForm').html(data);
        $('#editAdminModal').modal('show');
      }
    });
  });


//Change password
$(document).on ('click', '.btn-outline-warning', function(){
    var id = $(this).attr('changepassword-id');
  
    $.ajax({
      url:"myaccountChangePassword.php",
      method:"POST",
      data:{IDnumber:id},

      success:function(data){
        
        $('#ChangePasswordForm').html(data);
        $('#ChangePasswordModal').modal('show');
        
        
      }
    });
  });
</script>
</body>
</html>