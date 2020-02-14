<?php
include_once "../classes/users.php";
include_once "header.php";

?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Hotel Online Reservation</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<div class="form-row">
		<div class="form-group col-md-12">
			<h4>Make a Reservation</h4>
		</div>
		<div class="form-group col-md-12">
			<?php 
					require_once 'connect.php';
					
					$query = $conn->query("SELECT * FROM `court` WHERE `courtID` = '$_REQUEST[courtID]'") or die(mysql_error());
					$fetch = $query->fetch_array();
				?>
				<div style = "height:300px; width:800px;">
					<div style = "float:left;">
						<img src = "photo/<?php echo $fetch['photo']?>" height = "150px" width = "200px">
					</div>
					<div style = "float:left; margin-left:10px;">
						<h3><?php echo $fetch['courtName']?></h3>
						<h3 style = "color:#00ff00;"><?php echo "Php. ".$fetch['price'].".00";?></h3>
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-4">
					<form method = "POST" enctype = "multipart/form-data">
						
						<div class = "form-group">
							<label>First Name</label>
							<input type = "hidden" class = "form-control" name = "firstName" required = "required"     value="<?php echo $name ?>"/>
						</div>
						<div class = "form-group">
							<label>Middle Name</label>
							<input type = "hidden" class = "form-control" name = "middleName" required = "required" value="<?php echo $name2 ?>"/>
						</div>
						<div class = "form-group">
							<label>Last Name</label>
							<input type = "hidden" class = "form-control" name = "lastName" required = "required" value="<?php echo $name3 ?>" />
						</div>
						<div class = "form-group">
							<label>Address</label>
							<input type = "hidden" class = "form-control" name = "address" required = "required" value="<?php echo $name4 ?>" />
						</div>
						<div class = "form-group">
							<label>Contact Number</label>
							<input type = "hidden" class = "form-control" name = "contactNumber" required = "required" value="<?php echo $name5 ?>" />
						</div>
						<div class = "form-group">
							<label>Check in</label>
							<input type = "date" class = "form-control" name = "date" required = "required"/>
						</div>
						<br />
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "add_user"><i class = "glyphicon glyphicon-save"></i> Submit</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
				<?php require_once 'add_query_reserve.php'?>
			</div>
		</div>
	</div>
		</div>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>
</html>