<?php
require_once("dbconnection.php");

/**
 * Get sensor data from specific sensor
 * @param $name
 * @return array
 */
function getSensorData($name) {
    // use global variable defined in dbconnection.php
    global $db;

    // this sql statement contains a placeholder for the variable $name (:name)
    $sql = "SELECT * FROM sensors WHERE name = :name ORDER BY timestamp DESC";
    $sth = $db->prepare($sql);

    // bind values to the SQL statement
    $sth->bindValue(':name', $name);

    // execute the sql statement
    $sth->execute();

    // get the result in array format.
    $results = $sth->fetchAll();

    return $results;

}

/**
 * Saves sensor data
 * @param $name
 * @param $value
 * @param $timestamp
 */
function saveSensorData($name, $value, $timestamp) {
    // use global variable defined in dbconnection.php
    global $db;

    $sql = "INSERT INTO sensors (id, name, value, timestamp) VALUES (NULL, :name, :value, :timestamp)";
    $sth = $db->prepare($sql);

    // bind values to the SQL statement
    $sth->bindValue(':name', $name);
    $sth->bindValue(':value', $value);
    $sth->bindValue(':timestamp', $timestamp);

    // execute the sql statement
    $sth->execute();
}