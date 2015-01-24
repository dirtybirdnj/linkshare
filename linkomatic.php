<?php

class linkomatic extends db {

	private static $webroot = '/var/www/links/';
	private static $base_url = 'http://www.matgilbert.com/links/';

/*
	
	//Returns a record set
	private function queryRows($SQL){
		
		$link = $this->dbConnect();
		$clean_sql = $link->real_escape_string($SQL);
		$result = $link->query($clean_sql);
		
		$results = array();
		while ($row = $result->fetch_assoc()){ $results[] = $row; }		
		$this->dbClose($link);
		return $results;		

	}
	
	
	private function queryInsert($SQL){
		
		$link = $this->dbConnect();
		$clean_sql = $link->real_escape_string($SQL);		
		$result = $link->query(stripslashes($clean_sql));
		return $result;			
		
	}
	
*/		
	
	public function webroot(){ return self::$webroot; }

	public function base_url(){ return self::$base_url; }	
	
	public function element($file){ 
		$pix = new linkomatic;
		include(self::$webroot . 'elements/' . $file . '.php'); 
	}
	
	public function script($file,$js_folder = true){ 
		if($js_folder){ $script = '<script type="text/javascript" src="' . self::$base_url . 'js/' . $file . '.js"></script>'; }
		else { $script = '<script type="text/javascript" src="' . self::$base_url . $file . '.js"></script>';  }
		return $script;
	}
	
	public function css($file,$css_folder = true){
		if($css_folder){ $css = '<link href="' . self::$base_url . 'css/' . $file . '.css" rel="stylesheet">'; }
		else { $css = '<link href="' . self::$base_url . $file . '.css" rel="stylesheet">';  }
		return $css;		
	}
	
	public function link($text,$path){ return "<a href=" . self::$base_url . $path . ">$text</a>"; }	

	public function jsonOutput($json,$die = true){
			
		header('Content-Type: text/javascript; charset=utf8');
		header('Access-Control-Allow-Origin: http://www.matgilbert.com/');
		header('Access-Control-Max-Age: 3628800');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');		
		echo json_encode($json);
		
		//If not specified, halt any further execution
		if($die) die();
		
	}
	
	
	
	public function addUser($email,$password){
		
		$hashPass = md5($password);
		$SQL = "INSERT INTO users (email,password) VALUES ('$email','$hashPass');";
		$result = $this->queryInsert($SQL);
		
		return $result;
		
	}
	

}

?>