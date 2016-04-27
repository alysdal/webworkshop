<?php
require_once("./dbconnection.php");

// this sql statement contains a placeholder for the variables $name (:name) and $lastlogin
$sql = "INSERT INTO `sensors` (`id`, `name`, `value`, `timestamp`) VALUES (NULL, 'Test fra PHP', :value, '2016-04-27 00:00:00');";
$statement = $db->prepare($sql);

$value = $_GET['sensorvalue'];

$statement->bindValue(':value', $value);

// execute the sql statement
$statement->execute();

echo "indsat..";
