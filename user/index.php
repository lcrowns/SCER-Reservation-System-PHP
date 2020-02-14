<!DOCTYPE html>
<?php require_once "connect.php" ?>
<html lang = "en">
  <head>
    <title>SCER</title>
    <meta charset = "utf-8" />
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
    <link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
    <link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
  </head>
<body>
  
  <div class = "container">
    <br />
    <br />
    <div class = "col-md-4"></div>
    <div class = "col-md-4">
      <center><img src="../scer logo.png" width="250px"></center>
      <div class = "panel panel-primary">
        <div class = "panel-heading">
          <h4>Users</h4>
        </div>
        <div class = "panel-body">
          <form method = "POST">
            <div class = "form-group">
              <label>Username</label>
              <input type = "text" name = "username" class = "form-control" required = "required" />
            </div>
            <div class = "form-group">
              <label>Password</label>
              <input type = "password" name = "password" class = "form-control" required = "required" />
            </div>
            
            <div class = "form-group">
              <button name = "login" class = "form-control btn btn-primary"> Login</button>
            </div>
            <div class = "form-group">
              
              <div class = "col-md-6">
                  <a class="text-primary" href = "signup.php" >Sign up</a>
                </div>
              <div class = "col-md-6">
                <a class="text-primary" href="#" >Forgot Password?</a>
                </div>
            </div>
          </form>
          <?php require_once 'login.php' ?>
        </div>
      </div>
    </div>
    <div class = "col-md-4"></div>
  </div>  
  <br />
  <br />
  <div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
    <label>&copy;  SCER 2019 </label>
  </div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>  
</html>