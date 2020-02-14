<?php
include '../config/database.php';
include '../classes/sports.php';

$database = new Database();
$db = $database->getConnection();

$sport = new Sports($db);


if($_POST){
	$sport->sportID = $_POST['sportID'];

	$sport->deleteSport();

}
?>