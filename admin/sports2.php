
<?php
	$page_title = "Clients";
	include_once "header.php";

	include_once "../config/database.php";

	include_once "../classes/sports.php";
require_once "connect.php";
	include_once "paginConfig.php";

date_default_timezone_set('Asia/Manila');
	$database = new Database();
	$db = $database->getConnection();

	$sport = new Sports($db);
	$stmt = $sport->viewAllSport();

	echo "
      <br>
      <h2 style='margin-left: 15px'>Sports List</h2>
        <hr class='my-4'>
        <div style='margin-left:10px;margin-right:10px '>
        <br>
        <div class='col-lg-12'>
      		<a class='btn float-right' style='background-color:#808080; color:white' data-toggle='modal' data-target='#addSportModal'>Add New Sport</a>

    	   </div>

    	   <div class='form-inline'>
		   <form action='sports2.php'>
		   <input type='text' name='searchTextBox' class='form-control' placeholder='Search' style='width:300px;margin-left:1000px'>
		   <button type='submit' class='form-control form-control-info' style='width:80px'>Search</button>
		   </form>
		   </div>
		   
  	</div>
    <br>";

  	$sport->searchValue=isset($_GET['searchTextBox']) ? $_GET['searchTextBox']: '';
  	$stmt = $sport->viewSearchResult($from_record_num, $records_per_page);
  	$total_rows=$sport->countSearchResult();

  	if(!empty($sport->searchValue)){
    echo 
    "<div class='alert alert-warning alert-dismissible' role='alert'>
    <strong>".$total_rows." search results </strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    </div>";
  }

  if($total_rows>0){

	echo "<div style='margin-left:10px;margin-right:10px '>
      <table class='table table-hover table-bordered'>
			<thead>
				<tr class='text-center text-white' style='background-color:#424c51'>
        <th style='width:30%'>Sport ID</th>
					<th style='width:55%'>Sport Name</th>
					<th style='width:15%'>Actions</th>
				</tr>
			</thead>
			<tbody>";

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);

		  echo "<tr>
      <td>{$sportID}</td>	
					<td>{$sportsName}</td>
					<td>
						<a class='btn btn update-object' style='background-color:#749da1; color:white; width:40%' update-id='{$sportID}'>Edit</a>
						<input type = 'button' class = 'btn btn deleteForm' style='color:white; background-color:#ee5a65; width:50%' value ='Delete' sportID = '{$sportID}'>
					</td>
				</tr>";
			}
			
		echo "</tbody>
				<div id='alert' class='alert alert-success' style='display:none'>
    <strong>Successfully added!</strong>
  				</div>
			</table>";
			
	$page_url="sports2.php?searchTextBox={$sport->searchValue}&";
    include_once 'paging.php';
    }
?>
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
          <td><input type="text" class="form-control" name="sportsName" required "></td>
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
<!--{END} Add Sport-->

<?php 
  if(isset($_POST['addSport'])){
    $sportsName = mysqli_real_escape_string($conn,$_POST['sportsName']);
   

    $check_duplicate_sportname = "SELECT sportsName from sport WHERE sportsName='$sportsName'";
    $result =mysqli_query($conn, $check_duplicate_sportname);
    $count = mysqli_num_rows($result);

      if($count > 0 ){
        echo "<script type='text/javascript'>alert('Error! Sport is already created.');</script>";
        return false;
      }
        echo "<script type='text/javascript'>alert('Added Successfully!'); location='sports2.php';</script>";
        $default= '123';
      $sport = new Sports($db);

      $sport->sportsName = $_POST['sportsName'];
      $sport->addSport();
      }

?>

<!--{START} Edit Sport modal-->
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
<!--{END} Edit Sport modal-->


<script>
//Add Sport
/*$('#addUserForm').on('submit', function(event){
	event.preventDefault();
	
	$.ajax({
		url:'userAdd.php',
		method: "POST",
		data:$('#addUserForm').serialize(),

		
		success:function(data){
			location.reload();
			$('#addUserModal').modal('hide');
			//alert('Added Successfully!');
		}
	});
});*/

//Edit Sport
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


//Delete
$(document).on('click', '.deleteForm', function(){
    var id = $(this).attr('sportID');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('sportDelete.php', {
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