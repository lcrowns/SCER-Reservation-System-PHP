<?php
	require_once 'connect.php';
	if(ISSET($_POST['add_feedback'])){
		$feedback = $_POST['feedback'];
		
		$conn->query("UPDATE `transaction` SET `feedback` = '$feedback' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
		echo "<script>alert('Updated Successfully!')</script>";
		//header("location:mycheckouts.php");
	}
?>