<?php

class content extends resource {
	
	// array with relationships between modules
	static $controllers = array();
	
	function modules($var = FALSE){
		
		$modules[$_SESSION['module']] = $_SESSION['module'];
		$modules['default'] 					= 'pages';
		$modules['admin'] 						= '/lib/admin';
		
		return ($var) ? $modules[$var] : $modules;
		
	}

	static function page($module = FALSE){
		
		global $root;
		
		$resource = new resource;
		$resource->module();
		$resource->controller();
		
		$controller = resource::controller();
		
		if($_SESSION['user']) $user = users::get();
	
		$module = content::modules($_SESSION['module']);
		//echo $module;
		
		// SEE IF NOT 404
		
		$exists = content::exists();
		
		// SELECT INDEX / HOME
		
		if(!$controller){
			
			$file 		= (file_exists($module.'/home.php')) ? $module.'/home.php' : 'pages/home.php' ;
			$sql_home = sql('SELECT * FROM pages WHERE home = "1" LIMIT 1');
			$content 	= ($sql_home) ? sql('SELECT '.$_SESSION['language'].' FROM lang WHERE langID="'.$sql_home['ID'].'_PAGES" LIMIT 1') : NULL ;
			$content	= $content[$_SESSION['language']];
		
		}
		
		// LOAD CONTENT FROM DB
		
		if($controller && $exists){
			
			$page		 = sql('SELECT ID FROM pages WHERE pagesAdresse = "' . $controller . '" LIMIT 1');
			$virtual = sql('SELECT '.$_SESSION['language'].' FROM lang WHERE langID = "'.$page['ID'].'_PAGES" LIMIT 1');
			$content = $virtual[$_SESSION['language']];
		
		}
			
		// check if there is a relationship with other module and change $module
		$relations = content::$controllers;

		if (array_key_exists($controller, $relations)) {
			
			$module = $relations[$controller];
			
			$exists = content::exists($module);
		
		}
		
		// $FILE WILL BE REPLACE BY PAGE
		
		if($controller and $exists){

			if (layout::isAjax() && file_exists($module.'/'.resource::controller().'/index-ajax.php')) {
				
				$file = $module.'/'.resource::controller().'/index-ajax.php';
			
			} elseif(file_exists($module.'/'.resource::controller().'/index.php')){
				
				$file = $module.'/'.resource::controller().'/index.php';
			
			} elseif (file_exists($module.'/'.resource::controller().'.php')){
			
				$file = $module.'/'.resource::controller().'.php';
			
			}
			
		}
		
		// PRINT ALL
		
		if($exists) {
		
			$div = (!$controller) ? 'home' : $controller ;
			
			if (!layout::isAjax()) echo '<div class="'.$div.'">';
			
			echo ($content) ? $content : NULL ;
			
			include ($file) ? $file : NULL;
			
			include ($controller == 'admin') ? $root . '/templates/login.php' : NULL ;
			
			if (!layout::isAjax()) echo '</div>';
		
		} else {
			
			include $module.'/404.php';
			
		}
		
	}
	
	function admin(){
		
		global $root;
		
		$page = (!resource::controller()) ? 'home' : resource::controller();
		
		if(file_exists($root.'/admin/'.$page.'/index.php')){
		
			if(file_exists($root.'/admin/'.$page.'/navigation.php')){
				
				echo '<div class="navigation">';
				include $root.'/admin/'.$page.'/navigation.php';
				echo '</div>';
				echo '<style>div.body{margin-left:205px;}</style>';
				
			}
			
			echo '<div class="body">';
			
			include $root.'/admin/' . $page . '/index.php';
			
			echo '</div>';
			
		} else {
			
			if(file_exists('admin/' . $page . '/navigation.php')){
				echo '<div class="navigation">';
				include 'admin/' . $page . '/navigation.php';
				echo '</div>';
				echo '<style>div.body{margin-left:205px;}</style>';
			}
			
			echo '<div class="body">';
			include 'admin/' . $page . '/index.php';
			echo '</div>';
			
		}
			
		
	}
	
	function virtual($page){
			
			$page		 = sql('SELECT ID FROM pages WHERE pagesAdresse = "'.$page.'" LIMIT 1');
			$virtual = sql('SELECT '.$_SESSION['language'].' FROM lang WHERE langID="'.$page['ID'].'_PAGES" LIMIT 1');
			$content = $virtual[$_SESSION['language']];
			
			echo $content;
		
	}
	
	function href2address($address){
		
		$text = content::string2short($address);
		
		return $text;
		
	}
	
	static function string2short($string){
		
		$string = utf8_encode($string);
		
		$exchange = array(' '=>'-',
											'-'=>'_',
											'_'=>'__',
											'á'=>'a',
											'é'=>'e',
											'í'=>'i',
											'ó'=>'o',
											'ú'=>'u',
											'Á'=>'A',
											'É'=>'E',
											'Í'=>'I',
											'Ó'=>'O',
											'Ú'=>'U',
											'?'=>'',
											'/'=>'-+-',
											);
		
		$text = strtr($string,$exchange);
		
		return $text;
		
	}
	
	static function address2href($address){
		
		$exchange = array('-'=>' ',
											'_'=>'-',
											'__'=>'_',
											'-+-'=>'/',
										 );
		
		$text = strtr($address,$exchange);
		
		return $text;
		
	}
	
	static function address2number($address){
		
		$text = ereg_replace("[^0-9]", "", $address);
		
		return $text;
		
	}
	
	static function short2ID($table, $column, $value){
		
		$value = content::address2href($value);
		
		$i = sql('SELECT ID FROM '.$table.' WHERE '.$column.' = "'.$value.'" LIMIT 1');
		
		return $i['ID'];
		
	}
	
	function exists($module = FALSE){
		
		$exists = FALSE;
		
		$module = ($module) ? $module : $_SESSION['module'];
		
		$page = resource::controller();
		
		$get = sql('SELECT pagesAdresse FROM pages WHERE pagesAdresse = "'.$page.'" LIMIT 1');
		
		if($get or file_exists($module . '/' . $page . '/index.php')
						or file_exists($module . '/' . $page . '.php')
						or !resource::controller()
						or resource::controller() == 'admin') {
			
			$exists = TRUE;
		
		}
		
		return $exists;
		
	}
	
	// INCLUDE PAGE FROM GET_SECTOR
	static function sector($sector){
		
		if (!$sector) $sector = 'home';
		
		$return = (resource::action() && !is_numeric(resource::action())) ? resource::action().'.php' : $sector . '.php' ;

		if(isset($_GET['edit'])) $return = 'edit.php';
//		if(isset($_GET['delete'])) $return = 'delete.php';
		
		return $return;
		
	}
	
	function section($section){
		
		if (!$section) $section = 'section';
		
		return (resource::variable() && !is_numeric(resource::variable())) ? resource::variable().'.php' : $section . '.php' ;
		
	}
	
	static function isAjaxRequest() {
    
    if( !empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && 
    strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == "xmlhttprequest" )
        return true;
    else
        return false;
        
	} 

}

?>