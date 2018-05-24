#!/usr/bin/php

<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$n = $_POST['S1'];


$G = $_POST['T1'];
$A = $PDO->prepare("UPDATE `templogger`.`Thresholds` SET `upperThreshold`=:G WHERE `col`=$n ;");
$A->bindParam(':G', $G, PDO::PARAM_INT);
if ($_POST['T1']) {
		$A->execute();
		echo $G;
} else {

		echo "1 off";
};

$H = $_POST['T2'];
$B = $PDO->prepare("UPDATE `templogger`.`Thresholds` SET `lowerThreshold`=:H WHERE `col`=$n ;");
$B->bindParam(':H', $H, PDO::PARAM_INT);
if ($_POST['T2']) {
		$B->execute();
		echo $H;
} else {

		echo "1 off";
};

header("Location:../index.html");
die();
?>