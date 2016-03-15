<?php

class blog {
	
	function get($parent){
			
		$i = sql('SELECT * FROM blog WHERE parent = "' . $parent . '"');
		foreach ($i as $key => $value) {
			$user = users::get($value['code']);
			$i[$key]['user'] = $user['name'] . ' ' . $user['last-name'];
			$i[$key]['country'] = $user['country'];
		}
		
		return $i;
		
	}
	
	static function categories($parent){
		
		$query = sql('SELECT * FROM blog_categories WHERE parent = "' . $parent . '"');
		
		return $query;
		
	}
	
	static function category($ID){

		$query = sql('SELECT * FROM blog_categories WHERE ID = "' . $ID . '" LIMIT 1');

		return $query;
		
	}
	
}

?>