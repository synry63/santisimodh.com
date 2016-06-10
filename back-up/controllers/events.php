<?php

if($_POST['add-event']){
	sql_insert('events');
	header('Location: /events/');
}

if($_POST['update-event']){
	
	$_POST['date'] = form::postdatetime();
	sql_update('events');
	
}

if($_FILES['image']){
	
	$vars['ID'] = $_POST['ID'];
	$vars['image'] = image::upload($_FILES['image']);
	sql_update('events',$vars);
	
}

if($_FILES['map']){
	
	$vars['ID'] = $_POST['ID'];
	$vars['map'] = image::upload($_FILES['map']);
	sql_update('events',$vars);
	
}

if($_POST['delete-image']) {
	
	$_POST['image'] = '';
	sql_update('events');
	
}

if($_POST['accept-event-user']) events::acceptUser($_POST['ID']);

if($_POST['reject-event-user']) events::deleteUser($_POST['ID']);

if($_POST['reject-user']) events::deleteUser($_POST['ID']);

if($_POST['change-time']) sql_update('bikers2events');

if($_POST['change-category-user']) sql_update('bikers2events');

?>