<?php
include_once "../classes/transactions.php";

include_once "header.php";
require_once 'connect.php';
include_once "../classes/sports.php";
include_once "../classes/courts.php";
$sport = new Sports($db);
$stmt= $sport->viewAllSport();

$court = new Courts($db);
$stmt2= $court->viewAllCourt();

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
						$query = $conn->query("SELECT * FROM `court` ") or die(mysqli_error());
						$fetch = $query->fetch_array();
						$query2 = $conn->query("SELECT * FROM `sport`") or die(mysqli_error());
						$fetch2 = $query2->fetch_array();
					?>

					<div class="card-header">Make A Reservation </div>
					<div class="card-body">	
					
						<h4 class="card-title">Venue Name:
							
							
      						<select class="form-control" style="width: 500px" name="courtID"  value = "<?php echo $fetch['courtID']?>" required>
                     			<option selected="<?php echo $fetch['courtID']?>"></option>
                     			<?php 
                     			
                     			
                     			if($stmt2->rowCount()>0){
								while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
								extract($row2);
							          echo 
								'<option>' .$courtName. '</option>
								';
								}
							}
                      			?>
							
                  			
                  			</select>
						</h4>

						<h4 class="card-title">Sport Name:
							
							
      						<select class="form-control" style="width: 500px" name="sportID"  value = "<?php echo $fetch['sportsID']?>" required>
                     			<option selected="<?php echo $fetch['sportsID']?>"></option>
                     			<?php 
                     			
                     			
                     			if($stmt->rowCount()>0){
								while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
								extract($row);
							          echo 
								'<option>' .$sportsName. '</option>
								';
								}
							}
                      			?>
							
                  			
                  			</select>
						</h4>
						<h4 class="card-title">Price: 
							<input type = "number" min = "0" max = "999999999"  class = "form-control" name = "price" style="width: 500px"/>
						</h4>
						
						

						<form method = "POST" enctype = "multipart/form-data">
						
						<div class = "form-group">
							<h4 class="card-title">First Name: 
							<input type = "text" class = "form-control" style="width: 500px" name = "firstName" required = "required" 
							 />
							 </h4>
						</div>
						<div class = "form-group">
							<h4 class="card-title">Middle Name: 
							<input type = "text" class = "form-control" style="width: 500px" name = "middleName" />
							</h4>
						</div>
						<div class = "form-group">
							<h4 class="card-title">Last Name: 
							<input type = "text" class = "form-control" style="width: 500px" name = "lastName" required = "required"  />
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
						<h4 class="card-title">Select Schedule:
							<input type = "date" class = "form-control" style="width: 500px" name = "date" required = "required" style="width:500px" /> 
							
						</h4>
						</div>
						<h4 class="card-title">Time:
							<br> 
							<div class="form-row">
  							<div class="form-group col-md-12">
  								<div class="form-group col-md-3">
  									From
							<select class="form-control" id="daysUse" name="daysUse">
							<option selected></option>
					        <option>8:00 AM</option>
					        <option>9:00 AM</option>
					        <option>10:00 AM</option>
					        <option>11:00 AM</option>
					        <option>12:00 PM</option>
					        <option>1:00 PM</option>
					        <option>2:00 PM</option>
					        <option>3:00 PM</option>
					        <option>4:00 PM</option>
					      </select>
								</div>

								<div class="form-group col-md-3">
  									To
							<select class="form-control" id="#" name="#">
					        <option selected></option>
					        <option>9:00 AM</option>
					        <option>10:00 AM</option>
					        <option>11:00 AM</option>
					        <option>12:00 PM</option>
					        <option>1:00 PM</option>
					        <option>2:00 PM</option>
					        <option>3:00 PM</option>
					        <option>4:00 PM</option>
					        <option>5:00 PM</option>
					      </select>
								</div>

							</div>
						</div>
						</h4>
						
			         
						<div class = "col-md-12">
							<button name = "add_user" class = "btn btn-outline-info " style="margin-left: 840px"> Submit</button>
							<a href="reservation.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					
						<br />
					
					
					
					
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