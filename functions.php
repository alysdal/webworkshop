<?php
require_once("connect.php");

/**
 * Get sensor data from specific sensor
 * @param $name
 * @return array
 */
function getSensorData($name) {
    global $db;
    $sql = "SELECT * FROM sensors WHERE name = :name ORDER BY timestamp DESC";

    $sth = $db->prepare($sql);
    $sth->bindValue(':name', $name);
    $sth->execute();

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
    global $db;
    $sql = "INSERT INTO sensors (id, name, value, timestamp) VALUES (NULL, :name, :value, :timestamp)";
    $sth = $db->prepare($sql);

    // bind values to the SQL statement
    $sth->bindValue(':name', $name);
    $sth->bindValue(':value', $value);
    $sth->bindValue(':timestamp', $timestamp);

    $sth->execute();
}