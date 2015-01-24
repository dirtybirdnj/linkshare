<?php

	$uri = $_SERVER['REQUEST_URI'];
	preg_match('/\/pixamatic\/([a-zA-Z0-9]+)/',$uri,$matches);
	
	//A controller/action is detected
	if(!empty($matches)){
	
		//die('test');
	
		$controller = $matches[1];
		$action_str = str_replace('/pixamatic/' . $controller . '/','',$uri);
		
		$action_arr = explode('/',$action_str);
		$action = $action_arr[0];

		//Load the controller
		include_once($pix->webroot() . 'controllers/' . $controller . '_controller.php');		
		$classname = $controller . 'Controller';
		$con = new $classname;

		if($action == '') $action = 'index';
		$con->$action();
		
	
	} else {
		
		include_once($pix->webroot() . 'layouts/top.php');
		include_once($pix->webroot() . 'views/pages/home.php');
		include_once($pix->webroot() . 'layouts/bottom.php');
		
	}
	
?>