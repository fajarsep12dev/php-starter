<?php
    session_start();
    require_once('../../../config/dbconfig/connection.config.php');     
    require_once('../../../config/class/login.class.php');
    $login = new UserLogin();
    $login->logout();
    echo "<script>document.location='../../../'</script>";
?>
