<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_court'])){
		$courtName = $_POST['courtName'];
		$sportID = $_POST['sportID'];
		$price = $_POST['price'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		$conn->query("UPDATE `court` SET `courtName` = '$courtName', `price` = '$price', `photo` = '$photo_name', `sportID` = '$sportID' WHERE `courtID` = '$_REQUEST[courtID]'") or die(mysqli_error());
		echo "<script>alert('Court Updated Successfully!')</script>";
		//header("location:courts.php");
	}
?>