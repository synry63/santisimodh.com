<?php

class layout{

	function table($table,$fields=FALSE){
		
		$fields ($fields) ? $fields : '*' ;
		$info = sql('SELECT '.$fields.' FROM '.$table.'');
		
	}

}

?>