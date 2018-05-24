#!/usr/bin/php
<?php

/**
 * Ok , so some ideas... 
 * 
 * CONFIGURATION : 
 * 
 * Store the config somewhere...  (MySQL DB?) 
 *		- Emulated here with a simple array
 * 
 * Out of the box, with no config stored, can we perform some kind of "auto setup"  ?
 * Is there a way we can extract the 'MAC' addresses of all the connected sensors
 *		- Yes - running the ->getSensors method will now return all supported sensors
 * 
 * Can we poll just individual sensors? 
 *		- Yes - just setup 1 sensor in the setSensors method and it works :) 
 * 
 */

require 'digiTemp.class.php';
require 'DB.class.php';
require 'sensorData.class.php';
require 'sensorConfig.class.php';

$PDO = new PDO("mysql:host=localhost;dbname=templogger","dataLogger","changeMe");

$sensors = new digiTemp(False);
$config = new sensorConfig($PDO);
$data = new sensorData($PDO);

$localConfig = $config->get();

if(!count($localConfig)) { 

	/**
	 * Auto-Detect connected sensors
	 */
	
	$detected = $sensors->getSensors();
	foreach($detected as $thisSensor) { 
		$config->add($thisSensor);
	}
}

$localConfig = $config->get();


if(!count($localConfig)) { 
	die("No Active Sensors");
}

$sensors->setSensors($localConfig);

//$stored = array(
//	['address' => '28FF4463A01603F4' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FF44E38C160302' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FF5C25A0160582' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FFA2E68C1603C5' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FF8AE78C16038C' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FF51E38C1603AC' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FF77E08C160340' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FFAF24A01605E5' , 'name' => 'DS18B20 Temperature Sensor'],
////	['address' => '28FF7FE58C1603FF' , 'name' => 'DS18B20 Temperature Sensor'],
//);
//$sensors->setSensors($stored);


$temperatureData = $sensors->getTemperatureData();
foreach($temperatureData as $address => $temperature) { 
	$data->log($localConfig[$address]['ID'],$temperature);
}
shell_exec("/home/pi/Tempreture-logger/i2cSensors.php");
#shell_exec("/home/pi/Tempreture-logger/thermo.php");

