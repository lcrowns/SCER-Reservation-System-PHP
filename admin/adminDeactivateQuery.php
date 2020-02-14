<?php
	require_once 'connect.php';

		
		
		$conn->query("UPDATE `admin` SET `accStatus` = 'Inactive' WHERE `adminID` = '$_REQUEST[adminID]'") or die(mysqli_error());
		
		//header("location:user.php");
		echo "<script>alert('Account Deactivated Successfully!')</script>";
	
?>