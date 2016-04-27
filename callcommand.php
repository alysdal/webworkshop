<?php

// device info
$deviceID = "390024001347343338333633";
$accessToken = "fa2405080d01b918e0574a0f23a0b06c64332305";
$command = "setcolor";

// api url
$url = "https://api.particle.io/v1/devices/".$deviceID."/".$command."?access_token=".$accessToken;


/**
 * Do a POST requests
 * @param string $url
 * @param string $data
 * @return string
 */
function makePostRequest($url, $data) {

    // konfiguration for POST-request
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);

    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        // noget gik galt
        die("http error, check photon is online");
    }

    return $result;
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Led Control</title>
</head>
<body>
<form action="" method="POST">
    <input type="radio" name="color" value="0,0,255"> Blue
    <input type="radio" name="color" value="0,255,0"> Green
    <input type="radio" name="color" value="255,0,0"> Red<br>
    <input type="submit" value="Update led">
</form>

<h3>Output</h3>
    <?php
    // check if POST data has been submitted
    if (isset($_POST['color'])) {
        $color = $_POST['color'];

        // photon forventer et parameter kaldet "args" med værdien.
        $data = [];
        $data['args'] = $color;

        $response = makePostRequest($url, $data);

        var_dump($response);
    }
    ?>
</body>
</html>
