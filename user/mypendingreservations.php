<?php
    include 'header.php';
	require_once 'validate.php';
	require '../user/name.php';
?>
<!DOCTYPE>
<html>
<title></title>
<body>
	<div style='margin-left:10px;margin-right:10px '>
	<div class="form-row">
  	<div class="form-group col-md-12">
  		<div class="form-group col-md-8">
  			<br>
  			<h2>Pending Reservations</h2>
  			<hr class='my-4'>
  		</div>
  		<div class="form-group col-md-4">
  		</div>
  	</div>
  	<div class="form-group col-md-12">
  		<?php
  				
			?>
			<div class = "panel-body">
				<a class = "btn btn-success disabled">Pending</a>
				<a class = "btn btn-warning" href = "myacceptedreservations.php"> Accepted</a>
				<a class = "btn btn-info" href = "myreservations.php"> Active</a>
				<a class = "btn btn-secondary" href = "mycheckouts.php"> Finished</a>
				<a class = "btn btn-danger" href="mycancelledtransactions.php">Cancelled</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Name</th>
							<th>Contact Number</th>
							<th>Venue</th>
							<th>Reserved Date</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `IDnumber` = '$id1' && `status` = 'Pending'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>
							<td><?php echo $fetch['contactNumber']?></td>
							<td><?php echo $fetch['courtName']?></td>
							<td><strong><?php if($fetch['checkIn'] <= date("Y-m-d", strtotime("+8 HOURS"))){echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkIn']))."</label>";}else{echo "<label>".date("M d, Y", strtotime($fetch['checkIn']))."</label>";}?></strong></td>
							<td><?php echo $fetch['status']?></td>
							<td><center> 
								<a class = "btn btn-outline-danger" href = "cancelreason.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-edit"></i> Cancel Request</a>
								<!--<a class = "btn btn-outline-danger" onclick = "confirmationDelete(); return false;" href = "cancelrequest.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-trash"></i> Cancel Reservation</a>-->
								<!--..-->
								
							</td>
								
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
  	</div>
  </div>

  
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
</html>