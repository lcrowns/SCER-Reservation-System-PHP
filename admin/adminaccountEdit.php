<?php
  $page_title = "Update Admin";
  include_once "../config/database.php";
  include_once "../classes/admin.php";
  require_once 'validate.php';
  require 'name.php';



  $database = new Database();
  $db = $database->getConnection();

  $admin = new Admin($db);


  if(isset($_POST['adminID'])){
    $admin->adminID = $_POST['adminID'];
    $stmt = $admin->viewOneAdmin();
  }

  if(isset($_POST['update'])){
    $adminID = $_GET['adminID'];
    $admin->adminID = $adminID;
    $admin->firstName = $_POST['fname'];
    $admin->middleName = $_POST['mname'];
    $admin->lastName = $_POST['lname'];
    $admin->username = $_POST['username'];
    
    
    
    if($admin->updateAdminByAdmin()){
      echo "<script type='text/javascript'>alert('Updated Successfully!'); location='adminAccount.php';</script>";
  }
  else{
    echo "<script type='text/javascript'>alert('Try Again!');</script>";
  }
  }

?>
<html>
<body>
    <form id="editAdminForm" method="POST" action="adminaccountEdit.php?adminID=<?php echo $id1 ?>">

        <div class="modal-body">
    <h5><b>Admin ID number: <?php echo $id1 ?></b></h5>
          <table class='table table-hover table-bordered'>
      <tr>
        <th>First Name</th>
        <th><input type="text" class="form-control" name="fname" value="<?php echo $name ?>" required></th>
      </tr>
      <tr>
        <th>Middle Name</th>
        <th><input type="text" class="form-control" name="mname" value="<?php echo $mname ?>"></th>
      </tr>
      <tr>
        <th>Last Name</th>
        <th><input type="text" class="form-control" name="lname" value="<?php echo $lname ?>" required></th>
      </tr>

      <tr>
        <th>User Name</th>
        <th><input type="text" class="form-control" name="username" value="<?php echo $name2 ?>" required></th>
      </tr>
    
    
    
    
    </table>
    <div class="modal-footer">
          <input type="submit" class="btn" style="background-color:#749da1; color:white" name="update" value="Save">
          <button type="button" class="btn" data-dismiss="modal" style="background-color:#ef6a65; color:white" id="cancel">Cancel</button>
        </div>
        </div>
    
    </form>
  </body>
  </html>

  
