<?php

// device info
$deviceID = "390024001347343338333633";
$accessToken = "fa2405080d01b918e0574a0f23a0b06c64332305";

// name of variable exposed from Photon
$command = "light";

$url = "https://api.particle.io/v1/devices/".$deviceID."/".$command."?access_token=".$accessToken;

$resultString = file_get_contents($url);

/* result will be something like this:
{
  "cmd": "VarReturn",
  "name": "light",
  "result": 2102,
  "coreInfo": {
    "last_app": "",
    "last_heard": "2016-04-23T11:05:28.888Z",
    "connected": true,
    "last_handshake_at": "2016-04-23T11:00:04.321Z",
    "deviceID": "390024001347343338333633",
    "product_id": 6
  }
}
*/

// check if result
if ($resultString) {
    $resultObject = json_decode($resultString);
    var_dump($resultString);
}

?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Læs sensor</title>
</head>
<body>
<style>
    body {
        margin: 30px 30px;
    }
</style>
<h3>Sensor værdi</h3>

</body>
</html>
