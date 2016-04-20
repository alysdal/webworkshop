<?php

$obj = new stdClass();
$obj->name = "Chomsky";
$obj->value = rand(18, 26);
$obj->timestamp = time();

echo json_encode($obj);


?>