 
<?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$G = $_POST['SC1'];
$A = $PDO->prepare('UPDATE `templogger`.`Thresholds` SET `scale`=:G WHERE `col`=1;');
$A->bindParam(':G', $G, PDO::PARAM_INT);

$A->execute();
header("Location:ajax.html");
die();
?>