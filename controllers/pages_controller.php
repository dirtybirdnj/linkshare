<?php

class pagesController extends linkomatic {
	
	function __construct(){
 
		$this->pix = new linkomatic;		 		
		//include_once($this->pix->webroot() . 'models/user.php');
		//$this->User = new User;
		
		$auth = new Auth();
		$this->Auth = $auth->checkSession($_SESSION);
		
	}	
	
	public function home(){
	
		$pix = new linkomatic;
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/pages/home.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
		
		
	}

	
}

?>