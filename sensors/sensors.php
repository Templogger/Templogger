<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");
$A = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=1;');
$B = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=1;');
$C = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=2;');
$D = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=2;');
$E = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=3;');
$F = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=3;');
$G = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=4;');
$H = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=4;');
$I = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=5;');
$J = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=5;');
$K = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=6;');
$L = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=6;');
$M = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=7;');
$N = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=7;');
$O = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=8;');
$P = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=8;');
$Q = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=1 WHERE `ID`=9;');
$R = $PDO->prepare('UPDATE `templogger`.`sensors` SET `active`=0 WHERE `ID`=9;');

if ($_POST['S1']) {
		$A->execute();
		echo "1 on";
} else {
		$B->execute();
		echo "1 off";
};

if ($_POST['S2']) {
		$C->execute();
		echo "2 on";
} else {
		$D->execute();
		echo "2 off";
};

if ($_POST['S3']) {
		$E->execute();
		$cmd = './door.py > /dev/null 2>&1 &';
		shell_exec($cmd);
		echo "3 on";
} else {
		$F->execute();
		
		echo "3 off";
};

if ($_POST['S4']) {
		$G->execute();
		echo "4 on";
} else {
		$H->execute();
		echo "4 off";
};
if ($_POST['S5']) {
		$I->execute();
		echo "5 on";
} else {
		$J->execute();
		echo "5 off";
};

if ($_POST['S6']) {
		$K->execute();
		echo "6 on";
} else {
		$L->execute();
		echo "6 off";
};

if ($_POST['S7']) {
		$M->execute();
		echo "7 on";
} else {
		$N->execute();
		echo "7 off";
};

if ($_POST['S8']) {
		$O->execute();
		echo "8 on";
} else {
		$P->execute();
		echo "8 off";
};
if ($_POST['S8']) {
		$Q->execute();
		echo "9 on";
} else {
		$R->execute();
		echo "9 off";
};
header("Location:../index.html");
die();
?>
