<?php 
	session_start();
	if(!ISSET($_SESSION['IDnumber'])){
		header("location:index.php");
	}