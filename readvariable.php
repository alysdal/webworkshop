<?php

// API address
//                                                DEVICE ID        VARIABLE                         ACCESS TOKEN
$url = "https://api.particle.io/v1/devices/390024001347343338333633/light?access_token=fa2405080d01b918e0574a0f23a0b06c64332305";

// download from url
$resultString = file_get_contents($url);

// check if result
if ($resultString) {
    $resultObject = json_decode($resultString);
    var_dump($resultObject);
}

?>
