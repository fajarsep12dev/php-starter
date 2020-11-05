<?php
@session_start();

if(@!$_SESSION['login']){
	echo "<script>document.location='../../';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AQUA JAPAN</title>

    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/skin.css">
    <link rel="stylesheet" type="text/css" href="../../assets/font-awesome.min.css">

    <link href="../../assets/css/kendo/2015.1.429/kendo.common-material.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/kendo/2015.1.429/kendo.mobile.all.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/kendo/2015.1.429/kendo.dataviz.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/kendo/2015.1.429/kendo.material.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets/css/kendo/2015.1.429/kendo.dataviz.material.min.css" rel="stylesheet" type="text/css" />

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/respond.js"></script>
    <script src="../../assets/js/notif.js"></script>
    <script src="../../assets/js/slimscroll.js"></script>
    <script src="../../assets/js/jsonHelper.js"></script>
    <script src="../../assets/js/kendo.all.min.js"></script>



  </head>

  <body>
    <?php
        require_once('../../config/dbconfig/connection.config.php');  
        require_once('../../config/class/users.class.php');  
        
        $user   = new users();   
         
        // Mensetkan default halaman saat dibuka (setelah login)
        if(@!$_GET['p']){
            echo "<script>document.location='?p=beranda';</script>";
        }
    ?>
   <body class="hold-transition skin-blue-light sidebar-mini fixed">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" style="background-color: white;" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg" >
                  
                    <img src="../../assets/images/banner.jpg" class="img-responsive"  style="margin-top: -3px ; height: 55px "/>
                </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <div class="navbar-custom-menu">
                    <?php require_once "components/nav_top.php" ?>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- /.search form -->
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                
                    <!-- Optionally, you can add icons to the links -->
                   <?php require_once "components/nav_left.php" ?>
   
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content">

          
                    <?php include "page.paging.php";?>
            
              
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            
            <!-- Default to the left -->
            <strong>Copyright &copy; 2015 <a href="#">AQUA JAPAN</a>.</strong> All rights reserved.
        </footer>

        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

</body>
                  
      
    

</div>
</body>
</html>
   