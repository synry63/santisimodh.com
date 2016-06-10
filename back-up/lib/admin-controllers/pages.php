<?php

sql('ALTER TABLE `pages` CHANGE `pagesID` `ID` SMALLINT( 4 ) NOT NULL AUTO_INCREMENT ');

if(!$_SESSION['pages-language']) $_SESSION['pages-language'] = $lang;

if(resource::variable()) $_SESSION['pages-language'] = resource::variable();

if($_POST['save']){
	
	$_POST['ID'] = resource::action();
	
	if($_POST['home'] == "1") sql('UPDATE pages SET home = "" WHERE home = "1"');
	sql_update('pages');
	
	//$_POST['langID'] = resource::action().'_PAGES';
	sql_update('lang',FALSE,'lID');
	
	$vars['langID'] = 'name_'.resource::action().'_PAGES';
	$vars[$_SESSION['pages-language']] = $_POST['name'];
	sql_update('lang',$vars,'langID');
	
	$vars['langID'] = 'title_'.resource::action().'_PAGES';
	$vars[$_SESSION['pages-language']] = $_POST['title'];
	sql_update('lang',$vars,'langID');
	
	$vars['langID'] = 'description_'.resource::action().'_PAGES';
	$vars[$_SESSION['pages-language']] = $_POST['description'];
	sql_update('lang',$vars,'langID');
	
	$vars['langID'] = 'keywords_'.resource::action().'_PAGES';
	$vars[$_SESSION['pages-language']] = $_POST['keywords'];
	sql_update('lang',$vars,'langID');
	
	header('Location: /pages/'.resource::action().'/'.$_SESSION['pages-language'].'/');
	
}

if($_POST['delete-Page']){
	
	sql('DELETE FROM pages WHERE ID = "'.resource::action().'" LIMIT 1');
	sql('DELETE FROM lang WHERE langID = "name_'.resource::action().'_PAGES"');
	sql('DELETE FROM lang WHERE langID = "title_'.resource::action().'_PAGES"');
	sql('DELETE FROM lang WHERE langID = "description_'.resource::action().'_PAGES"');
	sql('DELETE FROM lang WHERE langID = "keywords_'.resource::action().'_PAGES"');
	
	header('Location /pages/');
	
}

if($_POST['new-Page']){
	$id = sql_insert('pages',FALSE);
	$_POST['langID']   = $id.'_PAGES';
	$_POST['langPage'] = '_PAGES';
	sql_insert('lang');
	$_POST['langID']   = 'name_'.$id.'_PAGES';
	sql_insert('lang');
	$_POST['langID']   = 'title_'.$id.'_PAGES';
	sql_insert('lang');
	$_POST['langID']   = 'description_'.$id.'_PAGES';
	sql_insert('lang');
	$_POST['langID']   = 'keywords_'.$id.'_PAGES';
	sql_insert('lang');
	
	header('Location: /pages/');
	
}

?>