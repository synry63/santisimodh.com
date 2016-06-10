<?php

class layout {
	
	static function dots($string = NULL, $maxLength = 100, $hardCrop = FALSE, $endWith = '...'){
		
		return mb_strlen($string)>$maxLength ? mb_substr($string,0,($hardCrop==FALSE) ? mb_strrpos(mb_substr($string, 0, $maxLength),' ') : $maxLength ) . $endWith : $string;
		
	}
	
	static function table ($table, $fields, $trans, $language, $sql = array()){
		
		$t = new templates_table();
		
		$where = ' WHERE ID != ""';
		
		if ($sql['where']) {
			
			foreach($sql['where'] as $key => $value) {
				
				$where.= ' AND ' . $key . ' = "' . $value . '" ';
				
			}

		}
		
		$limit = NULL;
			
		$paginator = NULL;
		
		if (in_array('search', $fields)) {
			
			$t->search();
			unset($fields[array_search('search', $fields)]);
			
				if ($_GET['search']) {
					
				$where.= ' AND (`ID` LIKE "%' . $_GET['search'] . '%"';

				foreach($sql['search'] as $key => $value) {

					$where.= ' OR `' . $value . '` LIKE "%' . $_GET['search'] . '%"';

				}

				$where.= ' )';
//				$where.= ' COLLATE utf8_ci';
			
			}
			
		}
		
		if ($sql['limit']) {
			
			$limit = ' LIMIT 0' . $sql['limit'];
			
			$total = sql('SELECT COUNT(ID) as total FROM ' . $table . $where . ' LIMIT 1', FALSE, $language);
			
			if ($total['total'] > $sql['limit']) {
			
				$paginator = html::paginator($total['total'], $sql['limit'], 'page', 10);
				
				templates_table::$number = ($_GET['page'] * $sql['limit']) - $sql['limit'] + 1;

				$limit = ' ' . $paginator['sql'];
				
				echo $paginator['html'];
			
			}
			
		}
		
		$orderBy = NULL;
		
		if ($_GET['orderBy']) {
			
			$orderBy = ' ORDER BY `' . $_GET['orderBy'] . '` ASC';

		}
		
		if (is_array($table)) {
			
			$content = $table;
			
		} else {
		
			$sql = 'SELECT * FROM ' . $table . $where . $orderBy . $limit . '';
//		echo $sql;
			$content = sql($sql, FALSE, $language);
		
		}
		
//		print_r($content);
//		die;
		
		$td = $content;
		
		if ($fields) {
			
				$th = $fields;
				
		} else {
		
			foreach (array_shift($content) as $key => $value) {

				if (!is_numeric($key)) {

					$th[$key] = $key;

				}

			}
		
		}
		
		$t->structure($th, $td, $trans, $total['total']);
		
	}
	
	static function form ($name, $query, $fields, $trans, $table) {
		
		if(!$query) $query = $_GET['edit'];
		if (is_numeric($query) && $table) $query = sql('SELECT * FROM ' . $table . ' WHERE ID = "' . $query . ' LIMIT 1"');
		
		$ID = $query['ID'];
		
		unset($query['ID']);
		unset($query['created_at']);
		unset($query['autor']);
		unset($query['position']);
		
		$form = new form();
		
		$dl = new templates_dl();
		
		echo $form->start();
		
		foreach($query as $key => $value){
			
			$title = ($fields[$key]) ? $fields[$key] : $key;
			
			$content.= $dl->dt($title);
			$content.= $dl->dd($value, $key, $table);
			
		}
		
		echo $dl->structure($content);
		
		echo $form->input($ID, 'ID');
		echo $form->input($name, 'submit');
		
		echo $form->finish();
		
	}

	static function isAjax () {
		
		$ajax = FALSE;

		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') $ajax = TRUE;
		
		return $ajax;

	}
	
	static function doTime ($date, $zone = 0, $detail = FALSE) {
	
		$date = ($date) ? $date : date('Y-m-d H:i:s') ;

		$date = strtotime($date);
		$dif = (time() + $zone) - $date;

		// longer than a year
		$longerThanYear = ($dif>=31536000) ? TRUE : NULL ;
		$year = ($longerThanYear) ? date('Y',$date) : NULL ;
		
		$time = (!$longerThanYear or $detail) ? date('H',$date).':'.date('i',$date) : NULL ;
		
		$result = lang(date('l',$date), 'date').', '.date('d',$date).' '.lang(date('M',$date), 'date').' '.$year.' ' . $time;
		
		$result = ($dif <  60) ? lang('Less than a minute', 'date') : $result ;
		
		$result = ($dif >= 60 and $dif < 3600) ? intval($dif/60).' '.lang('minutes ago', 'date') : $result ;
		
		$result = ($dif >= 3600 and $dif < 3600*2) ? intval($dif/3600).' '.lang('hour ago', 'date') : $result ;
		
		$result = ($dif >= 3600*2 and $dif < 86400) ? intval($dif/3600).' '.lang('hours ago', 'date') : $result ;

//		$result = ($longerThanYear) ? $result.' '.date('Y', $date) : $result ;
			
		//$result = date('l, d M Y H:i',$result);
	
	return $result;
}

	
}


?>