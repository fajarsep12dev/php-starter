<?php
@session_start();

if(@!$_SESSION['login']){
	echo "<script>document.location='../../';</script>";
}else{
	include "page.layout.php";
}

?>
