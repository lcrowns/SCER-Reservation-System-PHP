<?php
	require_once 'connect.php';
	if(ISSET($_POST['delete_pending'])){
		$cancelReason = $_POST['cancelReason'];
		
		$conn->query("UPDATE `transaction` SET `status` = 'Cancelled', `cancelReason` = '$cancelReason', `cancelBy` ='Admin', `clientnotifcancel`='Your transaction has been cancelled by the Admin.' WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
		echo "<script>alert('Updated!')</script>";
		
	}
?>