<?php
echo "<a href=\"../index.html\"><font color=\"0000FF\">Main Menu</font></a>";
echo "<table style='border: solid 3px blue;'>";
echo "<tr><th>Id</th><th>Active</th><th>Serial_number</th><th>Sensor_type</th><th>Sensor_Name</th><th>Discovered</th><th>Last calibrated</th><th>Calibration_offset</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:2px solid blue;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT ID, active, address, type, name, displayName, lastCalibrated, calibrationOffset FROM `templogger`.`sensors`;');
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