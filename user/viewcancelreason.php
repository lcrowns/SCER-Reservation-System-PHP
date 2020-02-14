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
  		<h2 style="margin-left: 15px">Cancelled Transaction</h2>
  		<a href="mycancelledtransactions.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				
					

					<div class="card-header">Cancelled Transaction</div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">Reason:
							<input type = "text" class = "form-control" name = "courtName" style="width: 500px"  disabled="disabled" />
						</h4>
						
			         
						<div class = "col-md-12">
							
							<a href="cancelledtransactions.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Ok</button></a>
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
  <li class="breadcrumb-item"><a href="mycancelledtransactions.php">Cancelled Transaction</a></li>
  <li class="breadcrumb-item active">Cancel transaction</li>
</ol>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>