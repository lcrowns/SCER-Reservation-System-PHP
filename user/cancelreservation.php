<?php
  $page_title = "Update User";
  include_once "../config/database.php";
  include_once "../classes/transactions.php";
  require_once 'validate.php';
  require 'name.php';



  $database = new Database();
  $db = $database->getConnection();

  $transactions = new Transactions($db);


  if(isset($_POST['trasactionID'])){
    $transactions->trasactionID = $_POST['trasactionID'];
    $stmt = $transactions->viewOneTransaction();
  }

  if(isset($_POST['update'])){
    $IDnumber = $_GET['IDnumber'];
    $transactions->transactions = $transactionID;
    
    $transactions->cancelReason = $_POST['cancelReason'];
    
    
    if($users->updateUserByUser()){
      echo "<script type='text/javascript'>alert('Cancel Successfully!'); location='myreservations.php';</script>";
  }
  else{
    echo "<script type='text/javascript'>alert('Try Again!');</script>";
  }
  }

?>
<html>
<body>
    <form id="cancelForm" method="POST" action="cancelreservation.php?trasactionID=<?php echo $transactionID ?>">

        <div class="modal-body">
    <h5><b>Transaction ID: <?php echo $transactionID ?></b></h5>
          <table class='table table-hover table-bordered'>
      <tr>
        <th>Reason</th>
        <th><input type="text" class="form-control" name="cancelReason" ></th>
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

  
