<?php

class login {
	
	static function validator($vars, $login = 'email', $password = 'password', $module = 'user', $type = FALSE ,$arrayFieldsFromTable = FALSE, $status = FALSE){
		
		$vars = (!$vars) ? $_POST : $vars ;
//		print_r($vars);
		
		$return = FALSE;
		
		$user = sql('SELECT * FROM users WHERE '.$login.' = "'.$vars[$login].'" AND ' . $password . ' = "'.$vars[$password].'" LIMIT 1');
		
		
		if($status &&  $user['status'] != $status) $user = FALSE;
		
		if($user and auth::type($user['code'], $type)) {
			
			$_SESSION['module'] = $module;
			
			$_SESSION['user'] = $user['code'];
			
			foreach($arrayFieldsFromTable as $k => $v) $_SESSION[$v] = $user[$v];
			
			$return = TRUE;
		
		}
		
		return $return;
	
	}
	
	static function logout($ref = FALSE,$module = FALSE){
		
		session_destroy();
		
		header('Location: /'.$ref);
		
	}
	
}

?>