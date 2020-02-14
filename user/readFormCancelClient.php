<?php
	require_once 'connect.php';
	
	$conn->query("UPDATE `transaction` SET  `isReadCancelClient` = 'Yes' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
	header("location:mycancelledtransactions.php");
?>