<?php

if($_POST['change-email'] && $_POST['email']) users::update();

if($_POST['change-password']){
	
	if(users::password()) users::update();
	
}
if($_POST['save-profile']){
	
	users::update();
	
}

?>