
<?php
	require_once 'connect.php';
include '../config/database.php';
include '../classes/courts.php';

$database = new Database();
$db = $database->getConnection();

$court = new Courts($db);


if($_POST){
	$court->courtID = $_POST['courtID'];

	$court->deleteCourt();

}
?>