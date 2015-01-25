<?php

class db {

	function __construct(){
		
		if(!isset($this->link)){
		
			$mysqli = new mysqli("localhost", "root", "e0a355cb", "linkomatic");
			if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }	
			$this->link = $mysqli;

		}
		
	}
	
	public function sanitize($string){ return $this->link->real_escape_string($string); }
	
	//Returns one row
	public function queryRow($SQL){
				
		$result = $this->link->query($SQL);
		if($result){ $return = $result->fetch_assoc(); } else { $return = false; }
		return $return;		
	}
	
	//Returns a record set
	public function queryRows($SQL){
		
		$result = $this->link->query($SQL);
		
		if($result){
		
			$results = array();
			while ($row = $result->fetch_assoc()){ $results[] = $row; }		

		} else { $results = array(); }

		return $results;		

	}
	
	public function queryInsert($SQL){
		
		$result = $this->link->query($SQL);
		return $result;			
		
	}
	
	public function dbClose(){
		
		unset($this->link);
	}			


}

?>