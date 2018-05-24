#!/usr/bin/php
<?php

$n = $_POST['jobn'];


$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$A = $PDO->prepare("UPDATE `templogger`.`Thresholds` SET `email`=:G WHERE `col`= 1 ;");
$A->bindParam(':G', $n, PDO::PARAM_INT);
$A->execute();


header("Location:../index.html");
die();
?>
 