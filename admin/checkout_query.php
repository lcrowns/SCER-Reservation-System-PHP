<?php
	require_once 'connect.php';
	$time = date("H:i:s", strtotime("+8 HOURS"));
	$conn->query("UPDATE `transaction` SET  `checkOutTime` = '$time', `status` = 'Check Out' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
	header("location:checkout.php");
?>