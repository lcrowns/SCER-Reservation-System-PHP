<?php
	require_once 'connect.php';
	
	$conn->query("UPDATE `transaction` SET  `isReadCancel` = 'Yes' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
	header("location:cancelledtransactions.php");
?>