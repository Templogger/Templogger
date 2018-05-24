#!/usr/bin/php

<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$A = $PDO->query('SELECT ID FROM templogger.sensors 
GROUP BY ID DESC LIMIT 1;');
$data = array();
foreach($A->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data = floatval($row['ID']);
	}
	
$S = $PDO->query('SELECT displayName FROM templogger.sensors 
GROUP BY ID DESC LIMIT 1;');
$dataS = array();
foreach($S->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$dataS = strval($row['displayName']);
	}
if ($dataS !== "i2c-Discovered"){
	$number = ($data +1);
	$n = -1;
	$raw = shell_exec("/home/pi/Tempreture-logger/sensors.py");

	while($n < 15) {
		$n = ($n +1);


		$type = preg_split ('/$\R?^/m', $raw);

		if (isset($type[$n])){
			$r = ($type[$n]);
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
			$vv = "i2c-Discovered";
			$ch = strval($v[0]);

			$type = strval($v[2]);

			$name = strval($v[1]);

			$B = $PDO->prepare("INSERT INTO `templogger`.`sensors` 
			(`ID`, address, `active`, `channel`, `type`, `name`, `displayName`)
			VALUES (? ,? ,? ,? ,? ,? ,? );");
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
}
$n = -1;
while ($n < 15) {
		$n = ($n +1);	
		$val = "1000000";
		
		$A = $PDO->query("SELECT name FROM templogger.sensors WHERE ID = $n ;");
		$data = array();
		foreach($A->fetchAll(PDO::FETCH_ASSOC) as $row) { 
			$data = strval($row['name']);
			}

		$F = $PDO->query("SELECT active FROM templogger.sensors 
		WHERE ID = $n ;");
		$dataF = array();
		foreach($F->fetchAll(PDO::FETCH_ASSOC) as $row) { 
			$dataF = floatval($row['active']);
			}

		$CH = $PDO->query("SELECT channel FROM templogger.sensors 
		WHERE ID = $n ;");
		$dataCH = array();
		foreach($CH->fetchAll(PDO::FETCH_ASSOC) as $row) { 
			$dataCH = floatval($row['channel']);
			}
			
		$Dtype = $PDO->query("SELECT type FROM templogger.sensors 
		WHERE ID = $n ;");
		$type = array();
		foreach($Dtype->fetchAll(PDO::FETCH_ASSOC) as $row) { 
			$type = strval($row['type']);
			}			
			
			
		

		if ($dataF == 1) {
				if ($data == "OPT3001") {
					$val = shell_exec("OTemp ".$dataCH);}
				if ($data == "SI7051") {
					$val = shell_exec("SiTemp -s ".$dataCH." -t");}
				if ($data == "SHT31-D") {
					$val = $D = shell_exec("HTemp ".$dataCH);
						 $hum = preg_split ('/$\R?^/m', $D);
						 $val = floatval($hum[1]);
						 $val1 = floatval($hum[0]);							
												;}
				if ($data == "BMP085") {
						 $D = shell_exec("PTemp ".$dataCH); 
						 $hum = preg_split ('/$\R?^/m', $D);
						 $va = floatval($hum[1]);
						 $val1 = floatval($hum[0]);	
						 $val = ($va/100);					 
						 					}
                                 }
if ($val !== "1000000"){	
			$DBdata = "`templogger`.`sensorData` (`dated`, `sensorID`, `".$type."`)";
			$csvData = date('Y-m-d H:i:s');
			$B = $PDO->prepare("INSERT INTO $DBdata VALUES (? ,? ,?);");
			$B->bindParam( 1, $csvData);
			$B->bindParam( 2, $n);
			$B->bindParam( 3, $val);
			$B->execute();		

			}
}
?>
