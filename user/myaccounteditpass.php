<?php
  $page_title = "Update User";
  include_once "../config/database.php";
  include_once "../classes/users.php";
  require_once 'validate.php';
  require 'name.php';



  

?>
<html>
<body>
    <form id="editUserPassForm" method="POST" action="">

        <div class="modal-body">
    
          <table class='table table-hover table-bordered'>
      <tr>
        <th>Old Password</th>
        <th><input type="text" class="form-control" name="firstName" value=""></th>
      </tr>
      <tr>
        <th>New Password</th>
        <th><input type="text" class="form-control" name="firstName" value=""></th>
      </tr>
      <tr>
        <th>Verify New Password</th>
        <th><input type="text" class="form-control" name="firstName" value=""></th>
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

  
