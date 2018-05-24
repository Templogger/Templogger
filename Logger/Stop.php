 
<?php
  $cmd = 'crontab -l && echo "#none" | crontab -';
  $csvData = date('Y-m-d H:i:s');
  $d = "log-stops";
  $output = shell_exec($cmd);
  $PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");  
  $B = $PDO->prepare("INSERT INTO `templogger`.`sensorData` (`dated`, `logger`) VALUES (? ,? );");
  $B->bindParam( 1, $csvData);
  $B->bindParam( 2, $d);
  $B->execute();	

if ($_POST['stop']) {

		echo "$output";

	
} else {

		echo "nope";
};

header("Location:../index.html");
die();
?>