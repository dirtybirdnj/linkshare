<?php

class Auth extends db {
	
	public $isAuthenticated = false;
	
	public function checkSession($session){
		
		if(!empty($session['User']) && $session['User'] != null){
			
			$isAuthenticated = true;
			return $session['User'];	
			
		} else { $session['User'] = false; }
		
		return $session;
	}
	
	public function isAdmin(){
		
		if($this->isAuthenticated){
			
					
		} else { return false; }
		
	}
	
	public function checkMessage(){
		
		$message = $this->getMessage();
		if($message) return $this->displayAlert($message['type'],$message['message']);
		else return false;
		
	}
	
	public function setMessage($type,$message){
		
		$_SESSION['Alert']['message'] = $message;
		$_SESSION['Alert']['type'] = $type;
		
	}
	
	private function getMessage(){
		
		if(isset($_SESSION['Alert'])){
		
			$return = $_SESSION['Alert'];
			unset($_SESSION['Alert']);
			return $return;
			
		} else { return false; }
		
	}
	
	private function displayAlert($type,$message){
		
		$message = '<div class="alert alert-' . $type  . '" role="alert">' . $message . '</div>';
		return $message;
		
	}
	
}


?>