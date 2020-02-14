<?php
    include 'header.php';
	//require_once 'validate.php';
	require 'name.php';
	require_once "connect.php";
	include_once "../classes/sports.php";
	$sport = new Sports($db);
	$stmt = $sport->viewAllSport();
$database = new Database();
$db = $database->getConnection();
?>
<!DOCTYPE>
<html>
<title></title>
<body>
	<div style=>
	<div class="form-row">

  	<div class="form-group col-md-12">
  		<div class="form-group col-md-8">
  			<br>
  			<h2>Venues</h2>
  			<hr class='my-4'>
  		</div>
  		<div class="form-group col-md-4">
  			
  		</div>
  	
  

  		<ul class="nav nav-tabs" style='margin-left:15px;'>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#all">All</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#active">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#inactive">Inactive</a>
  </li>
  
</ul>
<br>
  <a class = "btn btn-success" href = "addcourt.php" style="margin-left: 1435px"><i class = "glyphicon glyphicon-plus"></i> Add new Venue</a>
 
  

<br>
<div id="myTabContent" class="tab-content">

	
  <!--.>-->

  <div class="tab-pane fade show active" id="all">
    <div class="form-group col-md-12">
  		<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Venue Name</th>
							<th>Sport ID</th>
							<th>Price</th>
							<th>Photo</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `court` NATURAL JOIN `sport`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['courtName']?></td>
							<td><?php echo $fetch['sportsName']?></td>
							<td><?php echo $fetch['price']?></td>
							<td><center><img src = "../photo/<?php echo $fetch['photo']?>" height = "50" width = "50"/></center></td>
							<td><center><a class = "btn btn-info" href = "edit_court.php?courtID=<?php echo $fetch['courtID']?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a>

								<input type = "button" class = "btn btn deleteForm" style="color:white; background-color:#ee5a65; width:25%"" value ="Delete" courtID ="<?php echo $fetch['courtID'] ?>">

								
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
  		</div>
  </div>

  <div class="tab-pane fade show active" id="active">
    <div class="form-group col-md-12">
  		<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Venue Name</th>
							<th>Sport ID</th>
							<th>Price</th>
							<th>Photo</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `court` NATURAL JOIN `sport` where Stat = 'Active'") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['courtName']?></td>
							<td><?php echo $fetch['sportsName']?></td>
							<td><?php echo $fetch['price']?></td>
							<td><center><img src = "../photo/<?php echo $fetch['photo']?>" height = "50" width = "50"/></center></td>
							<td><center>
								<input type = "button" class = "btn btn deactivateForm" style="color:white; background-color:#ee5a00; width:25%"" value ="Deactivate" courtID ="<?php echo $fetch['courtID'] ?>">

								<input type = "button" class = "btn btn deleteForm" style="color:white; background-color:#ee5a65; width:25%"" value ="Delete" courtID ="<?php echo $fetch['courtID'] ?>">

								
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
  		</div>
  </div>

  <div class="tab-pane fade show active" id="inactive">
    <div class="form-group col-md-12">
  		<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Venue Name</th>
							<th>Sport ID</th>
							<th>Price</th>
							<th>Photo</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `court` NATURAL JOIN `sport` where Stat = 'Inactive'") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['courtName']?></td>
							<td><?php echo $fetch['sportsName']?></td>
							<td><?php echo $fetch['price']?></td>
							<td><center><img src = "../photo/<?php echo $fetch['photo']?>" height = "50" width = "50"/></center></td>
							<td><center>
								<input type = "button" class = "btn btn activateForm" style="color:white; background-color:blue; width:25%"" value ="Activate" IDnumber ="<?php echo $fetch['IDnumber'] ?>">

								<input type = "button" class = "btn btn deleteForm" style="color:white; background-color:#ee5a65; width:25%"" value ="Delete" courtID ="<?php echo $fetch['courtID'] ?>">

								
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
  		</div>
  </div>
  

  <!--{START} Add Sport-->
<div class="modal" tabindex="-1" id="addSportModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #808080; color:white">
        <h5 class="modal-title">Add New Sport</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <form id="addSportForm" method="POST" action="#">
      <div class="modal-body">
 		<table class='table table-hover table-bordered'>
       		
       		
        		
        	
      		
          <tr>
          <th>Sport Name</th>
          <td><input type="text" class="form-control" name="sportsName" required placeholder="ex Basketball"></td>
          </tr>


		</table>
      </div>

      <div class="modal-footer">
          <input type="submit" class="btn" name="addSport" style="background-color:#749da1; color:white"  value="Save">
          <button type="button" class="btn" data-dismiss="modal" style="background-color:#ef6a65; color:white" id="cancel">Cancel</button>
       </div>
  	</form>
    </div>
  </div>
</div>
<!--{END} Add User-->

<?php 
  if(isset($_POST['addSport'])){
    $sportsName = mysqli_real_escape_string($conn,$_POST['sportsName']);
   

    $check_duplicate_sport = "SELECT sportsName from sports WHERE sportsName='$sportsName'";
    $result =mysqli_query($conn, $check_duplicate_sport);
    $count = mysqli_num_rows($result);

      if($count > 0 ){
        echo "<script type='text/javascript'>alert('Error! Username is already taken.');</script>";
        return false;
      }
        echo "<script type='text/javascript'>alert('Added Successfully!'); location='courts.php';</script>";
        
      $sports = new Sports($db);

      $sports->sportsName = $_POST['sportsName'];

      $sports->addSport();
      }

?>
  
</div>

  	</div>
  	
	</div>


</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});


</script>
<script>
	//Delete
$(document).on('click', '.deleteForm', function(){
    var id = $(this).attr('courtID');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('delete_court.php', {
            courtID: id
        }, function(data){
            location.reload();
            alert('Deleted Successfully!');
        }).fail(function() {
            alert('Unable to delete.');
        });
    }
});
</script>

<script>
  //Deactivate
$(document).on('click', '.deactivateForm', function(){
    var id = $(this).attr('courtID');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('courtDeactivateQuery.php', {
            courtID: id
        }, function(data){
            location.reload();
            alert('Deactivated Successfully!');
        }).fail(function() {
            alert('Unable to deactivate.');
        });
    }
});
</script>

<script>
  //Activate
$(document).on('click', '.activateForm', function(){
    var id = $(this).attr('courtID');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('courtActivateQuery.php', {
            courtID: id
        }, function(data){
            location.reload();
            alert('Activated Successfully!');
        }).fail(function() {
            alert('Unable to activate.');
        });
    }
});
</script>
</html>
