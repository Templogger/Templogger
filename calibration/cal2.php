<?php
  $cmd = 'digitemp_DS2490  -q -t0 -o"%C"';

 $A = shell_exec($cmd);

 echo $A;
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `referance2`=:A WHERE `ID`=1;');
$B->bindParam(':A', $A, PDO::PARAM_INT);
$B->execute();

header("Location: calibrate.html");
die();
?>