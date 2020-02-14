<?php
	$page_title = "Add New User";
	include_once "header.php";
	include_once "../config/database.php";
	include_once "../classes/users.php";

	$database = new Database();
	$db = $database->getConnection();

	date_default_timezone_set('Asia/Manila');
	
	if(isset($_POST)){
	$password=$_POST['password'];
  	$default= '123';
	$users = new Users($db);
    //$users->IDnumber = $_POST['IDnumber'];
	$users->firstName = $_POST['firstName'];
	$users->middleName = $_POST['middleName'];
	$users->lastName = $_POST['lastName'];
	$users->address = $_POST['address'];
	$users->contactNumber = $_POST['contactNumber'];
	$users->username = $_POST['username'];
	$users->password = $default;
	$users->dateadded = date('Y-m-d');
		
	
		$userpangalan = $_POST['username'];

			$query = mysql_query("SELECT * from users where username='$userpangalan'") or die(mysql_error());
			$duplicate = mysql_num_rows($query);
				if($duplicate==0){
					$users->addUsers();
				} else {
					echo "Users already exists!"
				}
	}

		
		/*if($_POST){
			
				
			
					
				
				$users->addUsers();
					
					}*/
	
	

	
?>

<?php
	include_once "footer.php";
?>