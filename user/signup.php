<?php
include_once "../classes/transactions.php";


require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<head>
	<title>SCER || Sports Complex Event Reservation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="../assets/bootstrap/4.2.1/css/bootstrap.min.css">

  <!-- JQuery Slim for Bootstrap-->
  <script src="../assets/jquery/3.2.1/jquery-3.3.1.slim.min.js"></script> 
  
  <!-- JQuery-->
  <script src="../assets/jquery/3.3.1/jquery-3.3.1.min.js"></script> 

  <!-- Popper.js-->
  <script src="../assets/popper.js/1.12.9/popper.min.js"></script>

  <!--Bootstrap JS-->
  <script src="../assets/bootstrap/4.2.1/js/bootstrap.min.js"></script>


</head>
	</head>
<body>
	
	
	

	<br>
  		<h2 style="margin-left: 15px">Register</h2>
  		<a href="index.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				
					

					<div class="card-header">Registration Form </div>
					<div class="card-body">	
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
							<h4 class="card-title">Username: 
							<input type = "text" class = "form-control" style="width: 500px" name = "username" required = "required" />
							</h4>
						</div>
						<div class = "form-group">
							<h4 class="card-title">Password: 
							<input type = "password" class = "form-control" style="width: 500px" name = "password" required = "required" />
							</h4>
						</div>
						<div class = "form-group">
							<h4 class="card-title">Confirm Password: 
							<input type = "password" class = "form-control" style="width: 500px" name = "confirmpassword" required = "required" />
							</h4>
						</div>

						<div class = "col-md-12">
							<button name = "register" class = "btn btn-outline-info " style="margin-left: 840px"> Submit</button>
							<a href="index.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php require_once 'signupQuery.php' ?>
						<br />
					
					
					
					
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	
  	</div>
  </div>
	
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>