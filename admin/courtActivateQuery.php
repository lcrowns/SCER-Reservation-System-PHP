<?php
	require_once 'connect.php';

		
		
		$conn->query("UPDATE `court` SET `Stat` = 'Active' WHERE `courtID` = '$_REQUEST[courtID]'") or die(mysqli_error());
		
		//header("location:user.php");
		echo "<script>alert('Venue Activated Successfully!')</script>";
	
?>