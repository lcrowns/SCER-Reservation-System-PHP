<?php
	require_once 'connect.php';
	if(ISSET($_POST['adminEdit'])){
		$username = $_POST['username'];
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		
		$conn->query("UPDATE `admin` SET `username` = '$username',`firstName` = '$firstName', `middleName` = '$middleName', `lastName` = '$lastName', `address` = '$address', `contactNumber` = '$contactNumber' WHERE `adminID` = '$_REQUEST[adminID]'") or die(mysqli_error());
		
		//header("location:user.php");
		echo "<script>alert('Admin Updated Successfully!')</script>";
	}
?>