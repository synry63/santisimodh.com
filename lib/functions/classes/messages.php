<?php

class messages{
	
	public $limit = 'LIMIT 010';
	public $select = 'a.ID, a.title, a.to_status,
							  b.name, b.`last-name`, b.image, SUBSTR(a.text, 1, 55) as preview,
							  DATE_FORMAT(a.date,"%d.%m.%Y %H:%i:%s") as date,
							  a.ID as ide';
	public $from = 'messages a, users b ';
	
	static $staticlimit = 'LIMIT 010';
	static $staticselect = 'a.ID, a.title, a.to_status,
							  b.name, b.`last-name`, b.image, SUBSTR(a.text, 1, 55) as preview,
							  DATE_FORMAT(a.date,"%d.%m.%Y %H:%i:%s") as date,
							  a.ID as ide';
	static $staticfrom = 'messages a, users b ';
	
	public function get($ID){
		
		// clean table to reduce resources
		sql('DELETE FROM messages WHERE from_status="0" AND to_status="0"');
		sql('DELETE FROM messages WHERE fromID = "" or toID = ""');
		
		$ID = ($ID) ? $ID : $_SESSION['user'] ;
		
		$messages = sql('SELECT ' . $this->select . '
								 		 FROM ' . $this->from . '
								 		 WHERE a.toID LIKE "%'.$_SESSION['user'].'%"
								 		 AND a.to_status!="0"
								 		 AND a.fromID = b.code
								 		 ORDER BY a.date DESC '.$this->limit );
		
		return $messages;
		
	}
	
	public function sent(){
		
		$messages = sql('SELECT *, DATE_FORMAT(date,"%d.%m.%Y %H:%i:%s") as fec
								 FROM messages
								 WHERE fromID = "'.$_SESSION['user'].'"
								 AND from_status != "0"
								 ORDER BY date DESC' );
								 
		return $messages;
		
	}
	
	static function getNew($user){
		
		$user = ($user) ? $user : $_SESSION['user'] ;

		$messages = sql('SELECT ' . self::$staticselect . '
								 		 FROM ' . self::$staticfrom . '
										 WHERE a.fromID = b.code AND a.toID LIKE "%'.$user.'%" AND a.to_status = ""');
		
		return $messages;
		
	}
	
	static function countNew($user){
		
		$user = ($user) ? $user : $_SESSION['user'] ;
		
		if (self::getNew($user)){
		
			return count(self::getNew($user));
	
		} else {
			
			return 0;
			
		}
	}
	
	static function read($ID){
		
		$user = $_SESSION['user'];
		
		$i 	= sql('SELECT * FROM messages
												WHERE ID="' . $ID . '"
												AND (toID LIKE "%' . $user . '%"
												OR fromID LIKE "%' . $user . '%")
												LIMIT 1');
													
		$i['from'] = users::get($i['fromID']);
		
		foreach(explode(',', $i['toID']) as $key => $value) $i['to'][$value] = users::get($value);
		
		return $i;
		
	}
	
	static function update($number, $status = 'to_status', $ID){
		
		// 0 = deleted
		// 1 = reded
		//   = not readed
		
		
		$vars[$status]	= $number;
		$vars['ID']			= ($ID) ? $ID : resource::variable();
		
		sql_update('messages',$vars);
	
	}
	
	static function userList ($user, $time = FALSE, $limit) {
		
		$user = ($user) ? $user : $_SESSION['user'] ;
		
		if ($time && is_array($time)) {
			
			$time = 'AND date < "' . date('Y-m-d H:i:s',time() - $time['start']) . '" AND date >= "' . date('Y-m-d H:i:s',time() - $time['end']) . '"' ;
			
		} elseif ($time) {
		
			$time = 'AND date >= "' . date('Y-m-d H:i:s',time() - $time) . '"' ;
		
		}
		
		$limit = ($limit) ? $limit : 2000 ;
		
		// OR toID LIKE "%' . $user . '%" 
		
		$i = sql('SELECT fromID, date, toID, to_status
							FROM (SELECT fromID, date, toID, to_status
										FROM messages
										WHERE (( fromID = "' . $user . '" AND from_status != "0")
										OR		( toID LIKE "%' . $user . '%" AND to_status != "0"))
										' . $time . '
										ORDER BY date ASC) as xxx
							LIMIT ' . $limit);
		
//		print_r($i);
		
		foreach ($i as $value) {
			
			// GET USERS THAT WROTE
			if ($value['fromID']) $return[$value['fromID']] = $value['date'];
			
			// GET STATUS NEW
			
//			echo $value['fromID'];
//			echo $value['to_status'];
//			die;
			
			if ($value['fromID'] != $user && $value['to_status'] === '') {

				$status['new'][$value['fromID']]++;
			
			}
			
			// SAVE DATA
			if ($value['fromID']) $data[$value['fromID']] = array('date' => $value['date'], 'new' => $status['new'][$value['fromID']]);
			
			// REPLACE WITH USERS THAT YOU WROTE
			if ($value['toID'] && !preg_match(',', $value['toID'])) {
				
				$return[$value['toID']] = $value['date'];
				
				$data[$value['toID']]		= array('date' => $value['date']);
				
			}
		
		}
		
		unset($return[$_SESSION['user']]);
		
		arsort($return);
		
		foreach ($return as $key => $value) {
			
			$return[$key] = $data[$key];
			
		}
		
		return $return;
		
	}
	
	static function conversation ($from, $to) {
		
		$incoming	= sql('SELECT * FROM messages WHERE fromID = "' . $to . '" AND toID LIKE "%' . $from . '%" AND to_status != "0"');
		$outgoing = sql('SELECT * FROM messages WHERE fromID = "' . $from . '" AND toID LIKE "%' . $to . '%" AND from_status != "0"');
		
		foreach ($outgoing as $value) $merge[$value['ID']] = $value;
		foreach ($incoming as $value) $merge[$value['ID']] = $value;
		
//		$merge = array_merge($from, $to);
		
		ksort($merge);
		
		return $merge;
		
	}
	
	static function add ($vars) {
		
		if (!$vars['fromID']) $vars['fromID'] = $_SESSION['user'];
		
		$i = sql_insert('messages', $vars);
		
		return $i;
		
	}
	
	static function check ($ID, $from, $to) {
		
		$messages = sql('SELECT * FROM messages WHERE fromID = "' . $from . '" AND toID = "' . $to . '" AND ID > "' . $ID . '" AND to_status != "0" AND to_status != "1"');
		
		return $messages;
		
	}
	
	static function delete($ID, $user) {
		
		$message = sql('SELECT ID, fromID, toID FROM messages WHERE ID = "' . $ID . '" LIMIT 1');
		
//		print_r($message);
		
		if ($message['fromID'] == $user) {
			
			sql_update('messages', array('from_status' => 0, 'ID' => $message['ID']));
			
		} elseif($message['toID'] == $user) {
			
			sql_update('messages', array('to_status' => 0, 'ID' => $message['ID']));
			
		}
		
	}

	
}

?>