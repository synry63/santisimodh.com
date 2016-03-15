<?php

if(resource::controller()=='cronjob') {
	
	
	ini_set('max_execution_time', 3600);
	ini_set('set_time_limit', 3600);
	set_time_limit(3600);
	
	
	include('cronjob/'.content::sector('index'));
	
	
	exit;
	

}

?>