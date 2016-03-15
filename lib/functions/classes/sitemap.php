<?php

class sitemap{
	
	function register(){
		
		$no['lang'] = TRUE;
		$no['currency'] = TRUE;
		
		if($no[resource::controller()]!=TRUE and content::exists()){
		
			$query = implode('/',$_GET).'/';
			
			$key = sql('SELECT url FROM sitemap WHERE url = "'.$_SERVER['HTTP_HOST'].'" AND query = "'.$query.'" AND language = "'.$_SESSION['language'].'" LIMIT 1');
			
			if(!$key){
	
				$vars['url'] = $_SERVER['HTTP_HOST'];
				$vars['query'] = $query;
				$vars['title'] = $page['title'];
				$vars['language'] = $_SESSION['language'];
				sql_insert('sitemap',$vars);
				
			}
		
		}
		
	}
	
}

?>