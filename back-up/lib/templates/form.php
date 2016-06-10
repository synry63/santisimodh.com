<?php

class templates_form {
	
	public function input($value, $type, $table){
		
		$return = '<input type="text" value="' . $value . '" name="' . $type . '" />';
		
		if ($type == 'country') {
			
			$return = form::select($type, FALSE, $value);
			
		}
		
		if ($type == 'language') {
			
			$return = form::select($type, lang::get(), $value);
			
		}
		
		if ($type == 'content') {
			
			$return = '<textarea name="' . $type . '">' . $value . '</textarea>';
			
		}
		
		if ($type == 'submit') {
			
			$return = '<input type="submit" name="' . $value . '" />';
			
		}
		
		if ($type == 'ID') {
			
			$return = '<input type="hidden" name="' . $type . '" value="' . $value . '" />';
			
		}
		
		if ($type == 'parent') {
			
			$q = sql('SELECT * FROM ' . $table);
			
			$j[NULL] = '';
			foreach($q as $k => $v) $j[$v['ID']] = $v['short'];
			$return = form::select($type, $j, $value);
			
		}
		
		if ($type == 'image') {
			
			$return = form::image($value, $type, 'images');
			
		}
		
		return $return;
		
	}
	
}

?>
