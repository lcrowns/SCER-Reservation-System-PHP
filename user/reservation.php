<?php
include_once "../classes/users.php";
include_once "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
	

	<div class="form-row">

  	<div class="form-group col-md-12">
  		<div class="form-group col-md-8">
  			<br>
  			<h2>Reserve a Venue</h2>
  			<hr class='my-4'>
  		</div>
  		<div class="form-group col-md-4">
  			
  		</div>

  		
<br>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade show active" id="all">
    <div class="form-group col-md-12">
  		<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Venue Name</th>
							<th>Price</th>
							<th>Photo</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `court` where Stat = 'Active'") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['courtName']?></td>
							<td><?php echo $fetch['price']?></td>
							<td><center><img src = "../photo/<?php echo $fetch['photo']?>"  width = "350px"/></center></td>
							<td>
								<center>
									<a style = "margin-left:0px;" href = "add_reserve.php?courtID=<?php echo $fetch['courtID']?>" class = "btn btn-outline-primary"><i class = "glyphicon glyphicon-list"></i> Reserve Venue </a></center>
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
</html>