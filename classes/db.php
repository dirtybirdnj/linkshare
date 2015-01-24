<?php

class db {

	function __construct(){
		
		$mysqli = new mysqli("localhost", "root", "e0a355cb", "linkomatic");
		if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }	
		$this->link = $mysqli;
		
	}
	
	/*
	function __destruct(){
		
		$this->link->close();
		
	}*/
	
	public function sanitize($string){ return $this->link->real_escape_string($string); }
	
	//Returns one row
	public function queryRow($SQL){
				
		$result = $this->link->query($SQL);
		if($result){ $return = $result->fetch_assoc(); } else { $return = false; }
					
		$this->link->close();
		return $return;		
	}	


}

?>