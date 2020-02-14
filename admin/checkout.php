<?php
    include 'header.php';
	//require_once 'validate.php';
	require 'name.php';
?>
<!DOCTYPE>
<html>
<title></title>
<body>

	<div class="form-row">
  	<div class="form-group col-md-12">
  		<div class="form-group col-md-8">
        <br>
  			<h2>Checked Out Reservations</h2>
        <hr class='my-4'>
  		</div>
  		<div class="form-group col-md-4">
  		</div>
  	</div>
  	<div style='margin-left:10px;margin-right:10px '>
      <?php
        $q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
        $f_p = $q_p->fetch_array();
        $q_a = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Accepted'") or die(mysqli_error());
        $f_a = $q_a->fetch_array();
        $q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
        $f_ci = $q_ci->fetch_array();
        $q_co = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check Out'") or die(mysqli_error());
        $f_co = $q_co->fetch_array();
        $q_c = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Cancelled'") or die(mysqli_error());
        $f_c = $q_c->fetch_array();
      ?>
      <div class = "panel-body">
        <a class = "btn btn-success" href = "reserve.php"><span class = "badge"><?php echo $f_p['total']?></span> Pendings</a>
        <a class = "btn btn-warning" href = "accepted.php"><span class = "badge"><?php echo $f_a['total']?></span> Accepted</a>
        <a class = "btn btn-info" href = "checkin.php"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
        <a class = "btn btn-secondary disabled"><span class = "badge"><?php echo $f_co['total']?></span> Check Out</a>
        <a class = "btn btn-danger" href = "cancelledtransactions.php"><span class = "badge"><?php echo $f_c['total']?></span>Cancelled Transactions</a>
        <br />
        <br />
        <table id = "table" class = "table table-bordered">
          <thead>
            <tr  class='text-center text-white' style='background-color:#424c51'>
              <th>Name</th>
              <th>Venue</th>
              
              <th>Check In</th>
              <th>Days</th>
              <th>Check Out</th>
              
              <th>Additional Charges</th>
              <th>Total Price</th>
              <th>Status</th>
              <th>User Feedback</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
              $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `status` = 'Check Out'") or die(mysqli_query());
              while($fetch = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>
              <td><?php echo $fetch['courtName']?></td>
              
              <td><?php echo "<label>".date("M d, Y", strtotime($fetch['checkIn']))."</label>"."  "."<label>".date("h:i a", strtotime($fetch['checkInTime']))."</label>"?></td>
              <td><?php echo $fetch['daysUse']?></td>
              <td><?php echo "<label>".date("M d, Y", strtotime($fetch['checkIn']."+".$fetch['daysUse']."DAYS"))."</label>"."  "."<label>".date("h:i A", strtotime($fetch['checkOutTime']))."</label>"?></td>
              
              <td><?php if($fetch['additionalItems'] == "0"){ echo "None";}else{echo $fetch['additionalItems'];}?></td>
              <td><?php echo "Php. ".$fetch['totalPrice'].".00"?></td>
              <td><label class = "">Paid</label></td>
              <td><?php echo $fetch['feedback']?></td>
              
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