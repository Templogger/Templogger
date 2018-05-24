 <?php
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");




$G = $_POST['run'];
$A = $PDO->prepare('UPDATE `templogger`.`Thresholds` SET `delay`=:G WHERE `col`=1;');
$A->bindParam(':G', $G, PDO::PARAM_INT);
$A->execute();
header("Location:../index.html");
die();
?>
