#!/usr/bin/php

<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$A = $PDO->query('SELECT ID FROM templogger.sensors GROUP BY ID DESC LIMIT 1;');
$data = array();
foreach($A->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data = floatval($row['ID']);
}
$number = ($data +1);
$n = -1;
$raw = shell_exec("/home/pi/Tempreture-logger/sensors.py");

while($n < 15) {
	$n = ($n +1);


	$t = preg_split ('/$\R?^/m', $raw);

	if (isset($t[$n])){
		$r = ($t[$n]);
		$ra = strval($r);
		$v = preg_split ("/[\s,]+/", $ra);
		}	
	else{$v = 0;}

	if (isset($v[1]))
	{
		$d = strval($number + $n);
		$C = 1;
		if ($v[1] == "OPT3001") {
			$addr = strval("0x44".$n);}
		if ($v[1] == "SI7051") {
			$addr = strval("0x40".$n);}
		if ($v[1] == "SHT31-D") {
			$addr = strval("0x45".$n);}
		if ($v[1] == "BMP085") {
			$addr = strval("0x77".$n);}
		$vv = "auto-Discovered";
		$ch = strval($v[0]);

		$type = strval($v[2]);

		$name = strval($v[1]);

		$B = $PDO->prepare("INSERT INTO `templogger`.`sensors` (`ID`, address, `active`, `channel`, `type`, `name`, `displayName`) VALUES (? ,? ,? ,? ,? ,? ,? );");
		$B->bindParam( 1, $d);
		$B->bindParam( 2, $addr);
		$B->bindParam( 3, $C);
		$B->bindParam( 4, $ch);
		$B->bindParam( 5, $type);
		$B->bindParam( 6, $name);
		$B->bindParam( 7, $vv);
		$B->execute();
		
}
}

?>
