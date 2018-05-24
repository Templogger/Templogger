
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

		$l = $PDO->query("SELECT $type FROM sensorData WHERE sensorID = $n ORDER BY dated DESC LIMIT 1;");
		$va = array();
		foreach($l->fetchAll(PDO::FETCH_ASSOC) as $row) { 
			$va = floatval($row[$type]);
		}
		$W = $PDO->query('SELECT upperThreshold FROM Thresholds LIMIT 1;');
		$data2 = array();
		foreach($W->fetchAll(PDO::FETCH_ASSOC) as $row) { 
		$data2 = floatval($row['upperThreshold']);
		}	
		$temp2 = $data2;


		$R = $PDO->query('SELECT lowerThreshold FROM Thresholds LIMIT 1;');
		$data3 = array();
		foreach($R->fetchAll(PDO::FETCH_ASSOC) as $row) { 
		$data3 = floatval($row['lowerThreshold']);
		}	
		$temp3 = $data3;



	$Y = floatval($temp2);
	$U = floatval($temp3);
	if ($va > $Y) {
			$warn1 = "<p><font color=\"#FF0000\"<big>";
	} else {
			$warn1 = "<p><font color=\"#00CB31\"<big>";
			};
	if ($va < $U) {
			$warn1 = "<p><font color=\"#0000FF\"<big>";
	} else {

			};
			$val = $warn1.$va; 
		if ($type == "temperature"){
		$DIS = "&deg;C";}
		if($type == "lux")     {
		$DIS = "lux";   }
		if($type == "humidity"){
		$DIS = "%RH";   }
		if($type == "pressure"){
		$DIS = "bar";   }

			$ACT = $PDO->query("SELECT active FROM `templogger`.`sensors` WHERE ID = $n ;");
			$T = $ACT->fetch();
			$Y = $T[0];
			floatval($Y);
			$D = 1;


				if ($n == 1){
					if ($Y == $D){
							$S1 = $val;
							$T1 = $DIS;	}
							$S2 = "0";$S3 = "0";$S4 = "0";
							$S5 = "0";$S6 = "0";$S7 = "0";$S8 = "0";
							$S9 = "0";$S10 = "0";$S11 = "0"; $S12 = "0";
							$S13 = "0"; $S14 = "0"; $S15 = "0";         
							$T2 = "ff";$T3 = "ff";$T4 = "ff";
							$T5 = "ff";$T6 = "ff";$T7 = "ff";$T8 = "ff";
							$T9 = "ff";$T10 = "ff";$T11 = "ff";$T12 = "ff";$T13 = "ff";$T14 = "ff";$T15 = "ff";}
								
				if ($n == 2){
					if ($Y == $D){
							$S2 = $val;
							$T2 = $DIS;	}
								}
								
				if ($n == 3){
					if ($Y == $D){
							$S3 = $val;
							$T3 = $DIS;	}
								}
								
				if ($n == 4){
					if ($Y == $D){
							$S4 = $val;
							$T4 = $DIS;	}
								}
								
				if ($n == 5){
					if ($Y == $D){
							$S5 = $val;
							$T5 = $DIS;	}
					
								}								
				if ($n == 6){
					if ($Y == $D){
							$S6 = $val;
							$T6 = $DIS;	}
								}
							
				if ($n == 7){
					if ($Y == $D){
							$S7 = $val;
							$T7 = $DIS;	}
								}
				if ($n == 8){
					if ($Y == $D){
							$S8 = $val;
							$T8 = $DIS;	}
								}
				if ($n == 9){
					if ($Y == $D){
							$S9 = $val;
							$T9 = $DIS;	}
								}
				if ($n == 10){
					if ($Y == $D){
							$S10 = $val;
							$T10 = $DIS;	}
								}
				if ($n == 11){
					if ($Y == $D){
							$S11 = $val;
							$T11 = $DIS;	}
									}
				if ($n == 12){
					if ($Y == $D){
							$S12 = $val;
							$T12 = $DIS;	}
								}
				if ($n == 13){
					if ($Y == $D){
							$S13 = $val;
							$T13 = $DIS;	}

								}
				if ($n == 14){
					if ($Y == $D){
							$S14 = $val;
							$T14 = $DIS;	}
								}
				if ($n == 15){
					if ($Y == $D){
							$S15 = $val;
							$T15 = $DIS;	}
								}	
}




               
$temp = array(
	'label' => $S1.$T1."<br>".$S2.$T2."&nbsp;".$S3.$T3."<br>".$S4.$T4."&nbsp;".$S5.$T5."<br>".$S6.$T6."&nbsp;".
	$S7.$T7."<br>".$S8.$T8."&nbsp;".$S9.$T9."<br>".$S10.$T10."&nbsp;".$S11.$T11."<br>".$S12.$T12."&nbsp;".
	$S13.$T13."<br>".$S14.$T14."&nbsp;".$S15.$T15, 
	'data' => $data4
);

print json_encode($temp);

?>
