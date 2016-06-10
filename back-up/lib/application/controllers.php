<?

if(file_exists('controllers/index.php')){
	
	include 'controllers/index.php';

}

if(file_exists('controllers/modules/'.$_SESSION['module'].'.php')){
	
	include 'controllers/modules/'.$_SESSION['module'].'.php';
	
}

if(resource::controller() or isset($_GET['blank']) or isset($_GET['resourse'])){
	
	$file = ($_GET['resourse']) ? $_GET['resourse'] : $_GET['blank'] ;
	$file = (resource::controller()) ? resource::controller() : $file ;
	
	if(file_exists('controllers/'.$file.'.php')){
	
		include 'controllers/'.$file.'.php';
	
	}

}

if (content::isAjaxRequest()) {
	
	content::page();
	die;
	
}

?>