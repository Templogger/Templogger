#!/usr/bin/php

<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$A = $PDO->query('SELECT active FROM `templogger`.`sensors` WHERE ID =6;');
$T = $A->fetch();
$Y = $T[0];
floatval($Y);
echo $Y;
$D = 1;
if ($Y == $D) {

$raw = shell_exec("/home/pi/Tempreture-logger/max31856.py");

$t = preg_split ('/$\R?^/m', $raw);
$g = number_format((float)$t[0], 2, '.', '');
print_r($g);


$csvData = date('Y-m-d H:i:s');
$d = '7';
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$B = $PDO->prepare("INSERT INTO `templogger`.`sensorData` (`dated`, `sensorID`, `temperature`) VALUES (? ,? ,?);");
$B->bindParam( 1, $csvData);
$B->bindParam( 2, $d);
$B->bindParam( 3, $g);

$B->execute();

print_r($B);
}

?>
