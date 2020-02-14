<?php
	require_once 'connect.php';
	if(ISSET($_POST['userEdit'])){
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		
		$conn->query("UPDATE `users` SET `firstName` = '$firstName', `middleName` = '$middleName', `lastName` = '$lastName', `address` = '$address', `contactNumber` = '$contactNumber' WHERE `IDnumber` = '$_REQUEST[IDnumber]'") or die(mysqli_error());
		
		//header("location:user.php");
		echo "<script>alert('User Updated Successfully!')</script>";
	}
?>