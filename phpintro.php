<?php

// page caption
$caption = "What is PHP?";
$content = "PHP is a...";

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<style>
    body {
        margin: 30px 30px;
    }
</style>
<h2><?php echo $caption; ?></h2>
<p>
    <?php echo $content; ?>
</p>
</body>
</html>