#!/usr/bin/php 
 <?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$SQL = "SELECT * FROM templogger.sensors
ORDER BY dated  INTO OUTFILE '/tmp/jobd.txt' FIELDS TERMINATED BY ',';";
$STMT = $PDO->prepare($SQL);
$STMT->execute();


#header("Location:../index.html");
#die();
?>