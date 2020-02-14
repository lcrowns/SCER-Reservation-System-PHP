<?php
    include 'header.php';
	//require_once 'validate.php';
	require 'name.php';
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

	
  		<br>
  		<h2 style="margin-left: 15px">Edit Venue</h2>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				
					<?php
						$query = $conn->query("SELECT * FROM `court` WHERE `courtID` = '$_REQUEST[courtID]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
						$query2 = $conn->query("SELECT * FROM `sport`") or die(mysqli_error());
						$fetch2 = $query->fetch_array();
					?>

					<div class="card-header">Add New Venue </div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">Venue Name:
							<input type = "text" class = "form-control" name = "courtName" value = "<?php echo $fetch['courtName']?>" required/>
						</h4>
						<h4 class="card-title">Sport Name:
							
							
      						<select class="form-control" name="sportID"  value = "<?php echo $fetch['sportsID']?>" required>
                     			<option selected="<?php echo $fetch['sportsID']?>"></option>
                     			$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `status` = 'Pending'") or die(mysqli_error());
                     			<?php 
                     			if($stmt->rowCount()>0){
								while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
								extract($row);
							          echo 
								'<option>' . $sportID." ".$sportsName. '</option>
								';
								}
							}
                      			?>
							
                  			
                  			</select>
						</h4>
						<h4 class="card-title">Price: 
							<input type = "number" min = "0" max = "999999999" value = "<?php echo $fetch['price']?>" class = "form-control" name = "price" />
						</h4>
						<h4 class="card-title">Photo
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<img src = "../photo/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%"/>
							</div>
							<input type = "file" required = "required" id = "photo" name = "photo" />
						</h4>
						<br />
					
					<div class = "col-md-12">
							<button name = "edit_court" class = "btn btn-outline-info" style="margin-left: 840px"> Save Changes</button>
							<a href="courts.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php require_once 'edit_query_court.php' ?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	
  	</div>
  </div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>