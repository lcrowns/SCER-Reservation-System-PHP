<?php
	if(ISSET($_POST['add_court'])){
		$courtName = $_POST['courtName'];
		$sportsName = $_POST['sportsName'];
		$price = $_POST['price'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);

		
		$conn->query("INSERT INTO `court` (courtName, price, photo, sportsName) VALUES('$courtName', '$price', '$photo_name', '$sportsName')") or die(mysqli_error());
		echo "<script>alert('Court successfully added!')</script>";
		//header("location:courts.php");
	}
?>