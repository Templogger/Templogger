<?php

echo "<tr><th>Id</th><th>Serial_number &nbsp;</th><th>Sensor_type </th><th>Sensor_Name </th><th>Discovered </th></tr><br>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "&nbsp;&nbsp;" .parent::current();
    }

    function beginChildren() {
        echo "&nbsp;";
    }

    function endChildren() {
        echo "<br>";
    }
}

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT ID, address, type, name, displayName FROM `templogger`.`sensors`;');
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

?> 