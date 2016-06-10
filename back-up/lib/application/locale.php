<?php

//if(resource::controller()=='lang'){
//	
//	$_SESSION['language'] 	= resource::action();
//	
//	$r = array('_'=>'/');
//	header('Location: /'.strtr(resource::variable(),$r));
//	
//}

if (isset($_GET['lang']) && $_GET['lang'] != '') {
	
	$_SESSION['language'] = $_GET['lang'];
	
}

if(resource::controller()=='currency' and $_SESSION['module'] != 'admin'){
	
	$_SESSION['currency'] 	= resource::action();
	
	$r = array('-'=>'/');
	header('Location: /'.strtr(resource::variable(),$r));
	
}

?>