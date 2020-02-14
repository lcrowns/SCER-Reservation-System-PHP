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
  			<h2>On-Going Reservations</h2>
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
        <a class = "btn btn-info disabled"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
        <a class = "btn btn-secondary" href = "checkout.php"><span class = "badge"><?php echo $f_co['total']?></span> Check Out</a>
        <a class = "btn btn-danger" href = "cancelledtransactions.php"><span class = "badge"><?php echo $f_c['total']?></span>Cancelled Transactions</a>
         <a class = "btn btn-success" href = "checkinwalkin.php" style="margin-left: 800px"><i class = "glyphicon glyphicon-plus"></i> Add Walk In</a>
        <br />
        <br />
        <table id = "table" class = "table table-bordered">
          <thead>
            <tr  class='text-center text-white' style='background-color:#424c51'>
              <th>Full Name</th>
             
              <th>Venue</th>
              
              <th>Check In</th>
              <th>Days of Use</th>
              
              <th>Reason for Charges</th>
              <th>Additional Charges</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `status` = 'Check In'") or die(mysqli_query());
              while($fetch = $query->fetch_array()){
            ?>
            <tr>
              <td><?php echo $fetch['firstName']." ".$fetch['lastName']?></td>
              
              <td><?php echo $fetch['courtName']?></td>
              
              <td><?php echo "<label>".date("M d, Y", strtotime($fetch['checkIn']))."</label>"."  "."<label>".date("h:i a", strtotime($fetch['checkInTime']))."</label>"?></td>
              <td><?php echo $fetch['daysUse']?></td>
              
              <td><?php echo $fetch['chargeReason'] ?></td>
              <td><?php echo $fetch['additionalItems']?></td>
              <td><?php echo $fetch['totalPrice']?></td>
              <td><center>
                <a class = "btn btn-outline-info" href = "addcharges.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-edit"></i> Add Charges</a>
                <a class = "btn btn-outline-secondary" href = "checkout_query.php?transactionID=<?php echo $fetch['transactionID']?>" onclick = "confirmationCheckin(); return false;"><i class = "glyphicon glyphicon-check"></i> Check Out</a>
                <a class = "btn btn-outline-danger" href = "cancelreason.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-edit"></i> Cancel</a>
                <!--..-->
                <!--<a class = "btn btn-outline-danger" onclick = "confirmationDelete(); return false;" href = "delete_pending.php?transactionID=<?php echo $fetch['transactionID']?>"><i class = "glyphicon glyphicon-trash"></i>Cancel</a>-->
              </center></td>
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
<script type = "text/javascript">
  function confirmationCheckin(anchor){
    var conf = confirm("Are you sure you want to check out?");
    if(conf){
      window.location = anchor.attr("href");
    }
  }
</script>
<script type = "text/javascript">
  function confirmationDelete(anchor){
    var conf = confirm("Are you sure you want to cancel this transaction?");
    if(conf){
      window.location = anchor.attr("href");
    }
  } 
</script>
</html>