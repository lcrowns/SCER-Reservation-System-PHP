<!DOCTYPE html>
<?php
	include 'header.php';
	//require_once 'validate.php';
	require 'name.php';
	include_once "../classes/sports.php";
	include_once "../classes/courts.php";
	$sport = new Sports($db);
	$stmt = $sport->viewAllSport();
$database = new Database();
$db = $database->getConnection();
?>

	<head>
		<title>SCER</title>
		<meta charset = "utf-8" />
		
	</head>
<body>
	
	
	<br />
	<h2 style="margin-left: 15px">Venue
	</h2>
	<a href="courts.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
    <hr class='my-4'>
    
    
	<div class = "container form-row">
		<div class="form-group col-md-12">
			<div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">

				<?php
						
						$query2 = $conn->query("SELECT * FROM `sport`") or die(mysqli_error());
						$fetch2 = $query->fetch_array();
					?>

				 <div class="card-header">Add New Venue </div>
				
				<br />
				<div class="card-body">	
					<form method = "POST" enctype = "multipart/form-data" id="addCourt">
						<h4 class="card-title">
							Venue Name:
							<input type = "text" class = "form-control" name = "courtName" required/>
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
						<h4 class="card-title">Price
							<input type = "number" min = "0" max = "999999999" class = "form-control" name = "price" required />
						</h4>
						<h4 class="card-title">
						Photo
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<center id = "lbl">[Photo]</center>
							</div>
							<input type = "file" required = "required" id = "photo" name = "photo" />
						</h4>
						<br />
						<div class = "col-md-12">
							<button name = "addCourt" class = "btn btn-outline-info" style="margin-left: 890px">Save</button>
						
							<a href="courts.php"><button type="button" class="btn btn-outline-warning" data-dismiss="modal" >Back</button></a>
						</div>
					</form>
					
					<?php
					if(ISSET($_POST['addCourt'])){

						$courtName = mysqli_real_escape_string($conn,$_POST['courtName']);
					    $check_duplicate_courtName = "SELECT courtName from court WHERE courtName='$courtName'";
					    $result =mysqli_query($conn, $check_duplicate_courtName);
					    $count = mysqli_num_rows($result);

					      if($count > 0 ){
					        echo "<script type='text/javascript'>alert('Error! Court name is already taken.');</script>";
					        return false;
					      }
					        
					        

						$courtName = $_POST['courtName'];
						$sportID = $_POST['sportID'];
						$price = $_POST['price'];
						$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
						$photo_name = addslashes($_FILES['photo']['name']);
						$photo_size = getimagesize($_FILES['photo']['tmp_name']);
						move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);

						
						$conn->query("INSERT INTO `court` (courtName, sportID, price, photo) VALUES('$courtName', '$sportID', '$price', '$photo_name')") or die(mysqli_error());
						echo "<script type='text/javascript'>alert('Added Successfully!'); location='courts.php';</script>";
						//echo "<script>alert('Court successfully added!')</script>";
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
  <li class="breadcrumb-item"><a href="courts.php">Courts</a></li>
  <li class="breadcrumb-item active">Add New Venue</li>
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