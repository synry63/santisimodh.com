<?
//if($_GET['blank']=='chat' or $_GET['resourse']=='chat'){

if($_GET['resourse']=='chat' or isset($_GET['resourse'])) {
	
	$module = ($_SESSION['module'] == 'default') ? 'pages' : $_SESSION['module'] ;
	
	include($module.'/'.$_GET['resourse'].'.php');
	
	exit;
}

if(isset($_GET['getPage'])) {
	
	$content = sql('SELECT '.$_SESSION['language'].' FROM lang WHERE langID = "'.$_GET['getPage'].'_PAGES" LIMIT 1');
	echo fix($content[$_SESSION['language']]);
	exit;
}

?>