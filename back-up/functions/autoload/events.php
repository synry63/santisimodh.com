<?php

class events{
	
	function get($ID){
		
		if($ID){
			
			$i = sql('SELECT *,
								DATE_FORMAT(date, "%H:%i") as time,
								DATE_FORMAT(date, "%d") as day,
								DATE_FORMAT(date, "%m") as month,
								DATE_FORMAT(date, "%Y") as year,
								DATE_FORMAT(date, "%H") as hour,
								DATE_FORMAT(date, "%i") as minute
							 	FROM events WHERE ID = "'.$ID.'" LIMIT 1');
								
			foreach(sql('SELECT * FROM bikers2events WHERE event = "'.$ID.'" AND status = "0"') as $key => $value) $i['apliers'][$value['ID']] = $value['code'];
			
			foreach(sql('SELECT * FROM bikers2events WHERE event = "'.$ID.'" AND category = "" AND status = "1"') as $key => $value) $i['no-category'][$key] = $value['code'];
								
			foreach(categories::get() as $key => $value) {
			
				foreach(sql('SELECT * FROM bikers2events WHERE event = "'.$ID.'" AND category = "'.$key.'" AND status = "1"') as $k => $v) {
					
					$i['category'][$key][$v['ID']]['code'] 		 = $v['code'];
					$i['category'][$key][$v['ID']]['result'] 	 = $v['result'];
					$i['category'][$key][$v['ID']]['category'] = $v['category'];
				
				}
			
			}
			
		} else {
			
			$i = sql('SELECT *,
								DATE_FORMAT(date, "%H:%i") as time,
								DATE_FORMAT(date, "%d") as day,
								DATE_FORMAT(date, "%m") as month,
								DATE_FORMAT(date, "%Y") as year,
								DATE_FORMAT(date, "%H") as hour FROM events');
		
		}
		
		return $i;
		
	}
	
	function bikers($ID){
		
		$i = sql('SELECT *, a.id as id
							FROM bikers2events a, users b
							WHERE a.code = b.code
							AND a.event = "'.$ID.'"
							AND a.status = "1"
							ORDER BY a.result ASC');
		
		return $i;
		
	}
	
	function appliers($ID){
		
		$i = sql('SELECT *, a.id as id
							FROM bikers2events a, users b
							WHERE a.code = b.code
							AND a.event = "'.$ID.'"
							AND a.status = "0"');
		
		return $i;
		
	}
	
	function Next(){
		
		$i = sql('SELECT *,
							DATE_FORMAT(date, "%H:%i") as time,
							DATE_FORMAT(date, "%d") as day,
							DATE_FORMAT(date, "%m") as month,
							DATE_FORMAT(date, "%Y") as year,
							DATE_FORMAT(date, "%H") as hour FROM events ORDER BY date DESC LIMIT 1');
		
		return $i;
		
	}
	
	function userIsAllowed($event, $ID){
		
		if(!$ID) $ID = $_SESSION['user'];
		
		$i = TRUE;
		
		
		// ALREADY ON THE LIST
		if(sql('SELECT * FROM bikers2events WHERE code = "'.$ID.'" AND event = "'.$event.'" LIMIT 1')) $i = FALSE ;
		
		return $i;
		
	}
	
	function addUser($ID,$event){
		
		$return = FALSE;
		
		if(!$ID) $ID = $_SESSION['user'];
		
		$i = sql('SELECT * FROM bikers2events WHERE code = "'.$ID.'" AND event = "'.$event.'" LIMIT 1');
		
		$u = users::get($ID);
		
		$vars['code'] = $ID;
		$vars['category'] = $u['category'];
		$vars['event'] = $event;
		$vars['status'] = 0;
		
		if(!$i) sql_insert('bikers2events',$vars);
		if(!$i) $return = TRUE;
		
		return $return;
		
	}
	
	function acceptUser($ID){
		
		$vars['ID'] = $ID;
		$vars['status'] = '1';
		
		$u = sql('SELECT * FROM bikers2events WHERE ID = "'.$ID.'" LIMIT 1');
		
		users::add2type($u['code'],'rider');
		
		sql_update('bikers2events',$vars);
		
	}
	
	function deleteUser($ID){
		
		sql('DELETE FROM bikers2events WHERE ID = "'.$ID.'" LIMIT 1');
		
	}
	
}

?>