<?php
	require_once 'connect.php';

		
		
		$conn->query("UPDATE `admin` SET `accStatus` = 'Active' WHERE `adminID` = '$_REQUEST[adminID]'") or die(mysqli_error());
		
		//header("location:user.php");
		echo "<script>alert('Account Activated Successfully!')</script>";
	
?>