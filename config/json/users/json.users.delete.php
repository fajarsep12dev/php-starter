<?php
header("Content-type:application/json");

require_once('../../dbconfig/connection.config.php');
require_once('../../class/users.class.php');

@$user_id       = $_POST['user_id'];

$user       = new users();
$isInsert   = $user->deleteUser($userid);

if ($isInsert) $result = "Success";
else $result = "Fail";

$obj =new \stdClass();
$obj->data = $result;

echo json_encode($obj, JSON_PRETTY_PRINT);

?>