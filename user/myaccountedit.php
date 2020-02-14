<?php
  $page_title = "Update User";
  include_once "../config/database.php";
  include_once "../classes/users.php";
  require_once 'validate.php';
  require 'name.php';



  $database = new Database();
  $db = $database->getConnection();

  $users = new Users($db);


  if(isset($_POST['IDnumber'])){
    $users->IDnumber = $_POST['IDnumber'];
    $stmt = $users->viewOneUser();
  }

  if(isset($_POST['update'])){
    $IDnumber = $_GET['IDnumber'];
    $users->IDnumber = $IDnumber;
    $users->firstName = $_POST['firstName'];
    $users->middleName = $_POST['middleName'];
    $users->lastName = $_POST['lastName'];
    $users->address = $_POST['address'];
    $users->contactNumber = $_POST['contactNumber'];
    
    
    if($users->updateUserByUser()){
      echo "<script type='text/javascript'>alert('Updated Successfully!'); location='myaccount.php';</script>";
  }
  else{
    echo "<script type='text/javascript'>alert('Try Again!');</script>";
  }
  }

?>
<html>
<body>
    <form id="editUserForm" method="POST" action="myaccountedit.php?IDnumber=<?php echo $id1 ?>">

        <div class="modal-body">
    <h5><b>ID number: <?php echo $id1 ?></b></h5>
          <table class='table table-hover table-bordered'>
      <tr>
        <th>First Name</th>
        <th><input type="text" class="form-control" name="firstName" value="<?php echo $name ?>" required></th>
      </tr>

      <tr>
        <th>Middle Name</th>
        <th><input type="text" class="form-control" name="middleName" value="<?php echo $name2 ?>"></th>
      </tr>
    
    <tr>
        <th>Last Name</th>
        <th><input type="text" class="form-control" name="lastName" value="<?php echo $name3 ?>" required></th>
      </tr>
    
    <tr>
        <th>Address</th>
        <th><input type="text" class="form-control" name="address" value="<?php echo $name4 ?>" required></th>
      </tr>
    
    <tr>
        <th>Contact Number</th>
        <th><input type="text" class="form-control" name="contactNumber" value="<?php echo $name5 ?>" required></th>
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

  
