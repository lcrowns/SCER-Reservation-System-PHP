<?php
include_once "../classes/transactions.php";
	require_once 'connect.php';
	if(ISSET($_POST['addcharge'])){
		$chargeReason = $_POST['chargeReason'];
		$tentativePrice = $_POST['tentativePrice'];
		$chargeprice = $_POST['chargeprice'];
		$totalPrice = $tentativePrice + $chargeprice;
		$conn->query("UPDATE `transaction` SET `additionalItems` = '$chargeprice',`chargeReason` = '$chargeReason', `totalPrice` = '$totalPrice' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
		echo "<script>alert(' Updated Successfully!')</script>";
		
		
	}
?>