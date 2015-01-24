<?php

//include_once('../models/user.php');

class usersController extends linkomatic {

	function __construct(){
 
		$this->pix = new linkomatic;		 		
		include_once($this->pix->webroot() . 'models/user.php');
		$this->User = new User;
		
		$auth = new Auth();
		$this->Auth = $auth->checkSession($_SESSION);
		
	}

	public function index(){
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/users/index.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
			
	}
	
	public function home(){
	
		var_dump($this->Auth);
	
		if($this->Auth == false){
			
			//var_dump($this->pix->base_url());
			
			header('Location : ' . $this->pix->base_url());
			
		}
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/users/home.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
			
	}	
	
	public function login(){
		
		$email = $_POST['email'];
		$password = $_POST['password'];		
		$user_exists = $this->User->checkLogin($email,$password);
		
		if($user_exists['status'] == 'ok'){ $_SESSION['User'] = $user_exists['data']; }
		else unset($_SESSION['User']);
		
		$this->pix->jsonOutput($user_exists);
		
	}
	
	public function logout(){
		
		unset($_SESSION['User']);
		header('Location: ' . $this->pix->base_url());
		
		
	}
	
	public function add(){
		
		$pix = new linkomatic;
		
		if($_POST){
		
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$user_exists = $pix->checkLogin($email,$password);
			
			
			if(!$user_exists){
				
				$user = $pix->addUser($email,$password);
				redirect($pix->base_url() . 'users/home');
				
				
			} else {
				
				$response['status'] = 'fail';
				$response['message'] = 'User already exists';
				$pix->jsonOutput($response);				
				
			}
			
			
		} else {
			
			$response['status'] = 'fail';
			$response['message'] = 'Request was not post';
			$pix->jsonOutput($response);
			
		}
		
	}

}


?>