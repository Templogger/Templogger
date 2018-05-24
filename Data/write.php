
<?php
$n = 0;

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

while($n <  16 ){
	$n = ($n + 1);
		$Dtype = $PDO->query("SELECT type FROM templogger.sensors 
		WHERE ID = $n ;");
		$type = array();
		foreach($Dtype->fetchAll(PDO::FETCH_ASSOC) as $row4) { 
			$type = strval($row4['type']);
			}						

		if ($type == "TEMPERATURE"){
			$type = "temperature";	}
		$DBdata = $type;

if ($n == 1){$type1 = $type;}
if ($n == 2){$type2 = $type;}
if ($n == 3){$type3 = $type;}
if ($n == 4){$type4 = $type;}
if ($n == 5){$type5 = $type;}
if ($n == 6){$type6 = $type;}
if ($n == 7){$type7 = $type;}
if ($n == 8){$type8 = $type;}
if ($n == 9){$type9 = $type;}
if ($n == 10){$type10 = $type;}
if ($n == 11){$type11 = $type;}
if ($n == 12){$type12 = $type;}
if ($n == 13){$type13 = $type;}
if ($n == 14){$type14 = $type;}
if ($n == 15){$type15 = $type;}

}


$SQL = "SELECT  DATE_FORMAT(dated,\"%Y-%m-%d\") as dates, DATE_FORMAT(dated,\"%H:%i:%s\") as timed,
        (IF(`sensorID` = 1, ".$type1.", \"\")) sensor_1,
        (IF(`sensorID` = 2, ".$type2.", \"\")) sensor_2,
	  	  (IF(`sensorID` = 3, ".$type3.", \"\")) sensor_3,
        (IF(`sensorID` = 4, ".$type4.", \"\")) sensor_4,
        (IF(`sensorID` = 5, ".$type5.", \"\")) sensor_5,
        (IF(`sensorID` = 6, ".$type6.", \"\")) sensor_6,
        (IF(`sensorID` = 7, ".$type7.", \"\")) sensor_7,
        (IF(`sensorID` = 8, ".$type8.", \"\")) sensor_8,
        (IF(`sensorID` = 9, ".$type9.", \"\")) sensor_9,  
        (IF(`sensorID` = 10, ".$type10.", \"\")) sensor_10,
        (IF(`sensorID` = 11, ".$type11.", \"\")) sensor_11,
	  	  (IF(`sensorID` = 12, ".$type12.", \"\")) sensor_12,
        (IF(`sensorID` = 13, ".$type13.", \"\")) sensor_13,
        (IF(`sensorID` = 14, ".$type14.", \"\")) sensor_14,
        (IF(`sensorID` = 15, ".$type15.", \"\")) sensor_15
           
FROM    sensorData
ORDER BY dated INTO OUTFILE '/my/Temperature-data.ods' FIELDS TERMINATED BY ',';"; 
$STMT = $PDO->prepare($SQL);
$STMT->execute();


$SQL = "SELECT * FROM jobData INTO OUTFILE'/my/jd.txt' FIELDS TERMINATED BY ',';";
$STMT = $PDO->prepare($SQL);
$STMT->execute();


shell_exec('cat /my/jd.txt  /my/Temperature-data.ods >> /my/Temperature-data$(date +%Y-%m-%d)');
shell_exec("rm /my/jd.txt"); 
shell_exec("rm /my/Temperature-data.ods");
shell_exec("cp back.sh backup.sh");

sleep(60);
echo ("SAVED");

echo("<a href=\"../index.html\"  
				style=\"text-decoration:underline;\"
				><font color=\"blue\"><big>Main</big></font></a>");
die();
?>