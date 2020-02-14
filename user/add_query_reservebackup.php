<?php
	require_once 'connect.php';
	if(ISSET($_POST['add_user'])){
		
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		$checkIn = $_POST['date'];
		
		
		$fetch = $query->fetch_array();
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkIn` = '$checkIn' && `courtID` = '$_REQUEST[courtID]' && `status` = 'Pending'") or die(mysqli_error());
		$row = $query2->num_rows;
		if($checkIn < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Must be present date')</script>";
			}else{
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Not Available Date</label><br />";
							$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
							while($f_date = $q_date->fetch_array()){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkIn']."+8HOURS"))."</label>	
										</li>
									</ul>";
							}
						"</div>";
				}else{	
						if($IDnumber = $fetch['IDnumber']){
							$courtID = $_REQUEST['courtID'];
							$conn->query("INSERT INTO `transaction`(clientID, courtID, status, checkIn) VALUES('$IDnumber', '$courtID', 'Pending', '$checkIn')") or die(mysqli_error());
							header("location:home.php");
						}else{
							echo "<script>alert('Error Javascript Exception!')</script>";
						}
				}	
			}	
	}	
?>