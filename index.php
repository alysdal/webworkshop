<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Index fil</title>
</head>
<body>
<style>
    body {
        margin: 30px 30px;
    }
</style>
<h3>Webworkshop</h3>

<h2>Foreach loop</h2>
<?php
$arr = [1,2,3,4,5,6,7,8,9,10];
foreach ($arr as $value) {
    echo $value . " øl <br>";
}
?>
</body>
</html>