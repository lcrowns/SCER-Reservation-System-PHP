<?php 
	session_start();
	if(!ISSET($_SESSION['adminID'])){
		header("location:index.php");
	}