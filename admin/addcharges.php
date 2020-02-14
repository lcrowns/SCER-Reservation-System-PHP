<?php
include_once "../classes/transactions.php";

include_once "header.php";
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		
	</head>
<body>
	
	
	

	<br>
  		<h2 style="margin-left: 15px">Additional Charges</h2>
  		<a href="checkin.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				
				<?php
						$query = $conn->query("SELECT * FROM `transaction` WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
						
					?>
					

					<div class="card-header">Add Charge </div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">Tentative Price: 
							<input type = "number" min = "0" max = "999999999"  class = "form-control" value = "<?php echo $fetch['totalPrice']?>" name = "tentativePrice" style="width: 500px"/>
						</h4>
						<h4 class="card-title">Reason for charges:
							<input type = "text" class = "form-control" name = "chargeReason" style="width: 500px"  />
						</h4>
						<h4 class="card-title">Charges Price: 
							<input type = "number" min = "0" max = "999999999"  class = "form-control"  name = "chargeprice" style="width: 500px" />
						</h4>
			         
						<div class = "col-md-12">
							<button name = "addcharge" class = "btn btn-outline-info " style="margin-left: 840px"> Submit</button>
							<a href="checkin.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php require_once 'addchargesQuery.php' ?>
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
  <li class="breadcrumb-item active">Add Charges</li>
</ol>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>