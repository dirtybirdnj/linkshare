<?php

class pagesController extends linkomatic {
	
	function __construct(){
 
		$this->pix = new linkomatic;		 		

		//include_once($this->pix->webroot() . 'models/user.php');
		//$this->User = new User;

		include_once($this->pix->webroot() . 'models/link.php');
		$this->Link = new Link;
		
		$auth = new Auth();
		$this->Auth = $auth;
		$this->User = $auth->checkSession($_SESSION);
		$this->Message = $auth->checkMessage();
		
	}	
	
	public function home(){
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		
		krumo($this);
		
		if(count($this->User) == 1){
			
			include_once($this->pix->webroot() . 'views/pages/home.php');
		
		} else {
			
			echo 'show all links';
			
		}
		
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
		
		
	}

	
}

?>