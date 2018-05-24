
<?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$ID = $PDO->query("SELECT graph2 FROM templogger.Thresholds WHERE col = 1;");
$ID1 = array();
foreach($ID->fetchAll(PDO::FETCH_ASSOC) as $row) 
{$ID1 = floatval($row['graph2']);}


		$Dtype = $PDO->query("SELECT type FROM templogger.sensors 
		WHERE ID = $ID1 ;");
		$type = array();
		foreach($Dtype->fetchAll(PDO::FETCH_ASSOC) as $row4) { 
			$type = strval($row4['type']);
			}						

		if ($type == "TEMPERATURE"){
			$type = "temperature";	}
		$DBdata = $type;
		
		if ($type == "temperature"){
		$DIS = "&deg;C";}
		if($type == "lux")     {
		$DIS = "lux";   }
		if($type == "humidity"){
		$DIS = "%RH";   }
		if($type == "pressure"){
		$DIS = "bar";   }


$Q = $PDO->query("SELECT 
	UNIX_TIMESTAMP(dated) as dt
	,TRUNCATE($DBdata , 2) AS $DBdata  
FROM sensorData
WHERE sensorID =$ID1
	AND dated > DATE_SUB(NOW(), INTERVAL (SELECT scale FROM Thresholds WHERE col = 1) HOUR)
GROUP BY dated	
;");
$data4 = array();

$i = 0;
foreach($Q->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data4[] =[ (float) $row ['dt']
		,(float) $row[$DBdata]
	];
}
$A = $PDO->query("SELECT $DBdata FROM sensorData WHERE sensorID =$ID1 ORDER BY dated DESC LIMIT 1;");
$data = array();
foreach($A->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data = floatval($row[$DBdata]);
}

$temp = $data;


$W = $PDO->query("SELECT upperThreshold FROM Thresholds WHERE col = $ID1 ;");
$data2 = array();
foreach($W->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data2 = floatval($row['upperThreshold']);
}	
$temp2 = $data2;


$R = $PDO->query("SELECT lowerThreshold FROM Thresholds WHERE col= $ID1 ;");
$data3 = array();
foreach($R->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['lowerThreshold']);
}	
$temp3 = $data3;

$cmd = 'bash -c "exec nohup setsid omxplayer alarm.mp3  > /dev/null 2>&1 &"';

$T = floatval($temp);
$Y = floatval($temp2);
$U = floatval($temp3);
if ($T > $Y) {
		$warn1 = "<font color=\"#FF0000\"<>".exec($cmd);
} else {
		$warn1 = "<font color=\"#00FF00\"<>";
		};
if ($T < $U) {
		$warn1 = "<font color=\"#0000FF\"<>".exec($cmd);
} else {

		};
		

		


		
$I = $PDO->query("SELECT dated , TRUNCATE($DBdata , 2) AS $DBdata 
FROM sensorData
WHERE sensorID =$ID1 AND dated > DATE_SUB(NOW(), INTERVAL 2 MINUTE)
GROUP BY dated	DESC LIMIT 1;");
$data5 = array();

$i = 0;
foreach($I->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data5[] =[
		++$i
		,(float) $row[$DBdata]
	];
}

$var = $data5;
  // to display current temperature on graph as legend I did this
$tem = implode($var[0]); //make last array item data a string 
$str = substr($tem, 1); //cut the y axis number from the result
$temp = array(
	'label' => $warn1.$str."<font color=\"#FF0000\"<small><small>".$DIS."</small></small></font>", // only way I found of making font bigger
	'data' => $data4
);

print json_encode($temp);
