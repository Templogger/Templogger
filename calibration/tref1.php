#!/usr/bin/php
<?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$A = ($_POST['tref2']);

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `referance2`=:A WHERE `ID`=1;');
$B->bindParam(':A', $A, PDO::PARAM_INT);
$B->execute();


echo $A;	
header("Location: calibrate.html");
die();
?>
 
