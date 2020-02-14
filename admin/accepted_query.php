<?php
	require_once 'connect.php';

	$conn->query("UPDATE `transaction` SET  `status` = 'Accepted', `clientnotif` = 'Your request have been accepted!' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
	header("location:accepted.php");
?>