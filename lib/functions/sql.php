<?php

function sql_structure($vars){
	
	return sql::structure($vars);
	
}

function sql_insert($table,$vars=FALSE,$id = FALSE){
	
	global $_POST;
	global $link;
	
	$post = ($vars) ? $vars : $_POST;
	
	// add status
	
	if(!$post['created_at']) $post['created_at'] = date('Y-m-d H:i:s');
	
	// add user code
	
	if($_SESSION['user'] && !$post['code']) $post['code'] = $_SESSION['user'];

	// do not add if exists
	if($id){
		
		$insert = sql('SELECT '.$id.' FROM '.$table.' WHERE '.$id.' = "'.$post[$id].'" LIMIT 1');
	
	}
	
	if($insert){
	
		return $insert[$id];	
		
	} else {
	//echo $table;
	//print_r($post);
	
		$fields = sql('show columns FROM '.$table);
		foreach($fields as $key=>$value){
			
			$fields[$value['Field']] = $value['Field'];
		
		}
		
		foreach($post as $key => $value){
			
			if(array_key_exists($key, $fields)) {
				$posted[$key] = $key;
				$toPost[$key] = $value;
				$tp[] 				= $key.'="'.$value.'"';
			};
		
			
		}
		
		$posted = implode('`,`',$posted);
		$toPost = implode('","',$toPost);
		$tp 		= implode(' AND ',$tp);
		
		$sql='INSERT INTO '.$table.' (`'.$posted.'`) VALUES ("'.$toPost.'")';
		mysql_query($sql,$link);

		$sql = 'SELECT ID FROM `'.$table.'` WHERE '.$tp.' ORDER BY ID DESC LIMIT 1';
		$return = sql($sql);
		
		// TRANSLATION
		
		$translation = sql('show columns FROM ' . $table . '_translation');

		if ($translation){
			
			foreach($post as $key => $value){
			
				$vars[$key] = $value;

			}
			
			foreach (lang::get() as $langKey => $langValue){
			
				$vars['id2id'] = $return['ID'];
				$vars['language'] = $langKey;
				
				sql_insert($table . '_translation', $vars);
			
			}
			
		}
		
		// END TRANSLATION
		
		return $return['ID'];
	
	}
	
}



function sql_update($table, $vars=FALSE, $ID=FALSE, $mysql_real_escape_string = FALSE, $language){
	
	global $_POST;
	global $link;
	
	
	$post = ($vars) ? $vars : $_POST;
	$language = ($language) ? $language : $_SESSION['language'] ;
	
//	print_r($post);
	
	$ID = ($ID) ? $ID : 'ID' ;
	
	$fields = sql('show columns from '.$table);
	foreach($fields as $key=>$value){
		$fields[$value['Field']] = $value['Field'];
	}
	
	foreach($post as $key => $value){
		
		if(array_key_exists($key,$fields)) {
		
			if($mysql_real_escape_string)	$value = 	mysql_real_escape_string($value);
			
			$set[]= '`'.$key.'` = "'.$value.'"';
		
		}
	}
	
	$sql = implode(",",$set);
	
	$sql = 'UPDATE '.$table.' SET '.$sql.' WHERE '.$ID.' = "'.$post[$ID].'"';
//	echo $sql;
//	die;
	mysql_query($sql,$link);
	
	// TRANSLATION
	if ($post['ID']) {
		
		$translation = sql('SELECT ID FROM ' . $table . '_translation WHERE id2id = "' . $post['ID'] . '" AND language = "' . $language . '" LIMIT 1');
		
		// check if all languages are there
		foreach (lang::get() as $lk => $lv) {
			
			$isLanguage = sql('SELECT ID FROM ' . $table . '_translation WHERE id2id = "' . $post['ID'] . '" AND language = "' . $lk . '" LIMIT 1');
			
			if(!$isLanguage) sql_insert ($table . '_translation', array('id2id' => $post['ID'], 'language' => $lk));
			
		}

		$post['ID'] = $translation['ID'];

		if($translation) sql_update($table . '_translation', $post);
	
	}
	
}

function sql($sql, $ID, $language){

	return sql::query($sql, $ID, $language);
	
}

?>