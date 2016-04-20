<?php

// db connection
require('connect.php');

$sql = "SELECT * FROM sensors ORDER BY timestamp DESC";

$sth = $db->prepare($sql);
//$sth->bindValue(':id', '2');
$sth->execute();

$results = $sth->fetchAll();

$url = "http://localhost/sensordata.php"; // test

$data = file_get_contents($url);
$requestObject = json_decode($data);

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

saveSensorData($requestObject->name, $requestObject->value, $requestObject->timestamp);

var_dump($requestObject);

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Sensor display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdnjs.com/libraries/chart.js"></script>
    <style>
        body {
            margin: 0 30px;
        }
        td {
            border: 1px solid grey;
        }
    </style>
</head>
<body>
<h1>Sensor display</h1>
<table width="400px">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Value</th>
        <th>Timestamp</th>
    </tr>
    <?php
    foreach ($results as $res) {
    ?>
    <tr>
        <td><?php echo $res['id'] ?></td>
        <td><?php echo $res['name'] ?></td>
        <td><?php echo $res['value'] ?></td>
        <td><?php echo date("Y-m-d H:i:s", $res['timestamp']) ?></td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
