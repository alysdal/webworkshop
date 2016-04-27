<?php

require_once("dbconnection.php");

$name = 'Chomsky';
$value = 800; // light intensity
$timestamp = date("Y-m-d g:i:s", time()); // formatted date like 2016-04-20 12:00:00

$sql = "INSERT INTO sensors (id, name, value, timestamp) VALUES (NULL, :name, :value, :timestamp)";
$statement = $db->prepare($sql);

// bind values to the SQL statement
$statement->bindValue(':name', $name);
$statement->bindValue(':value', $value);
$statement->bindValue(':timestamp', $timestamp);

// execute the sql statement
$statement->execute();


// this sql statement contains a placeholder for the variable $name (:name)
$sql = "SELECT * FROM sensors WHERE name = :name ORDER BY timestamp DESC";
$sth = $db->prepare($sql);

// bind values to the SQL statement
$sth->bindValue(':name', $name);

// execute the sql statement
$sth->execute();

// get the result in array format.
$results = $sth->fetchAll();

?>
Select test
<ul>
<?php
foreach ($results as $row) {
    ?>
        <li><?php echo $row['timestamp']; ?>: <?php echo $row['name']; ?>  lysintensitet: <?php echo $row['value']; ?></li>
    <?php
}

?>
</ul>
