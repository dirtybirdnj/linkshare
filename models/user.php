<?php

class User extends linkomatic {

	public function checkLogin($email,$password){
	
		
		$clean_email = parent::sanitize($email);
	
		$SQL = "SELECT id,email,password,admin FROM users WHERE email = '$clean_email';";
		$user = parent::queryRow($SQL);	
	
		//No user record, return false
		if(!$user){ $return = array('status' => 'fail', 'message' => 'Invalid user'); }
		
		//Else the user exists, check to see if the password is correct
		else {
			
			$passIsValid = $this->validPass($password,$user['password']);
			
			if($passIsValid){
			 
			 //Don't need to pass this back
			 unset($user['password']);
			 
			 return $return = array('status' => 'ok', 'data' => $user); 
			 
			 } else { $return = array('status' => 'fail', 'message' => 'Invalid password');	}
			
		}
		
		
		parent::dbClose();		
	}
	
	public function addUser($email,$password){
		
		$hashPass = md5($password);
		$clean_email = parent::sanitize($email);

		echo "\nclean email: $clean_email\n";
		
		$SQL = "INSERT INTO users (email,password) VALUES ('$clean_email','$hashPass');";
		
		echo "\n$SQL\n";
		
		$result = parent::queryInsert($SQL);
		
		var_dump($result);
		
		
		return $result;
		
	}	
	
	public function validPass($password,$hash){
		
		return(md5($password) === $hash ? true : false);
		
	}

}

?>