<?php

if ($_POST['add-cronjob']){
	
	cronjob::add($_POST['cronjob'], $_POST['type'], $_POST['info'] );
	header('Location: /cronjob/');
	
}

if (resource::action() == 'deleteByType'){
	
	sql('DELETE FROM cronjob WHERE type = "' . resource::variable() . '"');
	header('Location: /cronjob/');
	
}

?>