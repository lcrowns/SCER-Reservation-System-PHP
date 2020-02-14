<?php
include_once "../classes/transactions.php";

include_once "header.php";
require_once 'connect.php';
include_once "../classes/sports.php";
include_once "../classes/courts.php";

$sport = new Sports($db);
$stmt2 = $sport->viewAllSport();

$courts = new Courts($db);
$stmt= $courts->viewAllCourt();

$database = new Database();
$db = $database->getConnection();

?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		
	</head>
<body>
	
	
	

	<br>
  		<h2 style="margin-left: 15px">Check In Walk In</h2>
  		<a href="checkin.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				
					<?php
						$query = $conn->query("SELECT * FROM `court`") or die(mysqli_error());
						$query2 = $conn->query("SELECT * FROM `sport`") or die(mysqli_error());
						$fetch2 = $query->fetch_array();
					?>

					<div class="card-header">Make A Reservation </div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">Venue Name:
							
							<select class="form-control" name="courtID" style="width: 500px" value = "<?php echo $fetch['courtID']?>" required>
                     			<option selected="<?php echo $fetch['courtID']?>"></option>
                     			
                     			<?php
						$query = $conn->query("SELECT * FROM `court`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
						
						 echo 
								'<option>' .$fetch['courtID']." ".$fetch['courtName']. '</option>
								';
							
					
						}
					?>	
                     			
                  			</select>
      						
						</h4>

						<!--<h4 class="card-title">Sport Name:
							
							
      						<select class="form-control" name="sportID" style="width: 500px" value = "<?php echo $fetch['sportsID']?>" required>
                     			<option selected="<?php echo $fetch['sportsID']?>"></option>
                     			
                     			<?php 
                     			if($stmt2->rowCount()>0){
								while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
								extract($row);
							          echo 
								'<option>' .$sportsName. '</option>
								';
								}
							}
                      			?>
							
                  			
                  			</select>
						</h4>-->
						
						<h4 class="card-title">Total Price: 
							<input type = "number"  class = "form-control" name = "totalPrice" style="width: 500px"/>
						</h4>
						
						

						
						
						<div class = "form-group">
							<h4 class="card-title">Name: 
							<input type = "text" class = "form-control" style="width: 500px" name = "Name" required = "required" 
							 />
							 </h4>
						</div>
						
						<div class = "form-group">
							<h4 class="card-title">Address: 
							<input type = "text" class = "form-control" style="width: 500px" name = "address" required = "required" />
							</h4>
						</div>
						<div class = "form-group">
							<h4 class="card-title">Contact Number: 
							<input type = "number" class = "form-control" style="width: 500px" name = "contactNumber" required = "required" />
							</h4>
						</div>
						<div class = "form-group">
						
						</div>
						<div class = "form-group">
						<h4 class="card-title">Days of Use:
							<input type = "text" class = "form-control" style="width: 500px" name = "daysUse" required = "required" style="width:500px" /> 
							
						</h4>
						</div>
						
			         
						<div class = "col-md-12">
							<button name = "add_walkin" class = "btn btn-outline-info " style="margin-left: 840px"> Submit</button>
							<a href="reservation.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					
						<br />
					
					<?php
					if(ISSET($_POST['add_walkin'])){

						$courtID = $_POST['courtID'];
						$sportsID = $_POST['sportsID'];
						$totalPrice = $_POST['totalPrice'];
						$Name = $_POST['Name'];
						
						$address = $_POST['address'];
						$contactNumber = $_POST['contactNumber'];
						$checkin = $_POST['checkin'];
						$daysUse = $_POST['daysUse'];
						
						


							$conn->query("INSERT INTO `transaction` ( courtID, status,daysUse,totalPrice,WalkIn,WIname) VALUES( '$courtID',  'Check In','$daysUse','$totalPrice','Yes','$Name')") or die(mysqli_error());
						//echo "<script>alert('Court successfully added!')</script>";
						//header("location:courts.php");
					}
				?>
					
					
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	
  	</div>
  </div>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
  <li class="breadcrumb-item"><a href="checkin.php">Check In</a></li>
  <li class="breadcrumb-item active">Walk ins</li>
</ol>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>