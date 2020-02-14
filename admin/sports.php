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
  			<h2>Sports</h2>
  			<hr class='my-4'>
  		</div>
  		<div class="form-group col-md-4">
  			
  		</div>
  	
  

  		

  
  <a class='btn btn-warning'  data-toggle='modal' style="margin-left: 1455px" data-target='#addSportModal'>Add New Sport</a>
  
<div id="myTabContent" class="tab-content">

	
  <!--.>-->



  <div class="tab-pane fade show active" id="allsports">
    <div class="form-group col-md-12">
  		<table id = "table" class = "table table-bordered">
					<thead>
						<tr  class='text-center text-white' style='background-color:#424c51'>
							<th>Sport ID</th>
							<th>Sport Name</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query = $conn->query("SELECT * FROM `sport`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	
						<tr>
							<td><?php echo $fetch['sportID']?></td>
							<td><?php echo $fetch['sportsName']?></td>
							
							<td><center><a class='btn btn update-object' style='background-color:#749da1; color:white; width:10%' update-id='{$sportID}'>Edit</a>

								<input type = "button" class = "btn btn deleteForm" style="color:white; background-color:#ee5a65; width:15%"" value ="Delete" sportID ="<?php echo $fetch['sportID'] ?>">

								
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

<!--{START} Edit sport modal-->
<div class="modal" id="editSportModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #808080; color:white">
        <h5 class="modal-title">Update Sport</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body" id="editSportForm">
		<?php include_once "sportEdit.php"; ?>
	  </div>
	  
		
    </div>
  </div>
</div>
<!--{END} Edit sport modal-->

<?php 
  if(isset($_POST['addSport'])){
    $sportsName = mysqli_real_escape_string($conn,$_POST['sportsName']);
   

    $check_duplicate_sport = "SELECT sportsName from sport WHERE sportsName='$sportsName'";
    $result =mysqli_query($conn, $check_duplicate_sport);
    $count = mysqli_num_rows($result);

      if($count > 0 ){
        echo "<script type='text/javascript'>alert('Error! Sport is already created.');</script>";
        return false;
      }
        echo "<script type='text/javascript'>alert('Added Successfully!'); location='sports.php';</script>";
        
      $sport = new Sports($db);

      $sport->sportsName = $_POST['sportsName'];

      $sport->addSport();
      }

?>
  
</div>

  	</div>
  	
	</div>


</body>
<script>

//Edit User
$(document).on ('click', '.update-object', function(){
		var id = $(this).attr('update-id');

		$.ajax({
			url:"sportEdit.php",
			method:"POST",
			data:{sportID:id},
			success:function(data){
				$('#editSportForm').html(data);
				$('#editSportModal').modal('show');

			}
		});
	});



</script>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	


<script>
  //Delete
$(document).on('click', '.deleteForm', function(){
    var id = $(this).attr('sportID');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('delete_sport.php', {
            sportID: id
        }, function(data){
            location.reload();
            alert('Deleted Successfully!');
        }).fail(function() {
            alert('Unable to delete.');
        });
    }
});
</script>
</html>
