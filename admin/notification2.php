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
  			<h2>Notifications</h2>
  			<hr class='my-4'>
  		</div>
  		
  	</div>
  	<div style='margin-left:15px;margin-right:15px '>
  		<?php
				$q_r = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending' && `isRead` ='No'") or die(mysqli_error());
				$f_r = $q_r->fetch_array();
				$q_c = $conn->query("SELECT COUNT(*) as total FROM `transaction` natural join `users` WHERE `cancelBy`='Client' && `status` = 'Cancelled' && `isReadCancel` ='No'") or die(mysqli_error());
				$f_c = $q_c->fetch_array();
				
			?></div>
			<div class = "panel-body">
				<a class = "btn btn-success" href = "notification.php"><span class = "badge"><?php echo $f_r['total']?></span> Requests</a>
				<a class = "btn btn-danger disabled" ><span class = "badge"><?php echo $f_c['total']?></span>Cancelled Transactions</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							
							<th>Requests</th>
							
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `status` = 'Cancelled' && `isReadCancel` ='No'") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							
							<td><?php echo $fetch['notifcancel']?></td>

							<td><a class = "btn btn-secondary" href = "readFormCancel.php?transactionID=<?php echo $fetch['transactionID']?>" onclick = "confirmationCheckin(); return false;"><i class = "glyphicon glyphicon-check"></i> View</a></td>
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
<script type = "text/javascript">
  function confirmationCheckin(anchor){
    var conf = confirm("Are you sure?");
    if(conf){
      window.location = anchor.attr("href");
    }
  }
</script>
</html>