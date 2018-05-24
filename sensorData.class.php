<?php
/**
 * Description of sensorData
 *
 * @author dave.ellis
 */
class sensorData extends DB {

	
	public function log($sensorID,$temperature) { 
		
		$this->insert('sensorData' , array(
			'dated' => date('Y-m-d H:i:s'),
			'sensorID' => $sensorID,
			'temperature' => $temperature,
		));
		
	}
	
}
