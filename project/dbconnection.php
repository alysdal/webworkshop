<?php


$dbHost = 'localhost';
$dbName = 'webworkshop';
$dbUser = 'root';
$dbPass = 'root';

$dbType = 'mysql';
$dbChar = 'UTF8';

try
{
    // attempt to connect to the database
    $db = new PDO($dbType . ':host=' . $dbHost . ';dbname=' . $dbName . ';charset=' . $dbChar, $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); // show warnings, useful for debugging
}
catch(Exception $e)
{
    // if we get any errors, print them.
    echo $e->getMessage();
    exit;
}
?>





