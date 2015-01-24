<?php

class photosController extends pixamatic {
	
	public function index(){
	
		$pix = new pixamatic;
		
		include_once($pix->webroot() . 'layouts/top.php');
		include_once($pix->webroot() . 'views/photos/index.php');
		include_once($pix->webroot() . 'layouts/bottom.php');		
		
		
	}

	public function add(){
	
		$pix = new pixamatic;
		
		if($_POST){
			
			die('uploading a photo!');
			
		}
		
		include_once($pix->webroot() . 'layouts/top.php');
		include_once($pix->webroot() . 'views/photos/add.php');
		include_once($pix->webroot() . 'layouts/bottom.php');		
		
		
	}
	
}


?>