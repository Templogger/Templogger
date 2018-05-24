#!/usr/bin/php

<?php 
$s =($_POST['sensor']);
echo $s;

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$B = $PDO->prepare("UPDATE `templogger`.`Thresholds` SET `graph2`=:s WHERE col = 1");
$B->bindParam(':s', $s, PDO::PARAM_INT);
$B->execute();
header("Location: ajax22.html");
die();
?>
