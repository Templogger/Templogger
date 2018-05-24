#!/usr/bin/php
<?php

$F = ($_POST['jobn']);
$G = ($_POST['jobd']);
$H = ($_POST['jobl']);
$I = ($_POST['cham']);
$J = ($_POST['ser']);

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$A = $PDO->prepare('UPDATE `templogger`.`jobData` SET `value`=:A WHERE `key`=1;');
$A->bindParam(':A', $F, PDO::PARAM_INT);
$B = $PDO->prepare('UPDATE `templogger`.`jobData` SET `value`=:B WHERE `key`=2;');
$B->bindParam(':B', $G, PDO::PARAM_INT);
$C = $PDO->prepare('UPDATE `templogger`.`jobData` SET `value`=:C WHERE `key`=3;');
$C->bindParam(':C', $H, PDO::PARAM_INT);
$D = $PDO->prepare('UPDATE `templogger`.`jobData` SET `value`=:D WHERE `key`=4;');
$D->bindParam(':D', $I, PDO::PARAM_INT);
$E = $PDO->prepare('UPDATE `templogger`.`jobData` SET `value`=:E WHERE `key`=5;');
$E->bindParam(':E', $J, PDO::PARAM_INT);
$A->execute();
$B->execute();
$C->execute();
$D->execute();
$E->execute();

header("Location:../index.html");
die();

?> 
