<?

class lang {
	
	static function get($language){
		
		if($language){
			
			$l = sql::query('SELECT pageLang, pageLangTitle FROM page WHERE pageLang = "' . $language . '" LIMIT 1');
			
			$return = $l['pageLangTitle'];
			
		} else {
		
			$l = sql::query('SELECT pageLang, pageLangTitle FROM page');

			foreach($l as $key=>$value){

				$return[$value['pageLang']] = $value['pageLangTitle'];

			}
		
		}
		
		return $return;
		
	}
	
	
	function update($id){
		
		$l = lang::get();
	
		foreach($l as $sp => $name){
			
			if($_POST[$id.'_'.$sp]) $vars[$sp] = $_POST[$id.'_'.$sp];
		
		}
		
		$vars['langID'] = $id;
				
		sql_update('lang',$vars,'langID');
		
	}
	
	// SELECT ONE RESULT
	
	function ID($id,$l=FALSE,$nl2br = TRUE){
		
		global $lang;
		
		$l = (!$l) ? $_SESSION['language'] : $l ;
		
		$n = sql('SELECT * FROM lang WHERE langID = "'.$id.'" LIMIT 1');
		
		if(!$n){
			$vars['langID'] = $id;
			sql_insert('lang',$vars);
		}
		
		$return = ($n[$l]=='') ? $n[$lang] : $n[$l] ;
		
		return ($nl2br) ? nl2br($return) : $return;
		
	}
	
	
	static function menu(){
		
		$l = lang::get();
		unset($l[$_SESSION['language']]);
		
		$return = '<ul class="languages">';
		
		foreach($l as $key => $value){
			
			$web = sql('SELECT web FROM page WHERE pageLang = "' . $key . '" AND web != "" LIMIT 1');
			
			$web = ($web) ? $web['web'] : FALSE ;
			
			$return.= '<li id="'.$key.'">';
//			$return.= '<a title="'.$value.'" href="' . $web . '/lang/'.$key.'/'.implode($_GET,'_').'/" >'.$value.'</a>';
			$return.= '<a title="'.$value.'" href="' . $web . '?lang='.$key.'" >'.$value.'</a>';
			$return.= '</li>';
			
		}
		
		$return.= '</ul>';
		
		if($l) return $return;
		
	}
	
	function register($variable_name = 'language'){
		
		global $lang;
		
		if(!$_SESSION[$variable_name]) $_SESSION[$variable_name] = $lang;
		
	}
	
	function errors(){
		
		$errors = array('â€œ'=>'"',
										'â€'=>'"',
										'Ã"'=>'&Auml;', //Ä
										'Ä'=>'&Auml;', //Ä
										'ï¿½'=>'&auml;', //ä
										'ä'=>'&auml;', //ä
										'Ã¤'=>'&auml;', //ä
										'Ã–'=>'&Ouml;', //Ö
										'Ö'=>'&Ouml;', //Ö
										'Ã¶'=>'&ouml;', //ö
										'ö'=>'&ouml;', //ö
										'Ã¼'=>'&uuml;', //ü
										'ü'=>'&uuml;', //ü
										'Ãœ'=>'&Uuml;', //Ü
										'Ã±'=>'&ntilde;', //ñ
										'ñ'=>'&ntilde;', //ñ
										'ÃŸ'=>'&szlig;', //ß
										'ß'=>'&szlig;', //ß
										'Â¿'=>'&iquest;', //¿
										'¿'=>'&iquest;', //¿
										'Ã¡'=>'&aacute;', //á
										'á'=>'&aacute;', //á
										'Ã©'=>'&eacute;', //é
										'é'=>'&eacute;', //é
										'Ã­'=>'&iacute;', //í
										'í'=>'&iacute;', //í
										'Ã³'=>'&oacute;', //ó
										'ó'=>'&oacute;', //ó
										'Ãº'=>'&uacute;', //ú
										'ú'=>'&uacute;', //ú
										'Ãš'=>'&Uacute;', //Ú
										'Ú'=>'&Uacute;', //Ú
										'â‚¬'=>'&euro;', //€
										'€'=>'&euro;', //€
										'Â¡'=>'&iexcl;', //¡
										'Â'=>'', //
										'Ãœ'=>'Ü	', // Ü
										//'&'=>'&amp;', //&
		);
		
		return $errors;
		
	}
	
	
}

?>