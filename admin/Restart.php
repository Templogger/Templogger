#!/usr/bin/php

<?php


shell_exec('cp restart.sh re.sh');

header("Location: wait.html");
die();
?>