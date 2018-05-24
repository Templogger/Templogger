
 
 <?php

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$SQL = "SELECT ID, active, address, type, name, displayName, lastCalibrated, calibrationOffset FROM templogger.sensors 
INTO OUTFILE '/my/Calibrationdata.txt'FIELDS TERMINATED BY ',';";
$STMT = $PDO->prepare($SQL);

$STMT->execute();

shell_exec("cp /home/pi/Tempreture-logger/Data/back.sh /home/pi/Tempreture-logger/Data/backup.sh");
sleep(60);
echo ("SAVED");

echo("<a href=\"../index.html\"  
				style=\"text-decoration:underline;\"
				><font color=\"blue\"><big>Main</big></font></a>");
die();
?>