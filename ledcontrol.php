<?php

$deviceID = "390024001347343338333633";
$accessToken = "fa2405080d01b918e0574a0f23a0b06c64332305";
$command = "setcolor";
$url = "https://api.particle.io/v1/devices/".$deviceID."/".$command."?access_token=".$accessToken;

function makePostRequest($url, $data) {
    $content = http_build_query($data);

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => $content
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { die("http error, check photon is online"); }
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
    <input type="text" name="custom" value=""> Custom<br>
    <input type="submit" value="Update led">
</form>

<h3>Output</h3>
<pre>
    <?php
if (isset($_POST['color']) || ! empty($_POST['custom'])) {
    $color = ! empty($_POST['custom']) ? $_POST['custom'] : $_POST['color'];
    // update led color
    $data = ['args' => $color];
    echo "<pre>";
    echo makePostRequest($url, $data);
    echo "</pre>";
}
    ?>
</pre>
</body>
</html>
