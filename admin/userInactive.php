
<?php
  $page_title = "Clients";
  include_once "header.php";

  include_once "../config/database.php";

  include_once "../classes/users.php";
require_once "connect.php";
  include_once "paginConfig.php";

date_default_timezone_set('Asia/Manila');
  $database = new Database();
  $db = $database->getConnection();

  $users = new Users($db);
  $stmt = $users->viewAllUserInactive();

  echo "
      <br>
      <h2 style='margin-left: 15px'>Clients List</h2>
        <hr class='my-4'>
        <div style='margin-left:10px;margin-right:10px '>
        <br>
        <div class='col-lg-12'>
          <a class='btn float-right' style='background-color:#808080; color:white' data-toggle='modal' data-target='#addUserModal'>Add New User</a>

         </div>

         <div class='form-inline'>
       <form action='user.php'>
       <input type='text' name='searchTextBox' class='form-control' placeholder='Search' style='width:300px;margin-left:1000px'>
       <button type='submit' class='form-control form-control-info' style='width:80px'>Search</button>
       </form>
       </div>
       
    </div>
    <br>";

    $users->searchValue=isset($_GET['searchTextBox']) ? $_GET['searchTextBox']: '';
    $stmt = $users->viewSearchResult($from_record_num, $records_per_page);
    $total_rows=$users->countSearchResult();

    if(!empty($users->searchValue)){
    echo 
    "<div class='alert alert-warning alert-dismissible' role='alert'>
    <strong>".$total_rows." search results </strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    </div>";
  }

  if($total_rows>0){

  echo "<div style='margin-left:10px;margin-right:10px '>
      <table class='table table-hover table-bordered'>
      <thead>
        <tr class='text-center text-white' style='background-color:#424c51'>
        <th style='width:30%'>ID Number</th>
          <th style='width:55%'>Client Names</th>
          <th style='width:15%'>Actions</th>
        </tr>
      </thead>
      <tbody>";

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

      echo "<tr>
      <td>{$IDnumber}</td>  
          <td>{$firstName} {$lastName}</td>
          <td>
            <a class='btn btn update-object' style='background-color:#749da1; color:white; width:40%' update-id='{$IDnumber}'>Edit</a>
            <input type = 'button' class = 'btn btn deleteForm' style='color:white; background-color:#ee5a65; width:50%' value ='Delete' IDnumber = '{$IDnumber}'>
          </td>
        </tr>";
      }
      
    echo "</tbody>
        <div id='alert' class='alert alert-success' style='display:none'>
    <strong>Successfully added!</strong>
          </div>
      </table>";
      
  $page_url="user.php?searchTextBox={$users->searchValue}&";
    include_once 'paging.php';
    }
?>
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

<!--{START} Edit user modal-->
<div class="modal" id="editUserModal" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color: #808080; color:white">
        <h5 class="modal-title">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    <div class="modal-body" id="editUserForm">
    <?php include_once "userEdit.php"; ?>
    </div>
    
    
    </div>
  </div>
</div>
<!--{END} Edit user modal-->


<script>
//Add User
/*$('#addUserForm').on('submit', function(event){
  event.preventDefault();
  
  $.ajax({
    url:'userAdd.php',
    method: "POST",
    data:$('#addUserForm').serialize(),

    
    success:function(data){
      location.reload();
      $('#addUserModal').modal('hide');
      //alert('Added Successfully!');
    }
  });
});*/

//Edit User
$(document).on ('click', '.update-object', function(){
    var id = $(this).attr('update-id');

    $.ajax({
      url:"userEdit.php",
      method:"POST",
      data:{IDnumber:id},
      success:function(data){
        $('#editUserForm').html(data);
        $('#editUserModal').modal('show');

      }
    });
  });


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