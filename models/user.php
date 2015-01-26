<?php

class User extends linkomatic {

	public function checkLogin($email,$password){
	
		
		$clean_email = parent::sanitize($email);
	
		$SQL = "SELECT id,email,password,admin FROM users WHERE email = '$clean_email';";
		$user = parent::queryRow($SQL);	
	
		//No user record, return false
		if(!$user){ return $return = array('status' => 'fail', 'message' => 'Invalid user'); }
		
		//Else the user exists, check to see if the password is correct
		else {
		
			//echo "IS A VALID USER \n\n";
			
			$passIsValid = $this->validPass($password,$user['password']);
			
			if($passIsValid){
			 
			 //Don't need to pass this back
			 unset($user['password']);
			 
			 return $return = array('status' => 'ok', 'data' => $user); 
			 
			 } else { return $return = array('status' => 'fail', 'message' => 'Invalid password');	}
			
		}
		
		
		parent::dbClose();		
	}
	
	public function addUser($email,$password){
		
		$hashPass = md5($password);
		$clean_email = parent::sanitize($email);
		$user_exists = $this->checkLogin($email,$password);
		
		if($user_exists['status'] == 'fail' && $user_exists['message'] == 'Invalid user'){
		
			$SQL = "INSERT INTO users (email,password,admin) VALUES (\"$clean_email\",\"$hashPass\",0);";
			$result = parent::queryInsert($SQL);
			
			if($result){ $return = $this->checkLogin($email,$password); } 
			else { $return = array('status' => 'fail', 'message' => 'Error creating user');} 
		
		} else  { 
		
			if($user_exists['status'] == 'ok'){
				
				$return = array('status' => 'fail', 'message' => 'Error user already exists');
				
			} else {
			
				var_dump($user_exists);
				die('your conditionals are bad and you should feel bad'); 
				
			}
		
		}
		
		return $return;
		
	}	
	
	public function validPass($password,$hash){
		
		return(md5($password) === $hash ? true : false);
		
	}

}

?>