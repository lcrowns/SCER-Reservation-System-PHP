<?php
	if(ISSET($_POST['add_user'])){
		$default= '123';
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		$username = $_POST['username'];
		$password=$_POST['password'];
  		$password = $default;
		
		$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
		if(mysql_query($query)>0)
		{
			echo "She's taken!";
		} else{
		$query=mysql_query("INSERT INTO users (IDnumber,firstName,middleName,lastName,address,contactNumber,username,password) VALUES ('','$firstName','$middleName','lastName','address','contactNumber','username','password')");
		echo "pasok";
	}
		//header("location:courts.php");
	}
?>