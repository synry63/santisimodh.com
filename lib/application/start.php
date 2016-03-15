<?
// SELECT LANGUAGE/

if($_GET['sp']){
	
	$_SESSION['language'] = $_GET['sp'];

}

if (!isset($_SESSION['language']) or strlen($_SESSION['language']) < 2){
	
	$aLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
	$sp = sql('SELECT pageLang FROM page WHERE pageLang = "' . $aLang . '" LIMIT 1');
		
	$sp = (!$sp['pageLang']) ? $lang : $sp['pageLang'] ;
	
	$_SESSION['language'] = $sp;

}

if ($_SESSION['module'] == 'admin' && !isset($_SESSION['admin-lang'])){
	
	$aLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
	$sp = sql('SELECT pageLang FROM page WHERE pageLang = "' . $aLang . '" LIMIT 1');
	
	$sp = (!$sp['pageLang']) ? $lang : $sp['pageLang'] ;
	
	$_SESSION['admin-lang'] = $sp;

}

if(!isset($_SESSION['currency'])){
	
	$c = sql('SELECT short FROM currency WHERE language="'.$_SESSION['language'].'" LIMIT 1');
	$cm = sql('SELECT short FROM currency WHERE value = "1" LIMIT 1');
	
	$_SESSION['currency'] = ($c) ? $c['short'] : $cm['short'] ;
	
}

?>