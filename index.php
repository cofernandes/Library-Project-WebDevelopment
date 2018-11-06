<?php

/*sing in*/
session_start();
$_SESSION["emaillogin"];
$_SESSION["idconnected"];
$idconnected = $_SESSION["idconnected"];

$hoje = date("Y-m-d");
$hora = date("H:i:s");

/*validate session*/
if(!isset($_SESSION["emaillogin"])){
  header("Location: /login.php");
}

require("connection/connection.php");
$pdo = connection();


require("scripts/index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CCT Library</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- ico ico -->
  <link rel="shortcut icon" href="/imagens/icone/gavel.ico" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
<!-- ChartJS 1.0.1 -->

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/css.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="js/meus-scripts.js"></script>
  <!--<script src="js/jquery-1.11.3.min.js"></script>-->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/jquery.maskMoney.js"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header" >

    <!-- Logo -->
    <a href="/" class="logo hidden-xs">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CCT Library</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CCT Library</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle visible-xs" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      

     <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        <li class="dropdown notifications-menu"  alt="Logout" title="Logout.">
          <a href="/?action=logout">
            <i class="fa fa-sign-out" style="font-size:18px;"></i><span class="hidden-xs">Logout</span>
          </a>
        </li>


<li class="dropdown user user-menu notifications-menu hidden-xs">
            <a href="/" class="dropdown-toggle" >
              <img src="images/user/avatar.png" class="user user-image">
              <span class="hidden-xs">&nbsp;</span>
            </a>
          </li>

        </ul>
      </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <!--<form action="#" method="post" class="sidebar-form" >
        <div class="input-group">
          <input type="text" class="form-control" name="buscar"  placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-flat"   name="btnBuscar" type="submit"><i class="fa fa-search"></i></button>
              </span>
        </div>
      </form>-->
      <ul class="sidebar-menu">
        <li  class="treeview visible-xs">
          <a href="/perfil">
            <i class="fa fa-user text-green "></i><span></span>
          </a>
        </li>
        <li  class="treeview">
          <a href="/">
            <i class="fa fa-home"></i><span>Home</span>
          </a>
        </li>

        <?php if($profileUser == "root"){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Display</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/display-author"><i class="fa fa-user-plus text-blue"></i>Author</a></li>
            <li><a href="/display-book"><i class="fa fa-user-plus text-blue"></i>Book</a></li>
            <li><a href="/display-publishing-company"><i class="fa fa-user-plus text-blue"></i>Publishing company</a></li>
            <li><a href="/display-user"><i class="fa fa-user-plus text-blue"></i>User</a></li>
          </ul>
        </li>


        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>Register</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/register-author"><i class="fa fa-user-plus text-blue"></i>Author</a></li>
            <li><a href="/register-book"><i class="fa fa-user-plus text-blue"></i>Book</a></li>            
            <li><a href="/register-publishing-company"><i class="fa fa-user-plus text-blue"></i>Publishing company</a></li>
            <li><a href="/register-user"><i class="fa fa-user-plus text-blue"></i>User</a></li>
          </ul>
        </li>


        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>Rent</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/leased-book"><i class="fa fa-user-plus text-blue"></i>Leased books</a></li>
            <li><a href="/rentbook"><i class="fa fa-user-plus text-blue"></i>Rent Book</a></li>
          </ul>
        </li>



        <?php }else{?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/display-book"><i class="fa fa-user-plus text-blue"></i>Display Book</a></li>
            <li><a href="/display-book-rent"><i class="fa fa-user-plus text-blue"></i>Display Book Rent</a></li>
          </ul>
        </li>
        <?php } ?>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>




 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php
if(isset($_GET["action"]) && isset($_GET["action"])=="logout"){
  /*$sqlGravaLog = $pdo->prepare("INSERT INTO log(idUsuario,dataLog,horaLog,acao,observacoes)VALUES('$idLogado','$hoje','$hora','LOGOF_SISTEMA','O usuario desconectou-se do sistema.');");
  $sqlGravaLog->execute();
  unset($pdo);*/
  session_destroy();
  echo '<div class="panel panel-primary bg-green">
  <div class="panel-body">
    <i class="fa fa-sign-in"></i>Your session has been successfully completed....
  </div>
</div>';
  echo "<meta http-equiv='refresh' content='0; url=/'>";
}
    $_SERVER["REQUEST_URI"];
    $first = strrchr($_SERVER["REQUEST_URI"],"?");
    $second = str_replace($first,"",$_SERVER["REQUEST_URI"]);
    $url = explode("/", $second);
    array_shift($url);

    if(!empty($url[0])){
      if(file_exists("content/".$url[0].".php")){
        require("content/".$url[0].".php");
      }else{
        require("Location: content/home.php");
      }
   }

  if(empty($url[0])){
    require("content/home.php");
  }
  
unset($pdo);



?>
</div>

<div class="row">
  <footer class="main-footer">
    <div class="pull-right">
      <b>Version</b> BETA
    </div>
    <strong class="hidden-xs">
      Copyright &copy; 2017-<?php echo date("Y");?> Library.
    </strong>All rights reserved.

  </footer>
</div>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick 
<script src="plugins/fastclick/fastclick.js"></script>-->
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline
<script src="plugins/sparkline/jquery.sparkline.min.js"></script> -->
<!-- jvectormap 
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- SlimScroll 1.3.0 
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
<!-- ChartJS 1.0.1 
<script src="plugins/chartjs/Chart.min.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="dist/js/pages/dashboard2.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</div>
</body>
</html>