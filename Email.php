#!/usr/bin/php
<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$n = 0;
$Q = $PDO->query('SELECT dated , TRUNCATE(temperature, 2) AS \'temperature\' 
FROM sensorData
WHERE sensorID =1 AND dated > DATE_SUB(NOW(), INTERVAL 2 MINUTE)
GROUP BY dated	DESC LIMIT 1;');
$data4 = array();

$i = 0;
foreach($Q->fetchAll(PDO::FETCH_ASSOC) as $row) { 
$data4[] =[ ++$i ,(float) $row['temperature']];}

$ID = $PDO->query("SELECT ID FROM templogger.sensors ORDER BY ID DESC LIMIT 1;");
$ID1 = array();
foreach($ID->fetchAll(PDO::FETCH_ASSOC) as $row) {$ID1 = strval($row['ID']);}

while ($n < $ID1) {
	$n = ($n + 1);
				
		$A = $PDO->query("SELECT name FROM templogger.sensors WHERE ID = $n ;");
		$data = array();
		foreach($A->fetchAll(PDO::FETCH_ASSOC) as $row1) { 
			$data = strval($row1['name']);
			}

		$F = $PDO->query("SELECT active FROM templogger.sensors 
		WHERE ID = $n ;");
		$dataF = array();
		foreach($F->fetchAll(PDO::FETCH_ASSOC) as $row2) { 
			$dataF = floatval($row2['active']);
			}

		$CH = $PDO->query("SELECT channel FROM templogger.sensors 
		WHERE ID = $n ;");
		$dataCH = array();
		foreach($CH->fetchAll(PDO::FETCH_ASSOC) as $row3) { 
			$dataCH = floatval($row3['channel']);
			}
			
		$Dtype = $PDO->query("SELECT type FROM templogger.sensors 
		WHERE ID = $n ;");
		$type = array();
		foreach($Dtype->fetchAll(PDO::FETCH_ASSOC) as $row4) { 
			$type = strval($row4['type']);
			}						

		if ($type == "TEMPERATURE"){
			$type = "temperature";	}
		$DBdata = $type;

		$l = $PDO->query("SELECT dated, TRUNCATE($type , 2) AS $type FROM sensorData WHERE sensorID = $n ORDER BY dated DESC LIMIT 1;");
		$va = array();
		foreach($l->fetchAll(PDO::FETCH_ASSOC) as $row) { 
			$va = floatval($row[$type]);
		}
		$W = $PDO->query("SELECT upperThreshold FROM Thresholds WHERE `col` = $n ;");
		$data2 = array();
		foreach($W->fetchAll(PDO::FETCH_ASSOC) as $row) { 
		$data2 = floatval($row['upperThreshold']);
		}	
		$temp2 = $data2;


		$R = $PDO->query("SELECT lowerThreshold FROM Thresholds WHERE `col` = $n ;");
		$data3 = array();
		foreach($R->fetchAll(PDO::FETCH_ASSOC) as $row) { 
		$data3 = floatval($row['lowerThreshold']);
		}	
		$temp3 = $data3;

		$EM = $PDO->query("SELECT email FROM Thresholds WHERE `col` = 1 ;");
		$email = array();
		foreach($EM->fetchAll(PDO::FETCH_ASSOC) as $row) { 
		$email = strval($row['email']);
		}	
		$email = $email;






   $cmd = " echo \"Sensor $n Over temp\" | mail -s \"Pi-logger\" $email";
   $cmd1 = " echo \"Sensor $n under temp\" | mail -s \"Pi-logger\" $email";

	$Y = floatval($temp2);
	$U = floatval($temp3);
	if ($va > $Y) {
			$warn1 = "<font color=\"#FF0000\"<big>".shell_exec($cmd);
	} else {
			$warn1 = "<font color=\"#00CB31\"<big>";
			};
	if ($va < $U) {
			$warn1 = "<font color=\"#0000FF\"<big>".shell_exec($cmd1);
	} else {

			};
}

?>
