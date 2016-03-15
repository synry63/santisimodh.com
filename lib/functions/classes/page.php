<?php

class page{
	
		
	function title($title,$show){
		
		// CONTROLLER ID
		$pages = sql('SELECT ID FROM pages WHERE pagesAdresse="'.resource::controller().'.php" OR pagesAdresse="'.resource::controller().'" LIMIT 1');
		
		// CONTROLLER TITLE
		$ntitle = lang::ID('title_'.$pages['ID'].'_PAGES',$_SESSION['language']);
		$title = ($ntitle) ? $ntitle : $title ;
		
		if(!$show){
			
			$page = sql('SELECT pageTitle FROM page WHERE pageLang="'.$_SESSION['language'].'" LIMIT 1');
			$title.= ' '.fix($page['pageTitle']);
		
		}
		
		return $title;
			
	}
	
	function call($page,$div=FALSE,$css=FALSE){
		
		global $root;
		
		if($css){ echo '<link type="text/css" rel="stylesheet" href="/css/autoload/'.$page.'.css">'; }
		
		if($div) { echo '<div class="'.$page.'">'; }
		
		include $root.'/lib/templates/pages/'.$page.'.php';
		
		if($div) { echo '</div>'; }
	}
	
	function helpers($page,$folder=FALSE,$vars=FALSE){
		
		global $root;
		
		$folder = ($folder) ? '/'.$folder : FALSE ;
		
		include $root.'/lib/templates/helpers'.$folder.'/'.$page.'.php';
		
		//echo $root.'/lib/templates/helpers'.$folder.'/'.$page.'.php';
	}
	
}

?>