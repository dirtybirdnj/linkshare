<?php

class Link extends linkomatic {

	public function getLinks($user_id = false){
		
		if($user_id){
			
			
			
			
		} else {
			
			$SQL = "SELECT l.id,l.user_id,u.email,l.created,l.url FROM links l JOIN users u ON u.id = l.user_id WHERE private = 0;";			
			$links = parent::queryRows($SQL);
			return $links;
			
		}
		
	}
	
	public function addLink($user_id,$url,$private){
		
		$id = intval($user_id);
		$date = date("Y-m-d H:i:s");
		$private = intval($private);
		
		
		//TODO: URL VALIDATION
		
		$SQL = "INSERT INTO links (user_id,created,url,private) VALUES ($id,'$date','$url','$private');";
		$result = parent::queryInsert($SQL);
		
		return $result;
		
		
	}
	
	public function delete($link_id){
		
		
		
	}

}

?>