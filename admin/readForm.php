<?php
	require_once 'connect.php';
	
	$conn->query("UPDATE `transaction` SET  `isRead` = 'Yes' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
	header("location:reserve.php");
?>