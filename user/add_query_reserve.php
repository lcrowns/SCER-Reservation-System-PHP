<?php
	require_once 'connect.php';
	if(ISSET($_POST['add_user'])){
		$IDnumber = $_POST['IDnumber'];
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		$checkIn = $_POST['date'];
		$daysUse = $_POST['daysUse'];
		$additionalItems="";
		$totalPrice= $_POST['price'];
		$client= $_POST['firstName'] .' '. $_POST['lastName'];
		/*$finalItems=$_POST['finalItems'];
		if($finalItems=="None"){
        $additionalItems = "0";
    } elseif($finalItems=="Sports/Game Package || Php 500.00"){
    	$additionalItems = "500";
    } elseif($finalItems=="Small Event Package Package || Php 1500.00"){
    	$additionalItems = "1500";
    } elseif($finalItems=="Big Event Package Package || Php 3000.00"){
    	$additionalItems = "3000";
    } else $additionalItems="0";*/

    		//$finalprice = $fetch['price'];
			
			//$totalindays = $finalprice * $daysUse;
			//$overall = $totalindays + $additionalItems;
			//$totalPrice=$overall;


		//$conn->query("INSERT INTO `users` (firstName, middleName, lastName, address, contactNumber) VALUES('$firstName', '$middleName', '$lastName', '$address', '$contactNumber')") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `users` WHERE `firstName` = '$firstName' && `lastName` = '$lastName' && `contactNumber` = '$contactNumber'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkIn` = '$checkIn' && `courtID` = '$_REQUEST[courtID]' && `status` = 'Pending'") or die(mysqli_error());
		$row = $query2->num_rows;
		if($checkIn < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Must be present date')</script>";
			}else{
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Request Sent</label><br />";
							$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
							while($f_date = $q_date->fetch_array()){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkIn']."+8HOURS"))."</label>	
										</li>
									</ul>";
							}
						"</div>";
				}else{	
						//if($IDnumber = $fetch['IDnumber']){
							$courtID = $_REQUEST['courtID'];
							
							
							$conn->query("INSERT INTO `transaction`(IDnumber, courtID, status, checkIn, daysUse, additionalItems,totalPrice,notif) VALUES('$IDnumber', '$courtID', 'Pending', '$checkIn','$daysUse','$additionalItems','$totalPrice','$client has requested a new transaction.')") or die(mysqli_error());
							echo "<script>alert('Reservation sent!')</script>";
							//header("location:home.php");
						}
						//else{
							//echo "<script>alert('Error Javascript Exception!')</script>";
						//}
				}

					
			}	
	//}	
?>