<?php
	require_once 'connect.php';

		
		
		$conn->query("UPDATE `users` SET `accStatus` = 'Active' WHERE `IDnumber` = '$_REQUEST[IDnumber]'") or die(mysqli_error());
		
		//header("location:user.php");
		echo "<script>alert('Account Activated Successfully!')</script>";
	
?>