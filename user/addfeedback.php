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
  		<a href="mycheckouts.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				
					

					<div class="card-header">Add Feedback</div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						
							<input type = "text" class = "form-control" name = "feedback" style="width: 500px"  />
						<br>
			         
						<div class = "col-md-12">
							<button name = "add_feedback" class = "btn btn-outline-info " > Submit</button>
							<a href="mycheckouts.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php require_once 'addfeedbackQuery.php' ?>
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
  <li class="breadcrumb-item"><a href="mycheckouts.php">Check Out</a></li>
  <li class="breadcrumb-item active">Feedback</li>
</ol>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>