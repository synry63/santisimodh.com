<?php

class menu{
	
	function li($vars = FALSE){
		
		if(!$vars) $vars = 0;
		
		$menu = sql('SELECT * FROM pages WHERE menu = "1" AND category = "'.$vars.'"');
		
		foreach($menu as $key => $value){
			
			$submenu = sql('SELECT * FROM pages WHERE category = "'.$key.'"');
			
			$return.= '<li>';
			$return.= '<a href="/'.$value['pagesAdresse'].'/">'.lang::ID('name_'.$value['ID'].'_PAGES').'</a>';
			if($submenu) $return.= '<ul>';
			if($submenu) $return.= menu::li($key);
			if($submenu) $return.= '</ul>';
			$return.= '</li>';
			
		}
		
		return $return;
		
	}
	
	function menu($vars){
		
		
		
	}
	
}

?>