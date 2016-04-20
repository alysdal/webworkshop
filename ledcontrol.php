<?php

$deviceID = "390024001347343338333633";
$accessToken = "e64795912ede4a5cb51a4b15c981b6f66b11eac8";
$command = "setcolor";
$url = "https://api.particle.io/v1/devices/".$deviceID."/".$command."?access_token=".$accessToken;

function makePostRequest($url, $data) {

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { die("http error"); }
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
    <input type="radio" name="color" value="255,0,0"> Red
    <input type="submit" value="Update led">
</form>

<h3>Output</h3>
<pre>
    <?php
if (isset($_POST['color'])) {
    // update led color
    $data = ['args' => $_POST['color']];
    echo "<pre>";
    echo makePostRequest($url, $data);
    echo "</pre>";
}
    ?>
</pre>
</body>
</html>
