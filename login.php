<?php
error_reporting(0);
session_start();
if(isset($_SESSION["emaillogin"])){
  header("Location: /");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>CCT Library</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="robots" content="noindex, nofollow" />
  <meta name="robots" content="noarchive" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.min.css">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script src="js/jquery-2.1.4.min.js"></script>
</head>
<body class="hold-transition login-page">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">
        CCT Library
      </a>
    </div>
  </div>
</nav>


<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body box-shadow">
      <?php 
        require("scripts/login.php");
        require("scripts/user.php");
      ?>     
    <form action="#" method="post">

      <div class="form-group has-feedback">
        <label>E-mail</label>
        <input type="email" name="emaillogin" class="form-control" placeholder="Email" value="<?php echo $emaillogin;?>">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <label>Senha</label>
        <input type="password" name="passwordlogin" class="form-control" placeholder="Password">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Log in</button>
        </div>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
          Forgot password
        </button>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">
          Register
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <form action="#" method="post">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h4 class="modal-title" id="myModalLabel"> New User </h4>
      </div>
      <div class="modal-body">
        <div class="form-group col-sm-12 col-md-12 col-ls-12">
          <label>Name</label>
          <input type="text" class="form-control" name="nameUser" placeholder="Name">
        </div>
        <div class="form-group col-sm-12 col-md-12 col-ls-12">
          <label>Email</label>
          <input type="email" class="form-control" name="emailUser" placeholder="Email">
        </div>
        <div class="form-group col-sm-12 col-md-12 col-ls-12">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group col-sm-12 col-md-12 col-ls-12">
          <label>Confirm Password</label>
          <input type="password" class="form-control" name="cpassword" placeholder="Password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="registerUser">Register</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </form>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
      <form action="#" method="post">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h4 class="modal-title" id="myModalLabel">I forgot my password</h4>
      </div>
      <div class="modal-body">

      <div class="form-group has-feedback">
        <label>Email</label>
        <input type="email" name="emailforgot" class="form-control">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" name="passwordforgot" class="form-control">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Confirm password</label>
        <input type="password" name="cpasswordforgot" class="form-control">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
  
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"  name="upatedataforgot" >Update Password senha</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>        
      </div>
        </form>
    </div>
  </div>




<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>