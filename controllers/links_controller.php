<?php

class linksController extends linkomatic {
	
	function __construct(){
 
		$this->pix = new linkomatic;		 		

		include_once($this->pix->webroot() . 'models/link.php');
		$this->Link = new Link;
		
		$auth = new Auth();
		$this->Auth = $auth;
		$this->User = $auth->checkSession($_SESSION);
		$this->Message = $auth->checkMessage();
		
	}	
	
	
	//Might be able to remove this now that root / is session aware
	public function browse(){
	
		$pix = new linkomatic;
		
		$links = $this->Link->getLinks();
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/links/index.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
		
		
	}
	
	//Personal not private because private is a reserved word
	public function personal(){
				
		$pix = new linkomatic;
				
		//User ID, Email, isAdmin		
		if(count($this->User) != 3){

			$this->Auth->setMessage('danger','You must be signed in to view private links.');												
			$this->pix->redirect('');
			
		}		
		
		$links = $this->Link->getLinks();
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/links/personal.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');			
		
		
	}

	public function add(){
	
		$pix = new linkomatic;
		
		//User ID, Email, isAdmin
		if(count($this->User) != 3){

			$this->Auth->setMessage('danger','You need to sign up before you can submit links. Duhurrr');												
			$this->pix->redirect('');
			
		}
		
		
		if(isset($_POST['url'])){		
			
			//User ID, Email, isAdmin
			if(count($this->User) === 3){
	
			
				$id = $this->User['id'];
				$url = $_POST['url'];
				
				$private = (isset($_POST['private']) ? 1 : 0);
				
				$result = $this->Link->addLink($id,$url,$private);
				
				if($result){
				
					$this->Auth->setMessage('success','Your new link was successfully added!');
					$this->pix->redirect('private');
					
				} else {

					$this->Auth->setMessage('danger','Something went wrong, please try again.');					
					$this->pix->redirect('links/add');
				}
			
			} else {

				$this->Auth->setMessage('danger','You need to sign up before you can submit links.');									
				$this->pix->redirect('');
				
			}
			
		}
		
		include_once($pix->webroot() . 'layouts/top.php');
		include_once($pix->webroot() . 'views/links/add.php');
		include_once($pix->webroot() . 'layouts/bottom.php');		
		
		
	}
	
}


?>