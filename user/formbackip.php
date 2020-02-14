<div style = "margin-left:0;" class = "container">
				<a href="reservation.php"><button type="button" class="btn btn-secondary" data-dismiss="modal" >Back</button></a>

		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3>Make a Reservation</h3></strong>
				<br />
				<?php 
					require_once 'connect.php';
					$query = $conn->query("SELECT * FROM `court` WHERE `courtID` = '$_REQUEST[courtID]'") or die(mysql_error());
					$fetch = $query->fetch_array();

					$query2 = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court`") or die(mysqli_error());
          			$fetch2 = $query->fetch_array();
				?>
				<div style = "height:300px; width:800px;">
					<div style = "float:left;">
						<img src = "../photo/<?php echo $fetch['photo']?>" height = "300px" width = "400px">
					</div>
					<div style = "float:left; margin-left:10px;">
						<h3><?php echo $fetch['courtName']?></h3>
						<h3 style = "color:#00ff00;"><?php echo "Php. ".$fetch['price'].".00";?></h3>
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-5">
					<form method = "POST" enctype = "multipart/form-data">
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
							<label>Select Schedule:	</label>
							<input type = "date" class = "form-control" name = "date" required = "required" />
						</div>
						<br />
						<div class = "form-inline" style = "float:left; margin-left:20px;">
			            <label>Time: &nbsp;</label>
			            <br />
			            <input type = "text"  name = "daysUse" class = "form-control" required = "required"/>
			          </div>
			          <br>
			          
			          <br>
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "add_user"> Submit</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
				<?php require_once 'add_query_reserve.php' ?>
			</div>
		</div>
	</div>
	<br />
	<br />