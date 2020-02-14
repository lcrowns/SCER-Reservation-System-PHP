<?php
	require 'connect.php';
	$query = $conn->query("SELECT * FROM `admin` WHERE `adminID` = '$_SESSION[adminID]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
	$id1=$fetch['adminID'];
	$name = $fetch['firstName'];
	$mname = $fetch['middleName'];
	$lname = $fetch['lastName'];
	$name2 = $fetch['username'];
?>