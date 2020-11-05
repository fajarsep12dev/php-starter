<?php
header("Content-type:application/json");

require_once('../../dbconfig/connection.config.php');
require_once('../../class/users.class.php');

$user = new users();
$getUser = $user->getUsers();

foreach ($getUser as $item ){
    $data[] = $item;
}

$obj =new \stdClass();
$obj->data = $data;

echo json_encode($data, JSON_PRETTY_PRINT);
?>