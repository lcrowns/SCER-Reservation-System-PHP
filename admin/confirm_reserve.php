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
      <h2 style="margin-left: 15px">Reservation Details
      </h2>
      <a href="accepted.php" style="margin-left: 15px"><span class="badge badge-pill badge-secondary">Back</span></a>
      <hr class='my-4'>
    
    

  <div class = "container form-row">
    <div class="form-group col-md-12">
      <div class="card text-white bg-dark mb-3 border-success" style="max-width: 80em;">
        
          <?php
          $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `transactionID` = '$_REQUEST[transactionID]'") or die(mysqli_error());
          $fetch = $query->fetch_array();
        ?>

          <div class="card-header">Client's Application Form </div>
          <div class="card-body"> 
          <form method = "POST" enctype = "multipart/form-data" action = "save_form.php?transactionID=<?php echo $fetch['transactionID']?>">
            <h4 class="card-title">First Name:
              <input type = "text" value = "<?php echo $fetch['firstName']?>" class = "form-control" size = "30" disabled = "disabled" style="width: 500px"/>
            </h4>
            <h4 class="card-title">Middle Name:
              <input type = "text" value = "<?php echo $fetch['middleName']?>" class = "form-control" size = "30" disabled = "disabled" style="width: 500px"/>
            </h4>
            <h4 class="card-title">Last Name:
              <input type = "text" value = "<?php echo $fetch['lastName']?>" class = "form-control" size = "30" disabled = "disabled" style="width: 500px"/>
            </h4>

            <h4 class="card-title">Venue Name:
              <input type = "text" value = "<?php echo $fetch['courtName']?>" class = "form-control" size = "20" disabled = "disabled" style="width: 500px"/>
            </h4>
              
            <h4 class="card-title">Price per day:
              <input type = "number" value = "<?php echo $fetch['price']?>" name="price" class = "form-control" required = "required" disabled = "disabled" style="width: 250px"/>

            </h4>
            <h4 class="card-title">Days of Use:
              <input type = "number" value = "<?php echo $fetch['daysUse']?>" name="daysUse" class = "form-control" required = "required" disabled = "disabled" style="width: 250px"/>

            </h4>
            
            
            <br />
          
          <div class = "col-md-12">
              <button name = "add_form" class = "btn btn-outline-info" style="margin-left: 800px"> Checkin</button>
              <a class = "btn btn-outline-danger" onclick = "confirmationDelete(); return false;" href = "delete_pending.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-trash"></i> Decline</a>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  <br />
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
  <li class="breadcrumb-item"><a href="reserve.php">Pending Transactions</a></li>
  <li class="breadcrumb-item active">Reservation Details</li>
</ol>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>  
</html>