<?php
	require_once 'connect.php';
	if(ISSET($_POST['delete_pending'])){
		$cancelReason = $_POST['cancelReason'];
		
		$conn->query("UPDATE `transaction` SET `status` = 'Cancelled', `cancelReason` = '$cancelReason', `cancelBy` ='Client', `notifcancel`='A transaction has been cancelled by the Client.' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
		echo "<script>alert('Updated Successfully!')</script>";
		header("location:mypendingreservations.php");
	}
?>