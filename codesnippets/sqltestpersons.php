<?php
require_once("dbconnection.php");

$name = 'Noam Chomsky';
$lastlogin = date("Y-m-d g:i:s", time()); // "now" formatted date like 2016-04-20 12:00:00

// this sql statement contains a placeholder for the variables $name (:name) and $lastlogin
$sql = "INSERT INTO persons (name, lastlogin) VALUES (:name, :lastlogin)";
$statement = $db->prepare($sql);

// bind values to the SQL statement
$statement->bindValue(':name', $name);
$statement->bindValue(':lastlogin', $lastlogin);

// execute the sql statement
$statement->execute();
?>
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

<?php
require_once("dbconnection.php");

$sql = "SELECT * FROM persons";
$statement = $db->prepare($sql);

// execute the sql statement
$statement->execute();

// get the result in array format.
$results = $statement->fetchAll();

?>
<h2>Login historik</h2>
<ul>
<?php
foreach ($results as $row) {
    echo "<li>";
    echo $row['lastlogin'];
    echo " -- ";
    echo $row['name'];
    echo "</li>";
}
?>
</ul>
