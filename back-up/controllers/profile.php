<?php

if($_POST['update']){
	
	users::update();
	
}

if($_POST['delete-image']){
	
	users::delete_image();
	
}

if($_POST['add-image']){
	
	users::add_image();
	
}

?>