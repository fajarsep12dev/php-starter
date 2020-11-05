<?php
header("Content-type:application/json");

require_once('../../dbconfig/connection.config.php');
require_once('../../class/workflow.class.php');
require_once('../../class/messages.class.php');

$messages       = $_POST['messages'];
$ws_status      = $_POST['ws_status'];
$msg_type       = $_POST['msg_type'];

$wa = new Messages();
$get = $wa->FormatVerificationMessage(
            $messages,     
            $ws_status,  
            $msg_type
        );

echo json_encode($get, JSON_PRETTY_PRINT);

?>

