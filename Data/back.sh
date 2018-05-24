#!/bin/sh
./write.php
./write2.php
./write3.php

sudo mount --rw /dev/sda1 /mnt/usb

mv /my/Temperature-data$(date +%Y-%m-%d) /mnt/usb
mv /my/Calibrationdata.txt /mnt/usb/Calibrationdata$(date +%Y-%m-%d).txt
sudo rm /home/pi/Tempreture-logger/Data/backup.sh




