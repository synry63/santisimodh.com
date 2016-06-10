<?php

if($_POST['add-sponsor']) {
	
	sql_insert('sponsors');
	header('Location: /sponsors/');
	
}

if($_POST['update-sponsor']) {
	
	sql_update('sponsors');
	
}

if($_POST['upload-image']){
	
	$_POST['image'] = image::upload($_FILES['image']);
	
	sql_update('sponsors');
	
}

if($_POST['delete-image']){
	
	$_POST['image'] = '';
	
	sql_update('sponsors');
	
}


?>