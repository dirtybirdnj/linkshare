<?php

	$uri = $_SERVER['REQUEST_URI'];
	preg_match('/\/links\/([a-zA-Z0-9]+)/',$uri,$matches);
	
	//A controller/action is detected
	if(!empty($matches)){
	
		$controller = $matches[1];
		$action_str = str_replace('/links/' . $controller . '/','',$uri);
		
		$action_arr = explode('/',$action_str);
		$action = $action_arr[0];

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
		
	
	/*
	else {
		
		include_once($pix->webroot() . 'layouts/top.php');
		include_once($pix->webroot() . 'views/pages/home.php');
		include_once($pix->webroot() . 'layouts/bottom.php');
		
	}*/
	
?>