<?php

if($_POST['register_user']){

	$validation = form::validator(array('name','last-name','email','password'));

	if(!$validation){
		
		$_POST['birthday'] = form::postdate();
		users::add();
		login::validator();
		header('Location: /');
		
	}

}

?>