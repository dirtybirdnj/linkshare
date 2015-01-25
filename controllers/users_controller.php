<?php

class usersController extends linkomatic {

	function __construct(){
 
		$this->pix = new linkomatic;		 		

		//To Deal with the fact that we have the user object and the user class
		include_once($this->pix->webroot() . 'models/user.php');
		$this->User = new User;

		include_once($this->pix->webroot() . 'models/link.php');
		$this->Link = new Link;
		
		$auth = new Auth();
		$this->Auth = $auth;
		$this->Session = $auth->checkSession($_SESSION);
		$this->Message = $auth->checkMessage();
				
	}	


	public function index(){

		if($this->Session['admin'] === '0'){
			
			$this->Auth->setMessage('danger','You must be an admin to view user information.');												
			$this->pix->redirect('');
		}
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/users/index.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
			
	}
	
	public function home(){
	

		if($this->Auth == false){
			
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
				
		if($user_exists['status'] == 'ok'){ 
			$this->Auth->isAuthenticated = true;
			$_SESSION['User'] = $user_exists['data']; }
		else unset($_SESSION['User']);
		
		$this->pix->jsonOutput($user_exists);
		
	}
	
	public function logout(){
		
		unset($_SESSION['User']);		
		header('Location: ' . $this->pix->base_url());
		
	}
	
	public function add(){
		
		if($_POST){
		
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			//$user_exists = $this->User->checkLogin($email,$password);
			$user_exists = false;
			
			if(!$user_exists){
				
				$user = $this->User->addUser($email,$password);
				
				$this->Auth->setMessage('success','You created an account! Now you can start submitting links.');	
				$response['status'] = 'ok';
				$this->pix->jsonOutput($response);
					
			} else {
				
				$response['status'] = 'fail';
				$response['message'] = 'User already exists';
				$this->pix->jsonOutput($response);				
				
			}
			
		} else {
			
						
			$this->Auth->setMessage('warning','Something went wrong! Sorry about that, please try again.');												
			$this->pix->redirect('');
			
			
			
		}
		
	}

}


?>