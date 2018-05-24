<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$A = $PDO->prepare('DELETE FROM sensorData ;');


$A->execute();

header("Location:../index.html");
die();
?>
