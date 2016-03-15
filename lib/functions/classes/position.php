<?php

class position{	
	
	function add($table,$ID,$position){
		
		$vars['ID'] = $ID;
		$vars['position'] = $position;
		sql_update($table);
		
		$all = sql('SELECT ID,position FROM '.$table.' WHERE position >= "'.$position.'" AND ID != "'.$ID.'"');
		
		foreach($all as $key => $value) sql_update($table,array('ID' => $value['ID'], 'position' => $value['position']+1));
		
	}
	
	function change($table,$ID,$position){
		
		if($position == '+') position::add($table,$ID,$position+1);
		if($position == '-') position::add($table,$ID,$position-1);
		
	}
	
}

?>