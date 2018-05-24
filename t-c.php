#!/usr/bin/php
<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$Snum = $_GET["Snumber"];
echo $Snum;
$name = $_GET["name"];
$type = $_GET["type"];
if ($type == "TEMPERATURE"){
$type = "temperature";	}

$val = $_GET[$type];

$ID = $PDO->query("SELECT ID FROM templogger.sensors ORDER BY ID DESC LIMIT 1;");
$ID1 = array();
foreach($ID->fetchAll(PDO::FETCH_ASSOC) as $row) {$ID1 = floatval($row['ID']);}
$ID2 = 1 + $ID1;
$addr = "WIFI".$Snum;
$C = "1";
$ch = "wifi";
$vv = "i2c-Discovered";



$BB = $PDO->query("SELECT ID FROM `templogger`.`sensors` WHERE address =\"WIFI1\" ;");
$HH = $BB->fetch();
$JJ = $HH[0];
floatval($JJ);

$ID4 = $Snum + $JJ -1;
echo $ID4;

		$A = $PDO->query("SELECT address FROM templogger.sensors WHERE address =\"".$addr."\";");
		$data = array();
		foreach($A->fetchAll(PDO::FETCH_ASSOC) as $row) { 
			$data = strval($row['address']);
			}

if ($data !== $addr){
			if ($addr == "WIFI1"){
			$SE = $PDO->prepare("INSERT INTO `templogger`.`sensors` 
			(`ID`, address, `active`, `channel`, `type`, `name`, `displayName`)
			VALUES (? ,? ,? ,? ,? ,? ,? );");
			$SE->bindParam( 1, $ID2);
			$SE->bindParam( 2, $addr);
			$SE->bindParam( 3, $C);
			$SE->bindParam( 4, $ch);
			$SE->bindParam( 5, $type);
			$SE->bindParam( 6, $name);
			$SE->bindParam( 7, $vv);
			$SE->execute();}
			else {
			$SE = $PDO->prepare("INSERT INTO `templogger`.`sensors` 
			(`ID`, address, `active`, `channel`, `type`, `name`, `displayName`)
			VALUES (? ,? ,? ,? ,? ,? ,? );");
			$SE->bindParam( 1, $ID4);
			$SE->bindParam( 2, $addr);
			$SE->bindParam( 3, $C);
			$SE->bindParam( 4, $ch);
			$SE->bindParam( 5, $type);
			$SE->bindParam( 6, $name);
			$SE->bindParam( 7, $vv);
			$SE->execute();
			echo $addr;				
			
			}
			}
$AA = $PDO->query("SELECT ID FROM `templogger`.`sensors` WHERE address =\"".$addr."\" ;");
$TT = $AA->fetch();
$YY = $TT[0];
floatval($Y);

echo $YY;

$A = $PDO->query("SELECT active FROM `templogger`.`sensors` WHERE address =\"".$addr."\" ;");
$T = $A->fetch();
$Y = $T[0];
floatval($Y);
echo $Y;
$D = 1;
if ($Y == $D) {
	$csvData = date('Y-m-d H:i:s');
	echo $csvData;
	echo $ID2;
	echo $val;

	$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
	$B = $PDO->prepare("INSERT INTO `templogger`.`sensorData` (`dated`, `sensorID`, `".$type."`) VALUES (? ,? ,?);");
	$B->bindParam( 1, $csvData);
	$B->bindParam( 2, $YY);
	$B->bindParam( 3, $val);

	$B->execute();}

