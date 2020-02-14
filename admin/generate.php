<?php
include_once 'header.php';

if (isset($_POST['submit'])){
  if($_POST['pdf'] != ''){
    echo "<script type='text/javascript'>location='{$_POST['pdf']}?sd={$_POST['startdate']}&ed={$_POST['enddate']}';</script>";
  }else{
    echo "<script type='text/javascript'>alert('Please select an option.');</script>";
  }
}
?>

<body>
    

    <br><br>
    <div class="container">
    <h3 style="margin-bottom: 0;margin-left: 250px;">Generate Transaction</h3>
   <div class="card border-secondary mb-5" style="max-width: 100%; margin-left: 250px;margin-right: 250px;">
      <form method="POST" action="" name="cpass">
        <div class="card-body text-dark">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label>Select What Report to Generate</label>
            <select class="form-control" name="pdf" id="pdf" required="" >
                     <option selected readonly value="" disabled>--Select Report--</option>
                      <option value="pdf.php">List of Transactions</option>
                      <option value="pdf2.php">List of Clients</option>
                      
            </select>
          </div>
        </div>
         <h5>Select Date</h5>
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="inputEmail4">Start Date</label>
            <input type="date" class="form-control"  id="startdate" name="startdate">
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">End Date</label>
            <input type="date" class="form-control" id="enddate" name="enddate">
          </div>
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