<?

foreach($_POST as $key => $value){
	
	$vars['k'] 		 = $key;
	$vars['value'] = $value;
	
	sql_update('config',$vars,'k');
	
}

?>