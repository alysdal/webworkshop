<?php

$dbType = 'mysql';
$dbHost = 'localhost';
$dbName = 'webworkshop';
$dbUser = 'root';
$dbPass = 'root';
$dbChar = 'UTF8';

try
{
    $db = new PDO($dbType . ':host=' . $dbHost . ';dbname=' . $dbName . ';charset=' . $dbChar, $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch(Exception $e)
{
    echo $e->getMessage();
    exit;
}
?>