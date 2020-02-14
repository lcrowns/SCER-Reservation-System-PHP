
<?php
	require_once 'connect.php';
include '../config/database.php';
include '../classes/users.php';

$database = new Database();
$db = $database->getConnection();

$users = new Users($db);


if($_POST){
	$users->IDnumber = $_POST['IDnumber'];

	$users->deleteUser();
	$users->deleteTransaction();
}
?>