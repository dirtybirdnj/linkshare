<?php

class usersController extends pixamatic {

	public function index(){
		
		$pix = new pixamatic;
		
		include_once($pix->webroot() . 'layouts/top.php');
		include_once($pix->webroot() . 'views/users/index.php');
		include_once($pix->webroot() . 'layouts/bottom.php');		
			
	}
	
	public function login(){
		
		$pix = new pixamatic;
		var_dump($_POST);
		
		
		
	}
	
	public function logout(){
		
		
		
	}
	
	public function add(){
		
		$pix = new pixamatic;
		
		if($_POST){
		
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$user_exists = $pix->checkLogin($email,$password);
			var_dump($user_exists);
			
			die();
			
			if(!$user_exists){
				
				$user = $pix->addUser($email,$password);
				var_dump($user);
				
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