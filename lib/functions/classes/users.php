<?php

class users extends main{
	
	static $table = 'users';
	static $onlineTime = 300;
	
	function ID($ID){
		
		if(!$ID) $ID = users::code2ID($_SESSION['user']);
		
		$user = sql('SELECT * FROM users WHERE ID = "'.$ID.'" LIMIT 1');
		
		return $user;
		
	}
	
	function get($code = FALSE){
		
		if(!$code) $code = $_SESSION['user'];
		
		$user = sql('SELECT *, DATE_FORMAT(birthday, "%m") as month, DATE_FORMAT(birthday, "%d") as day , DATE_FORMAT(birthday, "%Y") as year FROM users WHERE code = "'.$code.'" LIMIT 1');
		
		return $user;
		
	}
	
	// TESTS IF USERS WITH EMAIL EXISTS
	function email($email = FALSE){
		
		$user = sql('SELECT *, DATE_FORMAT(birthday, "%m") as month, DATE_FORMAT(birthday, "%d") as day , DATE_FORMAT(birthday, "%Y") as year FROM users WHERE code = "'.$email.'" LIMIT 1');
		
		return $user;
		
	}
	
	function add($vars = FALSE){
		
		$return = FALSE;
		
		if(!$vars) $vars = $_POST;
		if (!$vars['password']) $vars['password'] = rand(10000, 99999);
		$vars['code'] = md5($vars['email']);
		
		$i = sql_insert('users', $vars);
		
		return $i;
			
	}
	
	function delete($code){
		
		$tables = sql('SHOW tables');
		
		foreach ($tables as $key => $value) {
			
			foreach($value as $model) {
			
				sql('DELETE FROM ' . $model . ' WHERE code = "' . $code . '"');
				
			}
		
		}
		
	}
	
	static function update($vars,$code){
		
		if(!$vars) $vars = $_POST;
		
		$vars['code'] = ($code) ? $code : $_SESSION['user'];
		if($_POST['year'] && $_POST['month'] && $_POST['day']) $vars['birthday'] = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		
		sql_update('users',$vars,'code');
		
	}
	
	function password($vars,$ID){
		
		if(!$vars) $vars = $_POST;
		
		$success = FALSE;
		
		if($vars['password'] == users::column('password') && ($vars['new-password'] == $vars['re-password'])) {
			
			$_POST['password'] = $vars['new-password'];
			
			return $vars['new-password'];
		
		}
		
	}
	
	function column($name, $user){
		
		if(!$user) $user = $_SESSION['user'];
		$data = sql('SELECT '.$name.' FROM users WHERE code = "'.$user.'" LIMIT 1');
		
		return $data[$name];
		
	}
	
	static function ID2code($ID){
		
		$code = sql('SELECT code FROM users WHERE ID = "'.$ID.'" LIMIT 1');
		
		return $code['code'];
		
	}
	
	function code2ID($code){
		
		$code = sql('SELECT ID FROM users WHERE code = "'.$code.'" LIMIT 1');
		
		return $code['ID'];
		
	}
	
	function delete_image($code){
		
		$code = ($code) ? $code : $_SESSION['user'];
		
		$i = sql('SELECT image FROM users WHERE code = "'.$code.'"');
		
		$vars['code'] = $code;
		$vars['image'] = '';
		sql_update('users',$vars,'code');
		unlink('images/users/'.$i['image']);
		
		return ($i) ? TRUE : FALSE ;
		
	}
	
		function add_image($code,$size = 600){
		
		$vars['code'] = ($code) ? $code : $_SESSION['user'];
		$vars['image'] = image::upload($_FILES['image'],'images/users',$size);
		sql_update('users',$vars,'code');
		
		return ($i) ? TRUE : FALSE ;
		
	}
	
	function add2type($ID,$type){
		
		$i = sql('SELECT type FROM users WHERE code = "'.$ID.'" LIMIT 1');
		$t = explode(',',$i['type']);
		
		foreach($t as $key) $p[$key] = $key;
		
		$p[$type] = $type;
		
		$vars['type'] = implode(',',$p);
		$vars['code'] = $ID;
		
		sql_update('users',$vars,'code');
		
	}
	
	function search($string, $limit){
		
		$limit = ($limit) ? ' LIMIT ' . $limit : FALSE ;
		$user = ($_SESSION['user']) ? ' AND code != "' . $_SESSION['user'] . '"' : FALSE ;
		
		$i = sql('SELECT * FROM users
							WHERE (`name` LIKE "%' . $string . '%"
							OR `last-name` LIKE "%' . $string . '%"
							OR `email` LIKE "%' . $string . '%"
							OR concat(`name`," ",`last-name`) LIKE "%'.$string.'%"
							OR concat(`last-name`," ",`name`) LIKE "%'.$string.'%")
							' . $user . '
							' . $limit . '
							');
		
		return $i;
		
	}
	
	function passwordRecovery(){
		
		return sql('SELECT `name`, `last-name`, `code`, `email`, `password`, `city` FROM users WHERE email = "'.$_POST['email'].'" LIMIT 1');
		
	}
	
	static function register($vars){
		
		$vars = (!$vars) ? $_POST : $vars ;
		
		$register = FALSE;
		
		if(sql('SELECT email FROM users WHERE email = "'.$vars['email'].'" LIMIT 1')) $register['email'] = 'email';
		if($vars['password2'] && $vars['password'] != $vars['password2']) $register['password'] = 'password';
		if (!$vars['password']) $vars['password'] = rand(10000, 99999);
		
		// $register has to be FALSE (no error)
		
		if(!$register) users::add($vars);
		
		return $register;
		
	}
	
	static function lastVisit(){
		
		if ($_SESSION['user']) {
		
			sql_update('users',array('code' => $_SESSION['user'], 'last-visit' => date('Y-m-d H:i:s')), 'code');
		
		}
		
	}
	
	static function online($seconds = 300){
		
		$time = time() - $seconds;
		
		$i = sql('SELECT * FROM ' . self::$table . ' WHERE `last-visit` >= "' . date('Y-m-d H:i:s', $time) . ' " AND code != "' . $_SESSION['user'] . '" ORDER BY `last-visit` ASC');
		
		return $i;
		
	}
	
	static function isOnline($user){
		
		$time = time() - self::$onlineTime;
		
		$user = ($user) ? $user : $_SESSION['user'] ;
		
		$i = sql('SELECT ID FROM ' . self::$table . ' WHERE `last-visit` >= "' . date('Y-m-d H:i:s', $time) . ' " AND code = "' . $user . '" LIMIT 1');
		
		users::lastVisit();
		
		return $i;
		
	}
	
}

?>