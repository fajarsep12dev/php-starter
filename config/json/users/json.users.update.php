<?php
header("Content-type:application/json");

require_once('../../dbconfig/connection.config.php');
require_once('../../class/users.class.php');

@$user_id       = $_POST['user_id'];
@$user_fullname = $_POST['user_fullname'];
@$user_username = $_POST['user_username'];
@$user_password = $_POST['user_password'];
@$user_email    = $_POST['user_email'];  

$user       = new users();
$isInsert   = $user->updateUser($user_id, $user_fullname,$user_username,$user_password,$user_email);

if ($isInsert) $result = "Success";
else $result = "Fail";

$obj =new \stdClass();
$obj->data = $result;

echo json_encode($obj, JSON_PRETTY_PRINT);

?>