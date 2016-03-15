<?php

function doLang($l){
	
	global $errors;
	
	//English
	$lang['en']['en'] = 'English';
	$lang['en']['de'] = 'German';
	$lang['en']['es'] = 'Spanish';
	$lang['en']['it'] = 'Italian';
	$lang['en']['pl'] = 'Polish';
	
	//German
	$lang['de']['en'] = 'Englisch';
	$lang['de']['de'] = 'Deutsch';
	$lang['de']['es'] = 'Spanisch';
	$lang['de']['it'] = 'Italianisch';
	$lang['de']['pl'] = 'Polnisch';
	
	//Spanish
	$lang['es']['en'] = 'Inglés';
	$lang['es']['de'] = 'Alemán';
	$lang['es']['es'] = 'Español';
	$lang['es']['it'] = 'Italiano';
	$lang['es']['pl'] = 'Polaco';
	
	if($l=='array') {
		
		return $lang[$_SESSION['language']];
	
	} else {
		
		return strtr($lang[$_SESSION['language']][$l],$errors);
	
	}
	
}

?>