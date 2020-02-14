
<?php
  include_once '../config/database.php';
  include_once '../classes/users.php';
  require_once 'validate.php';
  require 'name.php';



date_default_timezone_set('Asia/Manila');

$IDnumber = $_SESSION['IDnumber'];



$database = new Database();
$db = $database->getConnection();

$users = new Users($db);
$users->IDnumber = $IDnumber;
$users->ReadOneUserAccount();
$accStatus = $users->accStatus;
$userType = $users->userType;
 if($userType != "User"){
 header('location:message.php');
}else if($accStatus == "Inactive"){
  header('location:message2.php');
}

else{

};
$id1 = $users->IDnumber;
$name = $users->firstName;
$name2 = $users->middleName;
$name3 = $users->lastName;
$name4 = $users->address;
$name5 = $users->contactNumber;
$uspass = $users->password;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SCER || Sports Complex Event Reservation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="../assets/bootstrap/4.2.1/css/bootstrap.min.css">

  <!-- JQuery Slim for Bootstrap-->
  <script src="../assets/jquery/3.2.1/jquery-3.3.1.slim.min.js"></script> 
  
  <!-- JQuery-->
  <script src="../assets/jquery/3.3.1/jquery-3.3.1.min.js"></script> 

  <!-- Popper.js-->
  <script src="../assets/popper.js/1.12.9/popper.min.js"></script>

  <!--Bootstrap JS-->
  <script src="../assets/bootstrap/4.2.1/js/bootstrap.min.js"></script>


</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#424c51">

  <a class="navbar-brand" href="home.php">
    <img src="../scer logo.png" height="50px">
  </a>

 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarColor02" style="font-size: 25px">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reservation.php">Reserve Venue</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myreservations.php">My Reservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="notification.php">Notifications</a>
      </li>
      <li class="nav-item">
        <div class="btn-group" style="float:right;margin-left: 875px">
 <p class="nav-link" style="font-size: 25px">Account</p>
  <button type="button"  class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>
  <div class="dropdown-menu">
    
    
    <a class="dropdown-item" href="myaccount.php">My Account</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
      </li>
    </ul>
    
  </div>


  </nav>


    