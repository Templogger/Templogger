<?php

/**
 * Description of digiTemp
 *
 * @author dave.ellis
 */
class digiTemp {
	private $verbose =false;
	
	private $programFile = 'digitemp_DS2490';
	
	const sensorTypeTemperature = 'TEMPERATURE';
	const sensorTypeHumidity = 'HUMIDITY';
	
	private $supportedSensors = array(
		'DS18B20 Temperature Sensor' => self::sensorTypeTemperature
	);
	
	private $configFileName	= '/tmp/digitemp.conf';
	private $logFile		= '/tmp/digitemp.log';
	
//	private $logFormat = '%Y-%m-%d %H:%M:%S Sensor %s %R C: %.5C F: %.5F';
//	private $SWord = 'Sensor';
//	private $SPos = 2;
//	private $APos = 4;
//	private $CPos = 6;
//	private $FPos = 8;
//	private $APos = 1;
//	private $CPos = 3;
//	private $FPos = 7;
//	private $FPos = 9;
	
	private $logFormat = 'SUCCESS %R %.5C %.5F';
	private $SWord = 'SUCCESS';
	private $SPos = 0;
	private $APos = 1;
	private $CPos = 2;
	private $FPos = 3;
	private $BPos = 4;
	private $DPos = 5;
	private $EPos = 6;
	
		
	private $readTime = 1000;
	private $sensors = array();
	
	
	public function __construct($verbose = False) {
		
		$this->verbose = $verbose;
		
	}
	
	
	/**
	 * Get temperature data from configured sensors
	 */
	public function getTemperatureData($degreesC = True) { 
		
		if(!count($this->sensors)) { 
			throw new Exception("No Sensors configured.");
		}

		$hasTempSensor = False;
		foreach($this->sensors as $thisSensor) { 
			if($thisSensor['type'] == self::sensorTypeTemperature) { 
				$hasTempSensor = True;
				break;
			}
		}
		if(!count($this->sensors)) { 
			throw new Exception("No Temperature Sensors configured.");
		}
		
		/**
		 * 1. Write the config file
		 * 2. run the program polling all sensors
		 * 3. parse the output and return an array keyed on sensor address
		 */
		
		$this->writeConf();
		
		list($status,$output) = $this->runBashCommand(
			$this->programFile
				.' -qa'
				." -c {$this->configFileName}"
			,"Polling all temperature sensors"
		);

		if($status == 0) { 
			$tempDataPos = ($degreesC ? $this->CPos : $this->FPos);
			$tempData = array();
			foreach($output as $outputLine) { 
				$data = explode(' ', $outputLine);
				if(isset($data[$this->SPos]) && $data[$this->SPos] == $this->SWord ) { 
					$tempData[$data[$this->APos]] = $data[$tempDataPos];
				} 
			}
			return($tempData);
		} else { 
			throw new Exception(implode("\n", $output));
		}
				
				
		
	}
	
	/**
	 * Set the main Sensors array.
	 * 
	 * @param type $sensors
	 * @throws Exception
	 */
	public function setSensors($sensors = array()) { 
		$tSensors = array();
		foreach($sensors as $thisSensor) { 
			if(!isset($thisSensor['address']) || $thisSensor['address'] == '') { 
				throw new Exception("No Address for sensor");
			}
			if(!isset($thisSensor['name']) || $thisSensor['name'] == '') { 
				throw new Exception("No name for sensor : ");
			}
			if(!isset($thisSensor['type'])) { 
				// Derive the type from the name? 
				if(!isset($this->supportedSensors[$thisSensor['name']])) { 
					throw new Exception("Sensor Not Supported : {$thisSensor['name']}");
				}
				$thisSensor['type'] = $this->supportedSensors[$thisSensor['name']];
			} 
			if($thisSensor['type'] != self::sensorTypeTemperature && $thisSensor != self::sensorTypeHumidity) { 
				throw new Exception("Sensor Type Not Supported : {$thisSensor['type']}");
			}
			$tSensors[] = $thisSensor;
		}
		$this->sensors = $tSensors;
	}

	public function getSensors($setSensors = False) { 
		$sensors = array();
		$devices = $this->getDeviceList();
		foreach($devices as $address => $name) { 
			if(isset($this->supportedSensors[$name])) { 
				$sensorType = $this->supportedSensors[$name];
				$sensors[] = array(
					'address' => $address,
					'name' => $name,
					'type' => $sensorType
				);
			}
		}
		if($setSensors) { 
			$this->setSensors($sensors);
		}
		return($sensors);
	}

	public function getDeviceList() { 
		list($status,$output) = $this->runBashCommand($this->programFile .' -wq','Get Device List...');
		if($status !== 0) { 
			throw new Exception(implode("\n", $output));
		}
		
		$devices = array();
		foreach($output as $thisLine) { 
			if(strpos($thisLine,' : ')) { 
				list($macAddress,$deviceName) = explode(':', $thisLine);
				$devices[trim($macAddress)] = trim($deviceName);
			}
		}
		return($devices);
	}
	

	
	public function writeConf($fileName = '') { 
		
		if(!$fileName) { 
			$fileName = $this->configFileName;
		}
		
		$confFile = <<<EOF
TTY USB
READ_TIME {$this->readTime}
LOG_TYPE 0
LOG_FORMAT "{$this->logFormat}"
EOF;

//CNT_FORMAT "%Y-%m-%d %H:%M:%S Sensor %s %R #%n %C"
//HUM_FORMAT "%Y-%m-%d %H:%M:%S Sensor %s %R C: %.5C F: %.5F H: %h%%"


		if(count($this->sensors)) { 
			$senseCount = count($this->sensors);
			$confFile.= "\n";
			$confFile.= "SENSORS {$senseCount}\n";
			foreach($this->sensors as $romNum => $thisSensor) { 
				$confFile.= "ROM {$romNum}";
				foreach(str_split($thisSensor['address'], 2) as $tHex) { 
					$confFile.= " 0x{$tHex}";
				}
				$confFile.= "\n";
			}
		}
		file_put_contents($fileName, $confFile);

	}


	/**
	 * This function runs an external command with exec() and logs the output... 
	 * 
	 * @param string $cmd The Command to run through exec()
	 * @param type $cmdDesc A human readable description to inject into the log file
	 * @param type $logFile The Log file to append to... 
	 * @return type array('returnStatus' => 0|1|2  , 'output' => 'Output from the Command' )
	 */
	function runBashCommand($cmd,$cmdDesc = '',$logFile = '') { 
		$cmdOutput = array();
		$returnStatus = 0;

		if($this->verbose) { 
			print PHP_EOL . "[RUNNING] {$cmdDesc}" . PHP_EOL . $cmd . PHP_EOL;
		}

		if($logFile) { 
			file_put_contents(
				$logFile,
					PHP_EOL. str_repeat('*', strlen($cmdDesc)). 
					PHP_EOL .$cmdDesc . 
					PHP_EOL .str_repeat('*', strlen($cmdDesc)).
					PHP_EOL
			, FILE_APPEND);
		}

		exec("{$cmd} 2>&1", $cmdOutput , $returnStatus);

		if($this->verbose) { 
			print PHP_EOL . implode("\n", $cmdOutput);
		}

		if($logFile) { 
			file_put_contents(
				$logFile,
				implode("\n", $cmdOutput) . PHP_EOL.str_repeat('=', strlen($cmdDesc)).PHP_EOL
			,FILE_APPEND);
		}
		return(array(
			$returnStatus,
			$cmdOutput
		));
	}	
	
	
}
