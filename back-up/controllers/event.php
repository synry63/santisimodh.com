<?php

if($_POST['accept-rules']) {
	
	users::update();
		
	$v = form::validator(array('id_number','team','category'));
	
	if(!$v){
		
		events::addUser(FALSE, resource::action());
		
		header('Location: /event/'.resource::action().'/confirmed/');
		
	}

}

?>