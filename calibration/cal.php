#!/usr/bin/php

<?php
    $PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
if ($_POST['R1']) {

 	 $cmd = 'digitemp_DS2490  -q -t0 -o"%C"';

 	 $A = shell_exec($cmd);

 	 echo $A;
    $B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `referance1`=:A WHERE `ID`=1;');
    $B->bindParam(':A', $A, PDO::PARAM_INT);
    $B->execute();
	 }
	  else {
		echo "1 off";
};

if ($_POST['R2']) {
  $cmd = 'digitemp_DS2490  -q -t0 -o"%C"';

  $A = shell_exec($cmd);

  echo $A;
  $B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `referance2`=:A WHERE `ID`=1;');
  $B->bindParam(':A', $A, PDO::PARAM_INT);
  $B->execute();
} 
	else {
	  echo "1 off";
};
 
header("Location: calibrate.html");
die();
?>

