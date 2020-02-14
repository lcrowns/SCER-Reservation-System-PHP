<?php
	require 'connect.php';
	$query = $conn->query("SELECT * FROM `users` WHERE `IDnumber` = '$_SESSION[IDnumber]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
	$id1=$fetch['IDnumber'];
	$name = $fetch['firstName'];
	$name2 = $fetch['middleName'];
	$name3 = $fetch['lastName'];
	$name4 = $fetch['address'];
	$name5 = $fetch['contactNumber'];
	$uspass = $fetch['password'];
?>