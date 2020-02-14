<?php
    include 'header.php';
  //require_once 'validate.php';
  require 'name.php';
  require_once "connect.php";
  include_once "../classes/users.php";
?>
<!DOCTYPE>
<html>
<title></title>
<body>
  <div style=>
  <div class="form-row">

    <div class="form-group col-md-12">
      <div class="form-group col-md-8">
        <br>
        <h2>Clients</h2>
        <hr class='my-4'>
      </div>
      <div class="form-group col-md-4">
        
      </div>
    <a class='btn ' style='background-color:#808080; color:white; margin-left: 1435px' data-toggle='modal' data-target='#addUserModal'>Add New Client</a>
  

      <ul class="nav nav-tabs" style='margin-left:15px;'>
  
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#active">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#inactive">Inactive</a>
  </li>
   
</ul>
<br>
 
 
  

<br>
<div id="myTabContent" class="tab-content">

  
  <!--.>-->

  <div class="tab-pane fade" id="all">
    <div class="form-group col-md-12">
      <table id = "table" class = "table table-bordered">
          <thead>
            <tr  class='text-center text-white' style='background-color:#424c51'>
              <th>ID Number</th>
              <th>Client Name</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = $conn->query("SELECT * FROM `users`") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
          ?>  
            <tr>
              <td><?php echo $fetch['IDnumber']?></td>
              <td><?php echo $fetch['firstName'] ." ".$fetch['lastName']?></td>
              <td><?php echo $fetch['accStatus']?></td>
              <td><center><a class = "btn btn-info" href = "userEdit.php?IDnumber=<?php echo $fetch['IDnumber']?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a>

                <input type = "button" class = "btn btn deleteForm" style="color:white; background-color:#ee5a65; width:15%"" value ="Delete" IDnumber ="<?php echo $fetch['IDnumber'] ?>">

                
            </tr>
          <?php
            }
          ?>  
          </tbody>
        </table>
      </div>
  </div>

<div class="tab-pane fade show active" id="active">
    <div class="form-group col-md-12">
      <table id = "table" class = "table table-bordered">
          <thead>
            <tr  class='text-center text-white' style='background-color:#424c51'>
              <th>ID Number</th>
              <th>Client Name</th>
             
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = $conn->query("SELECT * FROM `users` WHERE `accStatus` = 'Active'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
          ?>  
            <tr>
              <td><?php echo $fetch['IDnumber']?></td>
              <td><?php echo $fetch['firstName'] ." ".$fetch['lastName']?></td>
              
              <td>
                <center>
                  <a class = "btn btn-info" href = "userEdit.php?IDnumber=<?php echo $fetch['IDnumber']?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a>
                <input type = "button" class = "btn btn deactivateForm" style="color:white; background-color:#ee5a00; width:15%"" value ="Deactivate" IDnumber ="<?php echo $fetch['IDnumber'] ?>">

                

                
            </tr>
          <?php
            }
          ?>  
          </tbody>
        </table>
      </div>
  </div>
  
  <div class="tab-pane fade" id="inactive">
    <div class="form-group col-md-12">
      <table id = "table" class = "table table-bordered">
          <thead>
            <tr  class='text-center text-white' style='background-color:#424c51'>
              <th>ID Number</th>
              <th>Client Name</th>
             
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = $conn->query("SELECT * FROM `users` WHERE `accStatus` = 'Inactive'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){
          ?>  
            <tr>
              <td><?php echo $fetch['IDnumber']?></td>
              <td><?php echo $fetch['firstName'] ." ".$fetch['lastName']?></td>
              
              <td>
                <center>
                <input type = "button" class = "btn btn activateForm" style="color:white; background-color:blue; width:15%"" value ="Activate" IDnumber ="<?php echo $fetch['IDnumber'] ?>">

                <input type = "button" class = "btn btn deleteForm" style="color:white; background-color:#ee5a65; width:15%"" value ="Delete" IDnumber ="<?php echo $fetch['IDnumber'] ?>">

                
            </tr>
          <?php
            }
          ?>  
          </tbody>
        </table>
      </div>
  </div>

