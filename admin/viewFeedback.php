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
  		<h2 style="margin-left: 15px">Feedback</h2>
  		<a href="checkout.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
					<?php
						$query = $conn->query("SELECT * FROM `transaction` ") or die(mysqli_error());
						$fetch = $query->fetch_array();
						
					?>
					

					<div class="card-header">User Feedback</div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">
							<input type = "text" class = "form-control"  value = "<?php echo $fetch['feedback']?>" style="width: 800px"  disabled="disabled" />
						</h4>
						
			         
						<div class = "col-md-12">
							
							<a href="checkout.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Ok</button></a>
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
  <li class="breadcrumb-item active">Cancel transaction</li>
</ol>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>