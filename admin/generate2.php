<?php
include_once 'header.php';

include_once "../classes/users.php";
$user = new Users($db);
  $stmt = $user->viewAllUser();
$database = new Database();
$db = $database->getConnection();
if (isset($_POST['submit'])){
  if($_POST['pdf'] != ''){
    echo "<script type='text/javascript'>location='{$_POST['pdf']}?sd={$_POST['IDnumber']}';</script>";
  }else{
    echo "<script type='text/javascript'>alert('Please select an option.');</script>";
  }
}
?>

<body>
    

    <br><br>
    <div class="container">
    <h3 style="margin-bottom: 0;margin-left: 250px;">Generate Transaction of Clients</h3>
   <div class="card border-secondary mb-5" style="max-width: 100%; margin-left: 250px;margin-right: 250px;">
      <form method="POST" action="" name="cpass">
        <div class="card-body text-dark">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Select What Report to Generate</label>
            <select class="form-control" name="pdf" id="pdf" required="" >
                     <option selected readonly value="" disabled>--Select Report--</option>
                      <option value="pdfAll.php">All</option>
                      <option value="pdfPending.php">Pending</option>
                      <option value="pdfAccepted.php">Accepted</option>
                      <option value="pdfCheckedIn.php">Checked In</option>
                      <option value="pdfCheckedOut.php">Checked Out</option>
                      <option value="pdfCancelled.php">Cancelled</option>
                      
            </select>
          </div>
        </div>
         <h5>Select Date</h5>
        <div class="form-row">
            <label>Client List</label>
            <select class="form-control" name="IDnumber" id="IDnumber" required="" >
                     <option selected readonly value="" disabled>--Select--</option>
                      <option selected="<?php echo $fetch['IDnumber']?>"></option>
                          
                          <?php 
                          if($stmt->rowCount()>0){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                        echo 
                '<option>' .$IDnumber." ". $lastName.", ".$firstName. '</option>
                ';
                }
              }
                            ?>
                      
            </select>
          </div>
        <div class="form-row">
            <div class="form-group col-md-12 text-right">
              <button class="btn btn-primary" type="submit" id="submit" name="submit" style="float:right" >Generate</button>
            </div>
          </div>

        



        
        
      </form>
      </div>
  </div>

  </body>

  <script type="text/javascript">
$(document).ready(function(){
    $('#change').click(function(){
     $('#change').toggle();
     $('#toshow').toggle();
     $('#tohide').toggle();
    });

    $('#cancel').click(function(){
     $('#change').toggle();
     $('#toshow').toggle();
     $('#tohide').toggle();

     document.getElementById('password1').value = "";
     document.getElementById('password2').value = "";
     document.getElementById('password3').value = "";
    });
});


function checkform() {
  var old = "<?php echo $account->password ?>";
    if(document.cpass.password1.value == ''|| document.cpass.password2.value == '' || document.cpass.password3.value == ''){
      alert("Please enter the fields required.");
      return false;
    }else if(old == document.cpass.password2.value) {
      alert("Your old password cannot be your new one.");
      return false;
    }else if(document.cpass.password2.value != document.cpass.password3.value){
      alert("The new passwords entered does not match.");
      return false;
    }else if(document.cpass.password1.value != old){
      alert("The old password entered is incorrect.");
      return false;
    } else {
        document.cpass.submit();
    }
}
  </script>



<?php

?>