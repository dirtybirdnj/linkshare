<?php

class pixamatic {

	private static $webroot = '/var/www/pixamatic/';
	private static $base_url = 'http://www.matgilbert.com/pixamatic/';

	private function dbConnect(){
		
		$mysqli = new mysqli("localhost", "root", "e0a355cb", "pixamatic");
		if ($mysqli->connect_errno) { echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error; }	
		return $mysqli;
			
	}
	
	private function dbClose($conn){ $conn->close(); }
	
	//Returns one row
	private function queryRow($SQL){
		
		$link = $this->dbConnect();
		$clean_sql = $link->real_escape_string($SQL);
		
		$result = $link->query($clean_sql);
		
		echo "<pre>query result\n";
		var_dump($clean_sql);
		var_dump($result);
		echo '</pre>';
		
		if($result){

			$return = $result->fetch_assoc();	
			echo "<pre>fetch assoc result\n";
			
			var_dump($return);
			
			echo "</pre>'";
			$this->dbClose($link);
			return $return;
		
		//If no results, return false
		} else { 
		
		echo "\nQuery Failed: $SQL";
		return false; }
					
		
	}
	
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
	
	public function webroot(){ return self::$webroot; }

	public function base_url(){ return self::$base_url; }	
	
	public function element($file){ 
		$pix = new pixamatic;
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

	public function jsonOutput($json){
			
		header('Content-Type: text/javascript; charset=utf8');
		header('Access-Control-Allow-Origin: http://www.example.com/');
		header('Access-Control-Max-Age: 3628800');
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');		
		echo json_encode($json);
		
	}
	
	
	public function checkLogin($email,$password){
	
		$SQL = "SELECT id,email,password FROM users WHERE email = '$email';";
		$user = $this->queryRow($SQL);	
		
		echo '<pre>';
		var_dump($SQL);
		var_dump($user);
		echo '</pre>';
		
		//No user record, return false
		if(!$user){ return false; }
		
		//Else the user exists, check to see if the password is correct
		else {
			
			var_dump($user);
			
		}		
	}
	
	
	public function addUser($email,$password){
		
		$hashPass = md5($password);
		$SQL = "INSERT INTO users (email,password) VALUES ('$email','$hashPass');";
		$result = $this->queryInsert($SQL);
		
		return $result;
		
	}
	

}

?>