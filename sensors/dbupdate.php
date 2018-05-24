#!/usr/bin/php

<?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");


$A = ($_POST["F1"]);
$BB = ($_POST["F2"]);
$B = $PDO->prepare("INSERT INTO `templogger`.`sensors` (`ID`, `active`, `address`, `type`, `name`, `displayName`) VALUES ( :A, \"1\", :B, \"TEMPERATURE\", \"DS18B20 Temperature Sensor\", \"User-Add\");");
	$B->bindParam(':A', $A, PDO::PARAM_INT);
	$B->bindParam(':B', $BB, PDO::PARAM_INT);
	$B->execute();
	
	echo $A;
	echo $BB;








header("Location: config.html");
die();








?> 