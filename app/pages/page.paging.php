<?php

switch($_GET['p']){
			case "beranda"	:if(@!file_exists('beranda/index.php'))
                            die('file tidak ada');
                            include "beranda/index.php";
                            break;
                            break;
            case "user"	    :if(@!file_exists('users/index.php'))
                            die('file tidak ada');
                            include "users/index.php";
                            break;
                            break;
            case "whatsapp" :if(@!file_exists('whatsapp/index.php'))
                            die('file tidak ada');
                            include "whatsapp/index.php";
                            break;
                            break;
            case "sms"	    :if(@!file_exists('sms/index.php'))
                            die('file tidak ada');
                            include "sms/index.php";
                            break;
                            break;                            
}
?>
