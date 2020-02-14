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
  		<h2 style="margin-left: 15px">Cancel Transaction</h2>
  		<a href="mypendingreservations.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 60em;">
					
					<?php
						$query = $conn->query("SELECT * FROM `transaction` WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>

					<div class="card-header">Cancel Transaction</div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">Reason for cancel:
							<input type = "text" class = "form-control" name = "cancelReason" style="width: 800px"  />
						</h4>
						
			         
						<div class = "col-md-12">
							<button name = "delete_pending" class = "btn btn-outline-info""> Submit</button>
							<a href="mypendingreservations.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php require_once 'delete_pending.php' ?>
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
  <li class="breadcrumb-item"><a href="reserve.php">Reservations</a></li>
  <li class="breadcrumb-item active">Cancel transaction</li>
</ol>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>