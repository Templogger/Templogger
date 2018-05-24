#!/usr/bin/php

<?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =1 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=1;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=1;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();


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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =2 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=2;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=2;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();


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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =3 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=3;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=3;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();



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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =4 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=4;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=4;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();



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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =5 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=5;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=5;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();

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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =6 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=6;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=6;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();


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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =7 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=7;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=7;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();



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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =8 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=8;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=8;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();


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



$ref = ($data + $data2) /2;

$C = $PDO->query('SELECT calibrationVal FROM sensors WHERE ID =9 ;');
$data3 = array();
foreach($C->fetchAll(PDO::FETCH_ASSOC) as $row) { 
	$data3 = floatval($row['calibrationVal']);
}
$temp2 = $data3;


echo $ref - $data3;
$val1 = $ref - $data3;

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `calibrationOffset`=:A WHERE `ID`=9;');
$B->bindParam(':A', $val1, PDO::PARAM_INT);
$B->execute();

$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `lastCalibrated`=:date WHERE `ID`=9;');
$B->bindParam(':date', $date, PDO::PARAM_INT);
$B->execute();

?>

