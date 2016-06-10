<?php

// SESSION
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//ini_set('session.cookie_lifetime','360000');
//session_cache_limiter('private');
//session_cache_expire(30000);

session_start();

header('Content-Type: text/html; charset=ISO-8859-1');


class configuration{
	
	function info(){
																					
		global $identities;
		
		$i = $identities[$_SERVER['HTTP_HOST']];
		
		return ($i) ? $i : FALSE ;
		
	}
	
	function connection(){
																					
		global $connection;
		
		return ($connection) ? $connection : FALSE ;
		
	}
	
}

function __autoload($class){

	include_once('functions/autoload/'.$class.'.php');

	if (!class_exists($class)) {

		include_once('functions/classes/'.$class.'.php');

	}

	if (!class_exists($class)) {

		$dir = strtr($class, array('_' => '/'));

		include_once '' . $dir . '.php';

	}

}

// DATABASE CONNECTION

$b = $identities;

$link = sql::connect();

$identities = $b;

//print_r(configuration::info());

$alink = $_SERVER['QUERY_STRING'];

// GLOBAL VARIABLES

define('KEY',$domain = strtr($_SERVER['SERVER_NAME'],array('www.'=>'','.de'=>'','.com'=>'','.pe'=>'','.eu'=>'','.pl'=>'')));

define('HOLDER',$domain = strtr($_SERVER['SERVER_NAME'],array('www.'=>'','.'=>'-')));


$identities[$_SERVER['HTTP_HOST']]['module'] = ($identities[$_SERVER['HTTP_HOST']]['module']) ? $identities[$_SERVER['HTTP_HOST']]['module'] : 'pages' ;
$_SESSION['module'] = (!$_SESSION['module']) ? $identities[$_SERVER['HTTP_HOST']]['module'] : $_SESSION['module'] ;

// inclutions
include('functions.php');
$resource = resource::get();

require_once 'application/ini.php';

if($_SESSION['module'] != 'default') {
	include (!file_exists($_SESSION['module'].'.php')) ? $_SESSION['module'].'/index.php' : $_SESSION['module'].'.php';
}

if ($identities[$_SERVER['HTTP_HOST']]['deathline'] and $identities[$_SERVER['HTTP_HOST']]['deathline'] > date('Y-m-d H:i:s')) include 'pages/opening.php';

?>