<!--{START} Add User-->
<div class="modal" tabindex="-1" id="addUserModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #808080; color:white">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <form id="addUserForm" method="POST" action="#">
      <div class="modal-body">
    <table class='table table-hover table-bordered'>
          
          
            
          
          
          <tr>
          <th>Username</th>
          <td><input type="text" class="form-control" name="username" required placeholder="juan"></td>
          </tr>

          <tr>
          <th>First Name</th>
          <td><input type="text" class="form-control" name="firstName" required placeholder="Juan"></td>
          </tr>

          <tr>
          <th>Middle Name</th>
          <td><input type="text" class="form-control" name="middleName" placeholder="(optional)"></td>
          </tr>

          <tr>
          <th>Last Name</th>
          <td><input type="text" class="form-control" name="lastName" required placeholder="de la Cruz"></td>
          </tr>

          <tr>
          <th>Address</th>
          <td><input type="text" class="form-control" name="address" required placeholder="AA 01 Acorn St, Alabang"></td>
          </tr>

          <tr>
          <th>Contact Number</th>
          <td><input type="text" class="form-control" name="contactNumber" required value="09"></td>
          </tr>

          

          <tr>
         
          <td><input type="hidden" class="form-control" name="dateadded" value="0000-00-00"></td>
          </tr>
      
    </table>
      </div>

      <div class="modal-footer">
          <input type="submit" class="btn" name="addClient" style="background-color:#749da1; color:white"  value="Save">
          <button type="button" class="btn" data-dismiss="modal" style="background-color:#ef6a65; color:white" id="cancel">Cancel</button>
       </div>
    </form>
    </div>
  </div>
</div>
<!--{END} Add User-->

<?php 
  if(isset($_POST['addClient'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
   

    $check_duplicate_username = "SELECT username from users WHERE username='$username'";
    $result =mysqli_query($conn, $check_duplicate_username);
    $count = mysqli_num_rows($result);

      if($count > 0 ){
        echo "<script type='text/javascript'>alert('Error! Username is already taken.');</script>";
        return false;
      }
        echo "<script type='text/javascript'>alert('Added Successfully!'); location='user.php';</script>";
        $default= '123';
      $users = new Users($db);

      $users->username = $_POST['username'];
      $users->firstName = $_POST['firstName'];
      $users->middleName = $_POST['middleName'];
      $users->lastName = $_POST['lastName'];
      $users->address = $_POST['address'];
      $users->contactNumber = '09' + $_POST['contactNumber'];
      
      $users->password = $default;
      $users->dateadded = date('Y-m-d');
      $users->addUsers();
      }

?>

  
</div>

    </div>
    
  </div>


</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script> 
<script type = "text/javascript">
  function confirmationDelete(anchor){
    var conf = confirm("Are you sure you want to delete this record?");
    if(conf){
      window.location = anchor.attr("href");
    }
  } 
</script>

<script type = "text/javascript">
  $(document).ready(function(){
    $("#table").DataTable();
  });


</script>
<script>
  //Delete
$(document).on('click', '.deleteForm', function(){
    var id = $(this).attr('IDnumber');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('userDelete.php', {
            IDnumber: id
        }, function(data){
            location.reload();
            alert('Deleted Successfully!');
        }).fail(function() {
            alert('Unable to delete.');
        });
    }
});
</script>
<script>
  //Deactivate
$(document).on('click', '.deactivateForm', function(){
    var id = $(this).attr('IDnumber');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('userDeactivateQuery.php', {
            IDnumber: id
        }, function(data){
            location.reload();
            alert('Deactivated Successfully!');
        }).fail(function() {
            alert('Unable to deactivate.');
        });
    }
});
</script>

<script>
  //Activate
$(document).on('click', '.activateForm', function(){
    var id = $(this).attr('IDnumber');
    var q = confirm("Are you sure?");
     
    if (q == true){
        $.post('userActivateQuery.php', {
            IDnumber: id
        }, function(data){
            location.reload();
            alert('Activated Successfully!');
        }).fail(function() {
            alert('Unable to aactivate.');
        });
    }
});
</script>
</html>
