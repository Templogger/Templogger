#!/usr/bin/php

<?php

	$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

if ($_POST["S1"]) {

	$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationVal`=:A WHERE `ID`=1;');
	$B->bindParam(':A', $A, PDO::PARAM_INT);
	$cmd = 'digitemp_DS2490  -q -t0 -o"%C"';
	$A = shell_exec($cmd);
	echo $A;
	$B->execute();
	}
	  else {
		echo "1 off";
};

if ($_POST["S2"]) {
	$D = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationVal`=:C WHERE `ID`=2;');
	$D->bindParam(':C', $C, PDO::PARAM_INT);
	$cmd1 = 'digitemp_DS2490  -q -t1 -o"%C"';
	$C = shell_exec($cmd1);
	echo $C;
	$D->execute();
 	}
	  else {
		echo "2 off";
};





$date =date("y:m:d:h:i:sa");


$A = $PDO->query('SELECT referance1 FROM sensors WHERE ID =1 ;');
$data = array();
foreach($A->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data = floatval($row['referance1']);
}
$temp = $data;



$B = $PDO->query('SELECT referance2 FROM sensors WHERE ID =1 ;');
$data2 = array();
foreach($B->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data2 = floatval($row['referance2']);
}
$temp1 = $data2;

if ($_POST['S4']) {
	$ref = $data;
 	}
	  else {
		echo "1 no";
};

if ($_POST['S5']) {
	$ref = $data2;
 	}
	  else {
		echo "2 no";
};

if ($_POST['S6']) {
	$ref = ($data + $data2) /2;
 	}
	  else {
		echo "3 no";
};


$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =1 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}

echo $ref - $data3;
$val1 = $ref - $data3;

if ($_POST['S1']) {
	$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=1;');
	$B->bindParam(':A', $val1, PDO::PARAM_INT);
	$B->execute();
	
	$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=1;');
	$B->bindParam(':date', $date, PDO::PARAM_INT);
	$B->execute();
	 	}
	  else {
		echo "1 off";
};



$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =2 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}



echo $ref - $data3;
$val1 = $ref - $data3;
if ($_POST['S2']) {
	$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=2;');
	$B->bindParam(':A', $val1, PDO::PARAM_INT);
	$B->execute();

	$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=2;');
	$B->bindParam(':date', $date, PDO::PARAM_INT);
	$B->execute();

	 	}
	  else {
		echo "1 off";
};


header("Location: calibrate.html");
die();
?>

