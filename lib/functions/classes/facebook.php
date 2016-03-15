<?php

class facebook extends functions_facebook_adapter{
	
	static $instance = NULL;
	
	static function auth(){
		
		$auth = FALSE;
		
		if(config::ID('facebook_app_id') && config::ID('facebook_app_secret')) $auth = TRUE;
		
		return $auth;
		
	}
	
	static function factory(){
		
		$config = array(
			'appId'	=> config::ID('facebook_app_id'),
			'secret'=> config::ID('facebook_app_secret'),
			'cookie'=> TRUE,
		);

		self::$instance = new _Facebook($config);

		return self::$instance;

		
	}
	
	static function loginUrl($redirect_uri, $scope){
		
		$redirect_uri = ($redirect_uri) ? 'http://' . $_SERVER['HTTP_HOST'] . $redirect_uri : FALSE ;
		$scope = ($scope) ? $scope : config::ID('facebook_app_scope');
		$scope = ($scope) ? $scope : 'read_stream, friends_likes, email';
		
		$params = array(
			'scope'				=> $scope,
			'redirect_uri'=> $redirect_uri,
		);

		if(self::auth()) return self::factory()->getLoginUrl($params);
		
	}
	
	static function LoginButton($text, $redirect_uri, $scope){
		
		if (self::auth())$button = '<a class="facebook" href="' . self::loginUrl($redirect_uri, $scope) . '" >' . $text . '</a>';
		
		return $button;
		
	}
	
	static public function user($user = 'me'){
		
		return self::factory()->api('/' . $user);
		
	}
	
	static function login($module, $scope = FALSE, $type = FALSE , $arrayFieldsFromTable = FALSE){
		
		if(self::factory()->getUser()){
		
			$user = self::user();
			
			$fb_login = sql('SELECT email, password FROM users WHERE email = "' . $user['email'] . '" AND status = "1" LIMIT 1');

			if($fb_login) {

				login::validator($fb_login, 'email', 'password', $module, $type, $arrayFieldsFromTable, 1);

			} else {

				$vars['facebook']		= $user['id'];
				$vars['name']				= $user['first_name'];
				$vars['last-name']	= $user['last_name'];
				$vars['gender']			= $user['gender'];
				$vars['email']			= $user['email'];
				$vars['status']			= 1;
				$vars['language']		= substr($user['locale'], 0, 2);

				copy('https://graph.facebook.com/' . $user['id'] . '/picture?type=large', 'images/users' . $user['id'] . '.jpg');

				users::add($vars);
				
				if (TRUE) {
				
					$fb_login = sql('SELECT email, password FROM users WHERE email = "' . $user['email'] . '" AND status = "1" LIMIT 1');
					
					login::validator($fb_login, 'email', 'password', $module, $type, $arrayFieldsFromTable, 1);
					
				}

			}
			
		} else {
				
				header('Location: ' . self::loginUrl(FALSE, $scope));
				
		}
		
	}
	
	
	
}


?>