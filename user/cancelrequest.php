<?php
	require_once 'connect.php';
	$conn->query("UPDATE `transaction` SET `status` = 'Cancelled', `cancelReason` = 'Request Cancelled by the user!' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
	header("location:myreservations.php");
?>