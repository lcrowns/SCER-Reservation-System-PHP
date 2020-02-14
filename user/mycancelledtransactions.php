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
  			<h2>Cancelled Reservations</h2>
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
				<a class = "btn btn-secondary" href = "mycheckouts.php"> Finished</a>
				<a class = "btn btn-danger disabled">Cancelled</a>
				
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Name</th>
							<th>Cancelled By</th>
							<th>Cancellation Reason</th>
							<th>Venue</th>
							<th>Reserved Date</th>
							
							
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `IDnumber` = '$id1' && `status` = 'Cancelled'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>
							<td><?php echo $fetch['cancelBy']?></td>
							<td><?php echo $fetch['cancelReason']?></td>
							<td><?php echo $fetch['courtName']?></td>
							<td><strong><?php if($fetch['checkIn'] <= date("Y-m-d", strtotime("+8 HOURS"))){echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkIn']))."</label>";}else{echo "<label>".date("M d, Y", strtotime($fetch['checkIn']))."</label>";}?></strong></td>
							
							
							
								
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