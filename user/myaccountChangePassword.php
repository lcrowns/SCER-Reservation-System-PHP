<?php 
  require_once "connect.php";
    include_once "header.php";
    include_once "../classes/users.php";
 ?>
<!DOCTYPE html>

<html lang = "en">
  <head>
    <title>SCER</title>
    <meta charset = "utf-8" />
    
    
  </head>
<body>
  <br>
  <h2 style="margin-left: 15px">My Account</h2>
    <a href="myaccount.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
    <hr class='my-4'>
  
  
  
  

  <form method = "POST">
  <div class="container form-row">
     <div class="form-group col-md-12">
        <div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
          <div class="card-header">Users Update Password </div>
            <div class="card-body">
              <h4 class="card-title">Old Password <input type = "password" name = "oldpassword" class = "form-control" required /></h4>
              <h4 class="card-title">New Password: <input type = "password" name = "newpassword" class = "form-control" required/></h4>
              <h4 class="card-title">Re-Type New Password: <input type = "password" name = "confirmpassword" class = "form-control" required/></h4>
              
               <div class = "col-md-12">
                <button name = "enterpass" class = " btn btn-outline-info" style="margin-left: 918px"> Ok</button>
                
                <a href="myaccount.php">
                <button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
                  </div>
   
          </div>
        </div>
      </div>

    
</form>

      <?php


  if(ISSET ($_POST['enterpass'])){

    
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    
    if($oldpassword == $uspass){
      if($oldpassword == $newpassword){
        echo "<script type='text/javascript'>alert('Your New Password must not be your old password!');</script>";
        
      } else

      if($newpassword == $confirmpassword){
        //echo 'Nice';
        $users->password = $_POST['newpassword'];
        if($users->updateUserPasswordByUser()){
      echo "<script type='text/javascript'>alert('Password Changed Successfully!'); location='myaccount.php';</script>";
  }
  else{
    echo "<script type='text/javascript'>alert('Try Again!');</script>";
  }
        header('myaccountChangePassword.php');
      } else 
      echo "<script type='text/javascript'>alert('New Password does not match!');</script>";

    } else 
    echo "<script type='text/javascript'>alert('Old Password Incorrect!');</script>";

  } else 
    echo "";
      
?>

    <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
  <li class="breadcrumb-item"><a href="myaccount.php">My Account</a></li>
  <li class="breadcrumb-item active">Change Password</li>
</ol>

  
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>  
</html>