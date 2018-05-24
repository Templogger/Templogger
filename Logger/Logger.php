#!/usr/bin/php

<?php
  $cmd = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/job6.php';
  $cmd1 = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/job5.php';
  $cmd2 = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/job4.php';
  $cmd3 = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/job3.php';
  $cmd4 = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/job2.php';
  $cmd5 = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/job1.php';
  $cmd6 = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/jobhalf.php';
  $cmd7 = 'cp /home/pi/Tempreture-logger/testScript.php /home/pi/Tempreture-logger/job.php';
  $cmd8 = 'rm /home/pi/Tempreture-logger/job6.php';
  $cmd9 = 'rm /home/pi/Tempreture-logger/job5.php';
  $cmd10 = 'rm /home/pi/Tempreture-logger/job4.php';
  $cmd11 = 'rm /home/pi/Tempreture-logger/job3.php';
  $cmd12 = 'rm /home/pi/Tempreture-logger/job2.php';
  $cmd13 = 'rm /home/pi/Tempreture-logger/job1.php';
  $cmd14 = 'rm /home/pi/Tempreture-logger/jobhalf.php';
  $cmd15 = 'rm /home/pi/Tempreture-logger/job.php';

if ($_POST['l1'] == 'on') {

		shell_exec($cmd);
} else {

		shell_exec($cmd8);
}

if ($_POST['l2'] =='on'){

		shell_exec($cmd1);
} else {

 		shell_exec($cmd9);
}

if ($_POST['l3'] == 'on') {

		shell_exec($cmd2);
} else {
 		shell_exec($cmd10);

}

if ($_POST['l4'] == 'on') {

		shell_exec($cmd3);
} else {
 		shell_exec($cmd11);

}

if ($_POST['l5'] =='on') {

		shell_exec($cmd4);
} else {

 		shell_exec($cmd12);
}

if ($_POST['l6'] =='on') {

		shell_exec($cmd5);
} else {

 		shell_exec($cmd13);
}

if ($_POST['l7'] == 'on') {

		shell_exec($cmd6);
} else {
 		shell_exec($cmd14);

}

if ($_POST['l8'] =='on') {

		shell_exec($cmd7);
} else {

 		shell_exec($cmd15);
};
header("Location:../index.html");
die();
?>



								