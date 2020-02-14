<?php
	if(ISSET ($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$row = $query->num_rows;
		
		$query2 = $conn->query("SELECT * FROM `admin` WHERE `userType` = 'Admin'") or die(mysqli_error());
		$fetch2 = $query2->fetch_array();

		if($row > 0){
			session_start();
			$_SESSION['adminID'] = $fetch['adminID'];
			 
				header('location:home.php');
			
			
		}

		else{
			echo "<center><label style = 'color:red;'>Invalid username or password</label></center>";
		}
	}
	//..
	
?>