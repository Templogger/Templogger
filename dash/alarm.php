#!/usr/bin/php
<?php
$cmd = 'bash -c "exec nohup setsid omxplayer alarm.mp3  > /dev/null 2>&1 &"';
$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$A = $PDO->query('SELECT delay FROM templogger.Thresholds;');
$B = $A->fetch();
$C = $B[0];
floatval($C);
echo $C;


sleep($C);

exec($cmd);