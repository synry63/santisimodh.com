<?

class config {
	
	
	static function ID($key){
		
		$get = sql('SELECT value FROM config WHERE k = "'.$key.'" LIMIT 1');
		
		if(!$get) {
			
			sql_insert('config', array('k' => $key));
			
		}
		
		return $get['value'];
		
	}
	
	function write($key,$value){
		
		$vars['k'] = $key;
		$vars['value'] = $value;
		
		$get = config::ID($key);
		if(!$get) sql_insert('config',$vars);
		
		sql_update('config',$vars,'k');
		
		return $get['value'];
		
	}
	
}

?>