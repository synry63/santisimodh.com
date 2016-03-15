<?

class form extends templates_form{
	
	function table(){
		
		return ($this->table) ? $this->table : $this->controller() ;
		
	}
	
	function start($action, $method){
		
		$method = ($method) ? $method : 'post' ;
		
		$content = '<form method="'.$method.'" enctype="multipart/form-data" >';
		
		return $content;
		
	}
	
	function finish(){
		
		$content = '</form>';
		
		return $content;
		
	}
	
	static function select($name,$vars,$selected=FALSE,$translate=FALSE,$blank=FALSE,$list = FALSE,$limit = 3, $required){
		
		$class = FALSE;
		
		$list = ($list) ? 'size="'.$list.'"' : '' ;
		
		if ($required) {
			
			$class.= 'required ';
			
		}
		
		if($name == 'year' && !is_array($vars)){
		
			$numbers = range($vars,$vars+$limit);
			$vars = FALSE;
			
			foreach($numbers as $year){
				
				$vars[$year] = $year;
				
			}
			
		}
		
		// MONTH
		if($name == 'month' && $vars == FALSE){
		
			$numbers = range(1,12);
			
			foreach($numbers as $month){
			
				$month = (strlen($month)<2 ? '0'.$month : $month);
				$m = ($translate) ? date('M',mktime(0,0,0,$month,10)) : $month ;
				$vars[$month] = $m;
				
			}
			
		}
		
		if($name == 'day' && $vars == FALSE){
		
			$numbers = range(1,31);
			
			foreach($numbers as $month){
			
				$month = (strlen($month)<2 ? '0'.$month : $month);
				$m = ($translate) ? date('M',mktime(0,0,0,$month,10)) : $month ;
				$vars[$month] = $m;
				
			}
			
		}
		
		if($name == 'hour' && $vars == FALSE){
		
			$numbers = range(0,23);
			
			foreach($numbers as $month){
			
				$month = (strlen($month)<2 ? '0'.$month : $month);
				$m = ($translate) ? date('M',mktime(0,0,0,$month,10)) : $month ;
				$vars[$month] = $m;
				
			}
			
		}
		
		if($name == 'minute' && $vars == FALSE){
		
			$numbers = range(0,59);
			
			foreach($numbers as $month){
			
				$month = (strlen($month)<2 ? '0'.$month : $month);
				$m = ($translate) ? date('M',mktime(0,0,0,$month,10)) : $month ;
				$vars[$month] = $m;
				
			}
			
		}
		
		if($name == 'age' && $vars == FALSE){
		
			$numbers = range(18,100);
			
			foreach($numbers as $age){
			
				$age = (strlen($age)<2 ? '0'.$age : $age);
				$vars[$age] = $age;
				
			}
			
		}
		
		if($name == 'country' && $vars == FALSE) $vars = international::countries();
		
		$select = '<select name="'.$name.'" '.$list.' class="' . $class . '" >';
		
		$op = ($blank===TRUE) ? '- - - -' : $blank ;
		$select.= ($blank) ? '<option value="">'.$op.'</option>' : '' ;
		
		$select.= form::option($vars, $selected, $translate);
		
		$select.= '</select>';
		
		return $select;
		
	}
	
	static function option ($vars, $selected, $translate) {
		
		foreach ($vars as $key => $value) {
			$value = ($translate) ? lang($value) : $value ;
			$value = ($value=='') ? $key : $value ;
			$value = ($value===0) ? '' : $value ;
			$key	 = ($key===NULL) ? '' : $key ;
			$select.='<option value="'.$key.'" ' . form::selected($key,$selected) . '>'.$value.'</option>';
		}
		
		return $select;
		
	}
	
	static function selected($lang,$x4) {
	
		if($x4==$lang){
			$selec = 'selected="selected"';
		} else {
			$selec = FALSE;
		}
	return $selec;
		
	}
	
	function position($table, $id, $parent){
		
		if($parent) $parent = 'WHERE parent = "' . $parent . '"';
		
		$i = sql('SELECT ID, position FROM '. $table . ' ' . $parent . ' ORDER BY position ASC');
		
		$v = 1;
		
		foreach($i as $key) {
			
			if ($id == $key['ID']) $value = $v;
			
//			$v = (strlen($v)<2 ? '0'.$v : $v);
			$t = $v++;
			if (!$key['position']) $key['position'] = $t;
			$j[$key['position']] = $t;
			
//			$return.= '<input type="hidden" name="position['. $key['position'] .']" value="' . $t . '"';
			
		}
		
		$return.= form::select('position', $j, $value);
		
		return $return;
		
	}
	
	static function checkbox($name,$value=1,$st=1){
		
		$return.='<input type="hidden" name="'.$name.'" value="">';
		$return.='<input type="checkbox" '.checked($value,$st).' name="'.$name.'" value="'.$value.'" >';
		
		return $return;
	}
	
	function radio($name,$value=1,$st=1){
		
		//$return.='<input type="radio" name="'.$name.'" value="">';
		$return.='<input type="radio" '.checked($value,$st).' name="'.$name.'" value="'.$value.'" >';
		
		return $return;
	}
	
	function validator($vars=FALSE){
		
		$vars = ($vars) ? $vars : array_flip($_POST) ;
		
		$return = FALSE;
		
		if($_POST){
		
			foreach($vars as $key => $value){
				
				if($_POST[$value] == ''){
					
					$return[] = $value;
					
				}
				
			}
			
			if($vars['password'] and $_POST['password'] != $_POST['password2']){
				
				$return[] = 'password';
				
			}
		
		}
		
		return $return;
		
	}
	
	function postdatetime(){
		
		return $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'].' '.$_POST['hour'].':'.$_POST['minute'].':00';
		
	}
	
	function postdate(){
		
		return $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		
	}
	
	function datetime2array($value){
		
		$return['year'] = substr($value,0,4);
		$return['month'] = substr($value,5,2);
		$return['day'] = substr($value,8,2);
		$return['hour'] = substr($value,11,2);
		$return['minute'] = substr($value,14,2);
	
		return $return;	
	
	}
	
	function image($value,$name,$folder = 'images',$submit=FALSE){
		
		if($value){
			
			$i = '<img src="/images/'.$folder.'/'.$value.'" />';
			$i.= '<input name="delete-'.$name.'" value="'.lang('Delete').'" type="submit" />';
			$i.= '<input type="hidden" name = "' . $name . '" value = "' . $value . '" />';
			
		} else {
			
			$i = form::file($name);
			if($submit) $i.= '<input type="submit" name="upload-image" value="'.$submit.'" />';
			
		}
		
		return $i;
		
	}
	
	static function file($name){
		
		$i = '<input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
					<input name="' . $name . '" type="file" />';
		
		return $i;
		
	}
	
}

?>