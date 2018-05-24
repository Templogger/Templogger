<?php
/**
 * Description of sensorConfig
 *
 * @author dave.ellis
 */
class sensorConfig extends DB {

	
	private $data = array();
	
	
	public function get($active=true) { 
		
		if(count($this->data)) { 
			return($this->data);
		}
		
		$Query = "SELECT * FROM sensors";
		
		if($active) { 
			$Query.= ' WHERE stype =1 AND active =1' ;
		}
		
		$Q = $this->__PDO->query($Query);
		$result = $Q->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) { 
			$this->data[$row['address']] = $row;
		}
		return($this->data);
	}
	
	public function add($sensor) { 
		if(!isset($this->data[$sensor['address']])) { 
			if(!isset($sensor['active'])) { 
				$sensor['active'] = 1;
			}
			if(!isset($sensor['displayName'])) { 
				$sensor['displayName'] = 'Auto-Discovered';
			}
			if(isset($sensor['ID'])) { 
				unset($sensor['ID']);
			}
			$insertID = $this->insert('sensors',$sensor);
			$this->data[$sensor['address']] = $sensor;
			$this->data[$sensor['address']]['ID'] = $insertID;
		}
	}
	
	
	
}
