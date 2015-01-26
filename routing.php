<?php

	$uri = $_SERVER['REQUEST_URI'];
	preg_match('/\/links\/([a-zA-Z0-9]+)/',$uri,$matches);
	
	//A controller/action is detected
	if(!empty($matches)){
	
		$controller = $matches[1];
		$action_str = str_replace('/links/' . $controller . '/','',$uri);
		
		$action_arr = explode('/',$action_str);
		$action = $action_arr[0];
		
		//Custom URLs, mostly to create nice looking action/verb style URLs around the word "link"
		if($controller == 'private'){
			$controller = 'links';
			$action = 'personal';
		}
		
		if($controller == 'browse'){
			$controller = 'links';
			$action = 'browse';
		}
		
		if($controller == 'public'){
			$controller = 'links';
			$action = 'notprivate';
		}		
		if($controller == 'delete'){
			$controller = 'links';
			$action = 'delete';
		}

	} else {
	
	//No controller action detected, send to pages/home
	
		$controller = 'pages';
		$action = 'home';

	}

	//Load the  model
	$model_name = rtrim($controller,'s');
	$model_label = ucfirst($model_name);
	
	//Load the controller
	include_once($pix->webroot() . 'controllers/' . $controller . '_controller.php');		
	$classname = $controller . 'Controller';
	$con = new $classname;

	if($action == '') $action = 'index';
	$con->$action();

	
?>