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
  			<h2>Finished Reservations</h2>
  			<hr class='my-4'>
  		</div>
  		<div class="form-group col-md-4">
  		</div>
  	</div>
  	<div class="form-group col-md-12">
  		<?php
				 
			?>
			<div class = "panel-body">
				<a class = "btn btn-success" href = "mypendingreservations.php">Pending</a>
				<a class = "btn btn-warning" href = "myacceptedreservations.php"> Accepted</a>
				<a class = "btn btn-info" href = "myreservations.php"> Active</a>
				<a class = "btn btn-secondary disabled"> Finished</a>
				<a class = "btn btn-danger" href="mycancelledtransactions.php">Cancelled</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Name</th>
							<th>Feedback</th>
							<th>Venue</th>
							<th>Reserved Date</th>
							<th>End Date</th>
							<th>Total Price</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `IDnumber` = '$id1' && `status` = 'Check Out'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>
							<td><?php echo $fetch['feedback']?></td>
							<td><?php echo $fetch['courtName']?></td>
							<td><?php echo "<label>".date("M d, Y", strtotime($fetch['checkIn']))."</label>"."  "."<label>".date("h:i a", strtotime($fetch['checkInTime']))."</label>"?></td>
							<td><?php echo "<label>".date("M d, Y", strtotime($fetch['checkIn']."+".$fetch['daysUse']."DAYS"))."</label>"."  "."<label>".date("h:i A", strtotime($fetch['checkOutTime']))."</label>"?></td>
							<td><?php echo "Php. ".$fetch['totalPrice'].".00"?></td>
							<td><?php echo "Paid" ?></td>
							<td><a class = "btn btn-outline-warning" href="addfeedback.php?transactionID=<?php echo $fetch['transactionID']?>""><i class = "glyphicon glyphicon-check"></i>Add Feedback </a></td>
								
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
		var conf = confirm("Are you sure you want to cancel this transaction?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>

</html>