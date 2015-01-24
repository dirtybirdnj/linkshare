<?php

class Auth {
	
	public $isAuthenticated = false;
	
	public function checkSession($session){
		
		if(!empty($session) && $session != null){
			
			$isAuthenticated = true;
			return $session['User'];	
			
		} else { return false; }
		
	}
	
}


?>