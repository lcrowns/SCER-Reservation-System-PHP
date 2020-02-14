<?php
include_once '../config/database.php';
include_once '../classes/admin.php';
session_start();

date_default_timezone_set('Asia/Manila');

$adminID = $_SESSION['adminID'];



$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);
$admin->adminID = $adminID;
$admin->readOneAdminAccount();
$userType = $admin->userType;
if($userType != "Admin"){
  header('location:message.php');
}
else{

};
$adid = $admin->adminID;
$adname = $admin->firstName;
$admname = $admin->middleName;
$adlname = $admin->lastName;
$adusername = $admin->username;
$adpass = $admin->password;

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


 



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">
    <img src="../scer logo.png" height="50px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02" style="font-size: 25px">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reserve.php">Reservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sports2.php">Sports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="courts.php">Venues</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="notification.php">Notifications</a>
      </li>
      <li class="nav-item">
        <div class="btn-group" >
 <p class="nav-link" style="font-size: 25px">Reports</p>
  <button type="button"  class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>
  <div class="dropdown-menu">
    
    
    <a class="dropdown-item" href="generate.php">Transactions</a>
    <a class="dropdown-item" href="generate2.php">Clients</a>
  </div>
</div>
      </li>

      <li class="nav-item">
        <div class="btn-group" style="float:right;margin-left: 650px">
 <p class="nav-link" style="font-size: 25px">Account</p>
  <button type="button"  class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    
  </button>
  <div class="dropdown-menu">
    
    
    <a class="dropdown-item" href="adminaccount.php">My Account</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
      </li>
    </ul>
    
  </div>
</nav>

  
    
    