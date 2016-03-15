<?

class cronjob {
	
	static $table = 'cronjob';
	
	static $duration = '2592000'; // a week
					
	function get($type){
		
		
		
	}
	
	function count($type){
		
		if ($type) $type = ' WHERE type = "' . $type . '"';
		
		$count = sql('SELECT COUNT(ID) AS count FROM ' . self::$table . $type . ' LIMIT 1');
		
		return $count['count'];
		
	}

  function add($cronjob, $type, $info, $user, $date){
    
    $vars['code'] = (!$user) ? $_SESSION['user'] : $user ;
    $vars['type'] = $type;
    $vars['cronjob'] = $cronjob;
    $vars['info'] = $info;
    $vars['date'] = (!$date) ? date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s')) + self::$duration) : $date ;
    
    sql_insert(cronjob, $vars);
    
  }
	
}
 
?>