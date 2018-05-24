<?php

/**
 * Description of DB
 *
 * @author dave.ellis
 */
class DB {

	/**
	 * @var PDO 
	 */
	
	

	public function __construct($PDO) {
		$this->__PDO = $PDO;
	}
	
	public function quoteBackTick($string) { 
	    return "`".str_replace("`","``",$string)."`";
	}


	/**
	 * Simple insert into table
	 * @param type $tableName The table to update
	 * @param type $data The data to insert
	 * @param type $onDuplicateKeyUpdate The fields and values to update on duplicate key found
	 * @return mixed (False on Failure)
	 */
	public function insert($tableName='',$data=array(),$onDuplicateKeyUpdate=array()) { 
		if($tableName && is_array($data) && count($data)) { 
			
			$fields = '';
			$values = '';
			$bind = array();
			foreach($data as $field => $value) { 
				$fields.= $this->quoteBackTick($field) .',';
				if($value === 'NOW()') { 
					$values.= "NOW(),";
				} else { 
					$values.= ":{$field},";
					if ($value === TRUE || $value === FALSE ){
						$value = ($value ? 1 : 0); // stop mysql mistreated boolean sets
					}
					$bind[":{$field}"] = $value;
				}
			}
			
			$onDupKey = '';
			
			if(count($onDuplicateKeyUpdate)) { 
				foreach($onDuplicateKeyUpdate as $field => $value) { 
					if(empty($onDupKey)) { 
						$onDupKey.= ' ON DUPLICATE KEY UPDATE ';
					} else { 
						$onDupKey.= ',';
					}
					$onDupKey .= $this->quoteBackTick($field);
					$onDupKey .= ' = ';
					if($value === 'NOW()') { 
						$onDupKey.= "NOW()";
					} else { 
						$tDK = ":onDupe_{$field}";
						$onDupKey.= $tDK;
						$bind[$tDK] = $value;
					}
				}
			}
			
			
			if(strlen($fields) && strlen($values)) { 
				$fields = substr($fields, 0 , -1);
				$values = substr($values, 0 , -1);
				$InsertQuery = "INSERT INTO " . $this->quoteBackTick($tableName) . " ({$fields}) VALUES ({$values}) {$onDupKey};";
//				print $InsertQuery;
//				print_r($bind);
				
				$Q = $this->__PDO->prepare($InsertQuery);
				$Result = $Q->execute($bind);
				if($Result) { 
					return($this->__PDO->lastInsertId());
				}
			}
		}
		Return(False);
	}		
	
	
	
}
