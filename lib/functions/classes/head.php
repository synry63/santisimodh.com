<?php

class head{
	
	static public $meta = array();
	static public $css = array();
	
	function css($css = FALSE){
		
		$cssDir = 'css';
		
		// GET CSS
		$css 		= scandir($cssDir);
		foreach($css as $cssFile) if(strrchr($cssFile,'.')=='.css') echo '<link href="/'.$cssDir.'/'.$cssFile.'" rel="stylesheet" type="text/css" media="all" />';
		
		// GET CSS CONTROLLER
		$css_div_file = $cssDir.'/autoload/'.resource::controller().'.css';
		if(resource::controller() and file_exists($css_div_file)) echo '<link href="/'.$css_div_file.'" rel="stylesheet" type="text/css" media="all" />';
		
		// GEY CSS MODULE
		if(file_exists($cssDir.'/modules/'.$_SESSION['module'].'.css')) echo "<link href='/".$cssDir.'/modules/'.$_SESSION['module'].'.css'."' rel='stylesheet' type='text/css' media='all'>";
		
		// GET CSS VALUES
//		if(is_array($css)) foreach($page['css'] as $id => $css) echo "<link href='".$css."' rel='stylesheet' type='text/css'>";
		
	}
	
	function js($file = array()){
		
		$dir = 'js/autoload';

		$js		 = scandir($dir);
		
		foreach($js as $jsFile){
			
			if(strrchr($jsFile,'.')=='.js') {
				
				$return.= '<script type="text/javascript" src="/js/autoload/'.$jsFile.'" ></script>';
			
				
			}
			
		}
		
		foreach($file as $name){
			
			$path = 'js/' . $name . '.js';
			
			if (file_exists($path)) {
				
				$return.= '<script type="text/javascript" src="/' . $path . '" ></script>';
			
				
			}
			
		}
		
		$modulePath = 'js/autoload/module/' . resource::module() . '.js';
		
		if (file_exists($modulePath)) {
			
			$return.= '<script type="text/javascript" src="/'.$modulePath.'" ></script>';
			
		}
		
		$modulePath = 'js/autoload/controller/' . resource::controller() . '.js';
		
		if (file_exists($modulePath)) {
			
			$return.= '<script type="text/javascript" src="/'.$modulePath.'" ></script>';
			
		}
		
		return $return;
		
	}
	
	static function setMeta ($string){
		
		self::$meta[] = $string;
		
	}
	
	static function meta() {
		
		foreach(self::$meta as $meta) {
	
			$return.= $meta;

		}
		
		return $return;
		
	}
	
}

?>