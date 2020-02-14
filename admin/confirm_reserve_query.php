<?php
	require_once 'connect.php';
	if(ISSET($_POST['add_form'])){
		$IDnumber = $_POST['IDnumber'];
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		$checkIn = $_POST['date'];
		$daysUse = $_POST['daysUse'];
		$price = $_POST['price'];
		$additionalItems="";
		$tentativePrice= $price * $daysUse;

		$conn->query("INSERT INTO `transaction`(totalPrice) VALUES('$tentativePrice')") or die(mysqli_error());
		echo "<script>alert('Checked in successfully!')</script>";
				}

					
				
	//}	
?>