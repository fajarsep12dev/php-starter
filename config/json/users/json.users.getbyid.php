<?php
header("Content-type:application/json");

require_once('../../dbconfig/connection.config.php');
require_once('../../class/users.class.php');

$user_id = $_POST["user_id"];

$user = new users();
$getUser = $user->getUserById($user_id);

foreach ($getUser as $item ){
    $data[] = $item;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>