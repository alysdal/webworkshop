<?php

// db connection
require_once('dbconnection.php');
require_once('functions.php');


$url = "http://localhost/project/sensordata.php"; // test

$data = file_get_contents($url); // get request
$requestObject = json_decode($data);

//saveSensorData($requestObject->name, $requestObject->value, $requestObject->timestamp);

var_dump($requestObject);

$results = getSensorData("chomsky");

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Sensor display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdnjs.com/libraries/chart.js"></script>
    <style>
        body {
            margin: 30px 30px;
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
