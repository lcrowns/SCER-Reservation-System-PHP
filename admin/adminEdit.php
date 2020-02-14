<?php
    include 'header.php';
	//require_once 'validate.php';
	require 'name.php';
?>
<!DOCTYPE>
<html>
<title></title>
<body>

	
  		<br>
  		<h2 style="margin-left: 15px">Update Admin</h2>
  		<hr class='my-4'>
  	
  	

	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				
					<?php
						$query = $conn->query("SELECT * FROM `admin` WHERE `adminID` = '$_REQUEST[adminID]'") or die(mysqli_error());
						$fetch = $query->fetch_array();
					?>

					<div class="card-header">Update Admin </div>
					<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">User Name:
							<input type = "text" class = "form-control" name = "username" value = "<?php echo $fetch['username']?>" required/>
						</h4>
						<h4 class="card-title">First Name:
							<input type = "text" class = "form-control" name = "firstName" value = "<?php echo $fetch['firstName']?>" required/>
						</h4>
						<h4 class="card-title">Middle Name:
							<input type = "text" class = "form-control" name = "middleName" value = "<?php echo $fetch['middleName']?>"/>
						</h4>
						<h4 class="card-title">Last Name:
							<input type = "text" class = "form-control" name = "lastName" value = "<?php echo $fetch['lastName']?>"  required/>
						</h4>
						<h4 class="card-title">Address:
							<input type = "text" class = "form-control" name = "address" value = "<?php echo $fetch['address']?>"  required/>
						</h4>
						<h4 class="card-title">Contact Number:
							<input type = "text" class = "form-control" name = "contactNumber" value = "<?php echo $fetch['contactNumber']?>"  required/>
						</h4>
						<br />
					
					<div class = "col-md-12">
							<button name = "adminEdit" class = "btn btn-outline-info" style="margin-left: 840px" href="admin.php"> Save Changes</button>
							<a href="admin.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php require_once 'adminEditQuery.php' ?>
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