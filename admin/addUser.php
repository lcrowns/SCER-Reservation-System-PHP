<!DOCTYPE html>
<?php
	include 'header.php';
	//require_once 'validate.php';
	require 'name.php';
	
?>

	<head>
		<title>SCER</title>
		<meta charset = "utf-8" />
		
	</head>
<body>
	
	
	<br />
	<h2 style="margin-left: 15px">Users
	</h2>
	<a href="user.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
    <hr class='my-4'>
    
    
	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
				 <div class="card-header">Add New User </div>
				
				<br />
				<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data">
						<h4 class="card-title">
							First Name:
							<input type = "text" class = "form-control" name = "firstName" />
						</h4>
						<h4 class="card-title">
							Middle Name:
							<input type = "text" class = "form-control" name = "middleName" />
						</h4>
						<h4 class="card-title">
							Last Name:
							<input type = "text" class = "form-control" name = "lastName" />
						</h4>
						<h4 class="card-title">
							Address:
							<input type = "text" class = "form-control" name = "address" />
						</h4>
						<h4 class="card-title">
							Contact Number:
							<input type = "text" class = "form-control" name = "contactNumber" />
						</h4>
						<h4 class="card-title">
							Username:
							<input type = "text" class = "form-control" name = "username" />
						</h4>
						<h4 class="card-title">
							
							<input type="hidden" class="form-control" name="password" value="123">
						</h4>
						<h4 class="card-title">
							
							<input type="hidden" class="form-control" name="dateadded" value="0000-00-00">
						</h4>
						
						
						<br />
						<div class = "col-md-12">
							<button name = "add_user" class = "btn btn-outline-info" style="margin-left: 890px">Save</button>
						
							<a href="courts.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					<?php

		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$contactNumber = $_POST['contactNumber'];
		$username = $_POST['username'];
		$password=$_POST['password'];
  		$dateadded=$_POST['dateadded'];
		
		if(ISSET($_POST['add_user'])){
		mysql_connect("localhost","root","");
		mysql_select_db("scer");
		$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
		if(mysql_query($query)>0)
		{
			echo "She's taken!";
		} else{
		$query=mysql_query("INSERT INTO users (IDnumber,firstName,middleName,lastName,address,contactNumber,username,password,dateadded) VALUES ('','$firstName','$middleName','lastName','address','contactNumber','username','password','dateadded')");
		echo "pasok";
	}
		//header("location:courts.php");
	}
?>
				</div>
			</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		
	</div>
	<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
  <li class="breadcrumb-item"><a href="user.php">Clients List</a></li>
  <li class="breadcrumb-item active">Add New Client</li>
</ol>
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