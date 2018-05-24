#!/usr/bin/php
<?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$A = ($_POST["sensor"]);
$S = ($_POST["offset"]);
$D = date("y:m:d:h:i:sa");
echo $A;
echo $S;

if ($A == "1") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"1\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}

if ($A == "2") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"2\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "3") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"3\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "4") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"4\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "5") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"5\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "6") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"6\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "7") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"7\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "8") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"8\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "9") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"9\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "10") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"10\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "11") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"11\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "12") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"12\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "13") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"13\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "14") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"14\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
if ($A == "15") {

	$B = $PDO->prepare("UPDATE `templogger`.`sensors` SET `calibrationOffset`=:S , `lastCalibrated`=:D  WHERE `ID`=\"15\";");
   $B->bindParam(':D', $D, PDO::PARAM_INT);
   $B->bindParam(':S', $S, PDO::PARAM_INT);
	$B->execute();

	echo "set";

}
header("Location: calibrate.html");
die();
?>
 
