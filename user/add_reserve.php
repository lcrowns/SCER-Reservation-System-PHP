<?php
include_once "../classes/users.php";
include_once "header.php";
include_once "../classes/sports.php";
$sport = new Sports($db);
	$stmt = $sport->viewAllSport();
$database = new Database();
$db = $database->getConnection();
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		
	</head>
<body>
	
	
	

	<br>
  		<h2 style="margin-left: 15px">Reserve Venue</h2>
  		<a href="reservation.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				<form method = "POST" enctype = "multipart/form-data">
					

					<div class="card-header">Make A Reservation </div>
					<div class="card-body">	
					<?php 
					require_once 'connect.php';
					$query = $conn->query("SELECT * FROM `court` WHERE `courtID` = '$_REQUEST[courtID]'") or die(mysql_error());
					$fetch = $query->fetch_array();

					$query2 = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court`") or die(mysqli_error());
          			$fetch2 = $query->fetch_array();
				?>
						<h4 class="card-title">Venue Name:
							<input type = "text" class = "form-control" name = "courtName" value = "<?php echo $fetch['courtName']?>" style="width: 500px" disabled />
						</h4>
						<h4 class="card-title">Sport Name:
							
							
      						<select class="form-control" name="sportID"  value = "<?php echo $fetch['sportsID']?>" style="width: 500px" required>
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
							<input type = "number" min = "0" max = "999999999" value = "<?php echo $fetch['price']?>" class = "form-control" name = "price" style="width: 500px"/>
						</h4>
						<h4 class="card-title">Photo:
							<div id = "preview" style = "width:400px; border:1px solid #006;">
								<img src = "../photo/<?php echo $fetch['photo']?>" width = "500px">
							</div>
							
						</h4>
						

						
						<div class = "form-group">
							<!--<label>ID number</label>-->
							<input type = "hidden" class = "form-control" name = "IDnumber" required = "required" value="<?php echo $id1 ?>" />
						</div>
						<div class = "form-group">
							<!--<label>Firstname</label>-->
							<input type = "hidden" class = "form-control" name = "firstName" required = "required" 
							value="<?php echo $name ?>" />
						</div>
						<div class = "form-group">
							<!--<label>Middlename</label>-->
							<input type = "hidden" class = "form-control" name = "middleName" required = "required" value="<?php echo $name2 ?>" />
						</div>
						<div class = "form-group">
							<!--<label>Lastname</label>-->
							<input type = "hidden" class = "form-control" name = "lastName" required = "required" value="<?php echo $name3 ?>" />
						</div>
						<div class = "form-group">
							<!--<label>Address</label>-->
							<input type = "hidden" class = "form-control" name = "address" required = "required" value="<?php echo $name4 ?>" />
						</div>
						<div class = "form-group">
							<!--<label>Contact No</label>-->
							<input type = "hidden" class = "form-control" name = "contactNumber" required = "required" value="<?php echo $name5 ?>"/>
						</div>
						<div class = "form-group">
						<h4 class="card-title">Select Schedule:
							<input type = "date" class = "form-control" name = "date" required = "required" style="width:500px" />
							
						</h4>
						</div>
						<h4 class="card-title">Days of Use:
							<input type = "number" class = "form-control" name = "daysUse" style="width: 500px"  />
						</h4>
						
			         
						<div class = "col-md-12">
							<button name = "add_user" class = "btn btn-outline-info " style="margin-left: 840px"> Submit</button>
							<a href="reservation.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php require_once 'add_query_reserve.php' ?>
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
  <li class="breadcrumb-item"><a href="reservation.php">Courts</a></li>
  <li class="breadcrumb-item active">Reserve a Venue</li>
</ol>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>