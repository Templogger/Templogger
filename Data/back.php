#!/usr/bin/php

//this will write a file to a usb stick eventualy
 
 <?php
  $cmd = './backup.sh';

  $output = shell_exec($cmd);

  echo "<pre>$output</pre>";
  
?>