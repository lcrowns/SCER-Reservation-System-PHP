<?php
    include_once "header.php";
	//require_once 'validate.php';
	require 'name.php';
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
  			<h2>Accepted Reservations</h2>
  			<hr class='my-4'>
  		</div>
  		
  	</div>
  	<div style='margin-left:15px;margin-right:15px '>
  		<?php
				$q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_a = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Accepted'") or die(mysqli_error());
				$f_a = $q_a->fetch_array();
				$q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
				$f_ci = $q_ci->fetch_array();
				$q_co = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check Out'") or die(mysqli_error());
        $f_co = $q_co->fetch_array();
				$q_c = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Cancelled'") or die(mysqli_error());
       			 $f_c = $q_c->fetch_array();
			?></div>
			<div class = "panel-body">
				<a class = "btn btn-success" href = "reserve.php"><span class = "badge"><?php echo $f_p['total']?></span> Pending</a>
				<a class = "btn btn-warning  disabled" href = "accepted.php"><span class = "badge"><?php echo $f_a['total']?></span> Accepted</a>
				<a class = "btn btn-info" href = "checkin.php"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
				<a class = "btn btn-secondary" href = "checkout.php"><span class = "badge"><?php echo $f_co['total']?></span></i> Check Out</a>
				<a class = "btn btn-danger" href = "cancelledtransactions.php"><span class = "badge"><?php echo $f_c['total']?></span>Cancelled Transactions</a>
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
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `status` = 'Accepted'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>
							<td><?php echo $fetch['contactNumber']?></td>
							<td><?php echo $fetch['courtName']?></td>
							<td><strong><?php if($fetch['checkIn'] <= date("Y-m-d", strtotime("+8 HOURS"))){echo "<label style = 'color:#ff0000;'>".date("M d, Y", strtotime($fetch['checkIn']))."</label>";}else{echo "<label>".date("M d, Y", strtotime($fetch['checkIn']))."</label>";}?></strong></td>
							<td><?php echo $fetch['status']?></td>
							<td><center>
								<a class = "btn btn-outline-primary" href = "confirm_reserve.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-check"></i> Check In</a> 
								<a class = "btn btn-outline-danger" href = "cancelreason.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-edit"></i> Cancel</a>
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
		var conf = confirm("Are you sure you want to decline the request?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
</html>