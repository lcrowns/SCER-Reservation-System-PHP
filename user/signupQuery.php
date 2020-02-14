<?php
	require_once 'connect.php';
	if(ISSET($_POST['register'])){
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];

		if ($password != $confirmpassword) {
			echo "<script>alert('Password does not match!')</script>";
		} else{
		$conn->query("INSERT INTO `users` SET `firstName` = '$firstName', `middleName` = '$middleName', `lastName` = '$lastName', `address` = '$address', `contactNumber` = '$contactNumber', `username` = '$username', `password` = '$password' ") or die(mysqli_error());
		echo "<script>alert('Registered Successfully!')</script>";
		//header("location:index.php");
		}
	}
?>