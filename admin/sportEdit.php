<?php
	include_once "../config/database.php";
	include_once "../classes/sports.php";

	$database = new Database();
	$db = $database->getConnection();

	$sport = new Sports($db);

	if(isset($_POST['sportID'])){
		$sport->sportID = $_POST['sportID'];
		$stmt = $sport->viewOneSport();
	}

	if(isset($_POST['update'])){
		$sportID = $_GET['sportID'];
		$sport->sportID = $sportID;
		
		$sport->sportsName = $_POST['sportsName'];
		
		if($sport->updateSport()){
			echo "<script type='text/javascript'>alert('Updated Successfully!'); location='sports2.php';</script>";
  }
  else{
    echo "<script type='text/javascript'>alert('Try Again!');</script>";
  }
	}

?>
<html>
<body>
    <form id="editSportForm" method="POST" action="sportEdit.php?sportID=<?php echo $sport->sportID ?>">

        <div class="modal-body">
    <h5><b>Sport ID: <?php echo $sport->sportID ?></b></h5>
          <table class='table table-hover table-bordered'>
			<tr>
				<th>Sport Name</th>
				<th><input type="text" class="form-control" name="sportsName" value="<?php echo $sport->sportsName ?>" required></th>
			</tr>


		</table>
		<div class="modal-footer">
          <input type="submit" class="btn" style="background-color:#749da1; color:white" name="update" value="Save">
          <button type="button" class="btn" data-dismiss="modal" style="background-color:#ef6a65; color:white" id="cancel">Cancel</button>
        </div>
        </div>
		
    </form>
    
	</body>
	</html>
