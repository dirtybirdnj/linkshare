<?php

class linksController extends linkomatic {
	
	function __construct(){
 
		$this->pix = new linkomatic;		 		
		include_once($this->pix->webroot() . 'models/user.php');
		$this->User = new User;
		
		$auth = new Auth();
		$this->Auth = $auth->checkSession($_SESSION);
		
	}	
	
	public function index(){
	
		$pix = new linkomatic;
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/links/index.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
		
		
	}

	public function add(){
	
		$pix = new linkomatic;
		
		if($_POST){
			
			die('adding a link!');
			
		}
		
		include_once($pix->webroot() . 'layouts/top.php');
		include_once($pix->webroot() . 'views/links/add.php');
		include_once($pix->webroot() . 'layouts/bottom.php');		
		
		
	}
	
}


?>