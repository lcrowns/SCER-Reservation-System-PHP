<?php
	require_once 'connect.php';
	
	$conn->query("UPDATE `transaction` SET  `isReadClient` = 'Yes' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
	header("location:myacceptedreservations.php");
?>