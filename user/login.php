<?php
	if(ISSET ($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = $conn->query("SELECT * FROM `users` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$row = $query->num_rows;
		$accStatus = $fetch['accStatus'];
		$userType = $fetch['userType'];
		if($row > 0){
			session_start();
			$_SESSION['IDnumber'] = $fetch['IDnumber'];
				  header('location:home.php');
		}		
		else{
			echo "<center><labe style = 'color:red;'>Invalid username or password</label></center>";
		}
	}
?>