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
		
		$links = $this->Link->getLinks();
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/links/index.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');		
		
		
	}
	
	//Personal not private because private is a reserved word
	public function personal(){

		//User ID, Email, isAdmin		
		if(count($this->User) != 3){

			$this->Auth->setMessage('danger','You must be signed in to view private links.');												
			$this->pix->redirect('');
			
		}		
		
		$links = $this->Link->getLinks($this->User['id'],1);
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/links/personal.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');			
		
		
	}
	
	//PUBLIC is also a reserved word. duh. Route for this is /public
	public function notprivate(){
				
		//User ID, Email, isAdmin		
		if(count($this->User) != 3){

			$this->Auth->setMessage('danger','You must be signed in to view private links.');												
			$this->pix->redirect('');
			
		}		
		
		$links = $this->Link->getLinks($this->User['id'],0);
		
		include_once($this->pix->webroot() . 'layouts/top.php');
		include_once($this->pix->webroot() . 'views/links/public.php');
		include_once($this->pix->webroot() . 'layouts/bottom.php');				
		
		
	}

	public function add(){
		
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
					
					if($private == 1) $this->pix->redirect('private');
					else $this->pix->redirect('public');
					
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
		
		
	} //end add
	
	public function delete(){
		
		if(!empty($_POST)){
			
			$link_id = intval($_POST['id']);
			$user_id = intval($this->User['id']);
			
			$result = $this->Link->delete($user_id,$link_id);
			
			if($result['status'] == 'fail'){
				
				$this->Auth->setMessage('danger','Something went wrong, please try again.');					
				$this->pix->redirect('');	
				
			} else {

				$this->Auth->setMessage('success','You deleted a link. It\'s gone forever.');					
				$this->pix->redirect('browse');					
				
			}
			

			
		} else {
			
			$this->Auth->setMessage('danger','Something went wrong, please try again.');					
			$this->pix->redirect('');			
			
		}
		
	}
	
}


?>