<?php
	require_once 'connect.php';
	if(ISSET($_POST['add_form'])){
		//$courtNumber = $_POST['courtNumber'];
		$daysUse = $_POST['daysUse'];
		$additionalItems = $_POST['additionalItems'];
		$totalPrice = $_POST['totalPrice'];
		$query = $conn->query("SELECT * FROM `transaction` where `courtID` = '$courtID' &&`status` = 'Check In'") or die(mysqli_error());
		$row = $query->num_rows;
		$time = date("H:i:s", strtotime("+8 HOURS"));
		if($row > 0){
			echo "<script>alert('Venue not available')</script>";
		}else{
			$query2 = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
			$fetch2 = $query2->fetch_array();
			$finalprice = $fetch2['price'];
			//$daysUse = $_POST['daysUse'];
			//$additionalItems = $_POST['additionalItems'];
			//$totalindays = $finalprice * $daysUse;
			//$overall = $totalindays + $additionalItems;
			$tentativePrice = $fetch2['totalPrice'];
			$days = $fetch2['daysUse'];
			$totalPrice = $tentativePrice * $days;
			$checkout = date("Y-m-d", strtotime($fetch['checkIn']."+".$daysUse."DAYS"));
			$conn->query("UPDATE `transaction` SET `status` = 'Check In', `checkInTime` = '$time', `checkOut` = '$checkOut', `totalPrice` = '$totalPrice' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());

			header("location:checkin.php");
		}
	}
?>