<?php

// STILL TESTING

class resource {
	
	static function get(){
		
		$resource = new resource();
		
		if($_SESSION['module']) $return['module'] = $resource->module();
		if(resource::access(1))	$return['controller']= $resource->controller();
		if(resource::access(2))	$return['action']		 = $resource->action();
		if(resource::access(3))	$return['variable']	 = $resource->variable();
		
		return $return;
		
	}
	
	static function access($position) {
		
		$key = 'g';
		
		// LOOKING FOR LANGUAGES
		$l = lang::get();
		
		if (array_key_exists($_GET['g1'], $l)){
			
			$position = $position + 1;
			
		}
		
		$get = $key . $position;
		
		$get = $_GET[$get];
		
		return $get;
		
	}
	
	static function module(){
		
		$var = $_SESSION['module'];
		
		return $var;
		
	}
	
	static function controller(){

		$get = resource::access(1);
		
		$var = $get;
		
		return $var;
		
	}
	
	static function action(){
		
		$var = resource::access(2);
		
		return $var;
		
	}
	
	static function variable(){
		
		$var = resource::access(3);
		
		return $var;
		
	}
	
	// check if resourse $_GET[g*]
	static function check($string) {
		
		$return = FALSE;
		
		$array = str_split($string);
		
		if ($array[0] == 'g' && is_numeric($array[1]) && !$array[2]) {
			
			$return = TRUE;
			
		}
		
		return $return;
		
	}
	
	static function url($params = array(), $unset = array()){
		
		$get = $_GET;
		
		$address = '/';
		$uri = '?';
		
		foreach($get as $key => $value) {
			
			if(resource::check($key)) {
				
				if ($params[$key]) $value = $params[$key];
			
				$address.= $value . '/';
				
				unset($params[$key]);
				
			} elseif (!in_array($key, $unset)) {
				
				if ($params[$key]) $value = $params[$key];
				
				$uri.= '&' . $key  . '=' . $value;
				
				unset($params[$key]);
				
			}
			
		}
			
		foreach($params as $key => $value) {

			$uri.= '&' . $key  . '=' . $value;

		}
		
		return $address.$uri;
		
	}
	
}

?>