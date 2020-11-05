<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application Site Name</title>
    <!-- AREA INCLUDE CSS FILE -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- AREA INCLUDE JS FILE -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
    
    <!-- OPEN TAG PHP -->
    <?php
            require_once('config/dbconfig/connection.config.php');
            require_once('config/class/login.class.php');
            $login = new UserLogin();
            //VALIDASI JIKA NILAI $SESSION LOGIN 'true'
            //AKAN DI LARIKAN KE HALAMAN UTAMA(BERANDA)
            if(@$_SESSION['login'])
            {
                echo "<script>document.location='app/pages';</script>";
            }
    ?>
    <!-- CLOSE TAG PHP -->
    <!-- OPEN TAG FORM LOGIN -->
    <div class="container" style="margin-top:100px">
        <div class="col-md-offset-4 col-md-4">
                <form class="form-signin" action="" method="post">
                    <h3>Please sign in</h3>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    </div>
                   
                    <div class="form-group">
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                   
                    <button class="btn btn-primary btn-block" name="sublog" type="submit">Sign in</button>
                </form>
        </div>   
    </div>
    <!-- CLOSE TAG FORM LOGIN -->
    <!-- OPEN TAG PHP -->
    <?php
       @$u = $_POST['username'];
       @$p = $_POST['password'];

       if(isset($_POST['sublog'])){
         $in = $login->login($u,$p);
         if($in)
         echo"
           <script>document.location='app/pages'</script>
           ";
         else
         echo"
           <div class='alert alert-danger'>
             <strong>Gagal</strong> Username atau Password salah.
             </div>
           ";
       }
       ?>
    <!-- CLOSE TAG PHP -->
</body>
</html>