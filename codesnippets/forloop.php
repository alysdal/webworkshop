<html>
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js" type="text/javascript"></script>
    <style>
        body {
            margin: 30px 30px;
        }
    </style>

</head>
<body>
<h2>For-loop test</h2>
<?php
for ($i=1; $i <= 10; $i++) {
    echo $i . "  øl <br>";
}
?>

<?php

function addNumbers($a, $b) {
    return $a + $b;
}

echo "3 + 4 = " . addNumbers(3, 4);
// 3 + 4 = 7
?>


</body>
</html>
