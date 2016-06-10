<?

class auth{
	
	static function type($code,$type){
		
		if(!$code) $code = $_SESSION['user'];
		
		$i = FALSE;
		
		$user = sql('SELECT type FROM users WHERE code = "'.$code.'" LIMIT 1');
		
		if(is_array($type)) {
			
			foreach($type as $key => $value) if(preg_match('/'.$value.'/',$user['type'])) $i = TRUE;
		
		} else {
		
			if(preg_match('/'.$type.'/',$user['type'])) $i = TRUE;
		
		}
		
		return $i;
		
		
	}
	
	static function emailConfirmation($code){
		
		// 1  = ok
		// 10 = deleted account
		
		$auth = users::get($code);
		
		$vars['status'] = 1;
		if($auth && $auth['status'] != 10) users::update($vars,$code);
		
		return $auth;
		
	}
	
	static function addType($value, $code){
		
		if (!$code) $code = $_SESSION['user'];
		
		$user = sql('SELECT type FROM users WHERE code = "' . $code . '" LIMIT 1');

		$i = explode(',', $user['type']);

		$i[] = $value;
		
		$vars['type'] = implode(',', $i);
		
		users::update($vars, $code);
		
	}
	
	static function deleteType($value, $code){
		
		if (!$code) $code = $_SESSION['user'];
		
		$user = sql('SELECT type FROM users WHERE code = "' . $code . '" LIMIT 1');

		$i = explode(',', $user['type']);
		
		$vars['type'] = array_diff($i, $value);
		
		users::update($vars, $code);
		
	}
	
}

?>