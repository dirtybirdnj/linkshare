<?php

class Link extends linkomatic {

	public function getLinks($user_id = false,$private = false){
		
		
		if($user_id){
			
			$id = intval($user_id);
			$SQL = "SELECT l.id,l.created,l.url FROM links l WHERE l.user_id = $id";

			if(is_int($private)) $SQL .= " AND private = $private";
			
			$SQL .= ';';

			$links = parent::queryRows($SQL);
			return $links;			
			
		} else {
			
			$SQL = "SELECT l.id,l.user_id,u.email,l.created,l.url,l.private FROM links l JOIN users u ON u.id = l.user_id WHERE private = 0";			
			$links = parent::queryRows($SQL);
			return $links;
			
		}
		
	}
	
	public function addLink($user_id,$url,$private){
		
		$id = intval($user_id);
		$date = date("Y-m-d H:i:s");
		$private = intval($private);
		
		
		//TODO: URL VALIDATION
		
		$SQL = "INSERT INTO links (user_id,created,url,private) VALUES ($id,'$date','$url',$private);";
		
		//krumo($SQL);
		//die();
		
		$result = parent::queryInsert($SQL);
		
		return $result;
		
		
	}
	
	public function delete($user_id,$link_id){
		
		
		$SQL = "SELECT user_id FROM links WHERE id = $link_id;";
		
		$row = parent::queryRow($SQL);
		
		if($row['user_id'] == $user_id){
			
			$SQL = "DELETE FROM links WHERE id = $link_id LIMIT 1;";
			$result = parent::queryInsert($SQL);
						
		} 
		
		//Non-admins are not allowed to delete posts
		else { $return = array('status' => 'fail', 'message' => 'User Access Fail'); }
		
		return $return;
		
		
		
	}

}

?>