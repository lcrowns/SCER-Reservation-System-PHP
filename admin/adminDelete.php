
<?php
	require_once 'connect.php';
include '../config/database.php';
include '../classes/admin.php';

$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);


if($_POST){
	$admin->adminID = $_POST['adminID'];

	$admin->deleteAdmin();
	
}
?>