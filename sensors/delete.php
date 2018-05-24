#!/usr/bin/php

<?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$A = ($_POST["sensor"]);
echo $A;

if ($A == "1") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='1';");


	$B->execute();
	
	echo "delete1";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "2") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='2';");


	$B->execute();
	
	echo "delete2";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "3") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='3';");


	$B->execute();
	
	echo "delete3";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "4") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='4';");


	$B->execute();
	
	echo "delete4";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "5") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='5';");


	$B->execute();
	
	echo "delete5";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "6") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='6';");


	$B->execute();
	
	echo "delete6";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "7") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='7';");


	$B->execute();
	
	echo "delete7";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "8") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='8';");


	$B->execute();
	
	echo "delete8";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "9") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='9';");


	$B->execute();
	
	echo "delete9";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "10") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='10';");


	$B->execute();
	
	echo "delete10";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "11") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='11';");


	$B->execute();
	
	echo "delete11";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "12") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='12';");


	$B->execute();
	
	echo "delete12";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "13") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='13';");


	$B->execute();
	
	echo "delete13";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "14") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='14';");


	$B->execute();
	
	echo "delete14";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "15") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='15';");


	$B->execute();
	
	echo "delete15";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "16") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='16';");


	$B->execute();
	
	echo "delete16";

}
$A = ($_POST["sensor"]);
echo $A;

if ($A == "17") {

$B = $PDO->prepare("DELETE FROM `templogger`.`sensors` WHERE `ID`='16';");


	$B->execute();
	
	echo "delete16";

}


header("Location: config.html");
die();












?> 
