<?php

class User extends linkomatic {

	public function checkLogin($email,$password){
	
		
		$clean_email = parent::sanitize($email);
	
		$SQL = "SELECT id,email,password FROM users WHERE email = '$clean_email';";
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
	}
	
	public function validPass($password,$hash){
		
		return(md5($password) === $hash ? true : false);
		
	}

}

?>