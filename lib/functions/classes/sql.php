<?

class sql {
	
	static $sql;
	static $select = '*';
	static $table;
	static $queries = array();
	
	function connect() {
		
		$info = configuration::info();
		//$info = ($info) ? $info : configuration::connection();
		
		$info['host'] = ($info['host']) ? $info['host'] : 'localhost' ;
	
		if (!($link=mysql_connect($info['host'],$info['db_user'],$info['db_password']))) { }
		
		if (!mysql_select_db($info['db'],$link)) {
			
			$sql = 'CREATE DATABASE `'.$info['db'].'`';
			mysql_query($sql,$link);
		
		}
		
		return $link;
		
	}
	
	private function translation($table, $ID, $language = FALSE){
		
		
		$language = ($language) ? $language : $_SESSION['language'] ;
		
		$row = sql('SELECT * FROM ' . $table . '_translation WHERE id2id = "' . $ID . '" AND language = "' . $language . '" LIMIT 1');
		
		if ($row){

			unset($row['ID']);
			unset($row['language']);
			unset($row['id2id']);
			unset($row['created_at']);
			
			return $row;
			
		}
		
	}
	
	static function query($sql, $ID=FALSE, $language){
		
		global $link;
		
		if (self::$queries[$sql]) {
			
			$set = self::$queries[$sql]['Result'];
			
		} else {
		
			//$link = sql::connect();

	//		$ID = ($ID) ? $ID : 'ID';
			$language = ($language) ? $language : $_SESSION['language'];

			$set 		= FALSE;
			$setted = FALSE;

			$table = preg_split('/FROM/', $sql);
			$table = explode(' ', $table[1]);
			$table = ($table[0]) ? $table[0] : $table[1] ;

			$i = 0;

			$result = mysql_query($sql,$link);
			while($row = mysql_fetch_array($result)){

				foreach($row as $kdel => $vdel) if(is_numeric ($kdel)) unset($row[$kdel]);

				if (preg_match('/SELECT/', $sql)) {

					if (!preg_match('/LIMIT 1/', $sql)) {

						// TRANSLATION
						$toMerge = sql::translation($table, $row['ID'], $language);
						if ($toMerge) $row = array_merge($row, $toMerge);

						// $ID = ($row[$ID]) ? $row[$ID] : FALSE ; 
						foreach($row as $kdel => $vdel) if(is_numeric ($kdel)) unset($row[$kdel]);
						$j = ($row['ID']) ? $row['ID'] : $i;
						$set[$j] = $row;

						// SHORT
						$short = self::short($row);
						if ($short) $set[$j]['short'] = self::short($row);

					} else {

						foreach($row as $kdel => $vdel) if(is_numeric ($kdel)) unset($row[$kdel]);

						$merge = sql::translation($table, $row['ID'], $language);
						if ($merge) $row = array_merge($row, $merge);
						$set = $row;

					}

				} else {

					$set[$i] = $row;

				}

				$i++;

			}

			self::$queries[$sql] = array('Query' => $sql, 'Result' => $set);

			mysql_free_result($result);
		
		}
		
//		print_r($set);
		return $set;
	
	}
	
	static function short($array){
		
		$short = FALSE;
		
		if ($array['short']) {
			
			$short = $array['short'];
			
		} elseif ($array['name']) {
			
			$short = $array['name'];
			
		} elseif ($array['title']) {
			
			$short = $array['title'];
			
		}
		
		return $short;
		
	}
	
	function select($fields){
		
		if(!$fields) $fields = '*';
		
		$this -> action = 'SELECT '.$fields;
		
	}
	
	function from($table){
		
		if(!$table) $table = resource::controller();
		
		$this -> table = $table;
		
	}
	
	function execute(){
		
		$sql = $this -> action;
		$sql.= ' '.$this -> from;
		
		$this -> sql = $sql;
		
	}
	
	function orderBy($orderBy, $order = 'ASC', $method){
		
		$orderBy = ($orderBy) ? $orderBy : $_GET['orderBy'] ;
		
		return 'ORDER BY `'.$orderBy.'` '.$order;
		
	}
	
	static function structure($vars) {
	
		foreach($vars as $table=>$value){

			sql('CREATE TABLE IF NOT EXISTS '.$table.'(ID INT(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY ( `ID` ))');

			foreach($value as $name=>$pro){

				$pro['type'] = ($pro['type']) ? $pro['type'] : 'TEXT' ;
				//echo $pro['type'];

				 if($name=='translation'){

					sql('CREATE TABLE IF NOT EXISTS ' . $table . '_translation (ID BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY ( `ID` ))');
					sql('ALTER TABLE `'.$table.'_translation` ADD `id2id` BIGINT NOT NULL');
					sql('ALTER TABLE `'.$table.'_translation` ADD `language` VARCHAR( 4 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ');

				} elseif($pro['type']=='VARCHAR'){

					$pro['SET'] = (!$pro['SET']) ? '250' : $pro['SET'] ;
					sql('ALTER TABLE `'.$table.'` ADD `'.$name.'` VARCHAR( '.$pro['SET'].' ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ');

				} elseif($pro['type']=='TEXT'){

					sql('ALTER TABLE `'.$table.'` ADD `'.$name.'` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL');

				} elseif($pro['type']=='TIMESTAMP'){

					sql('ALTER TABLE `'.$table.'` ADD `'.$name.'` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');

				} elseif($pro['type']=='DATETIME'){

					sql('ALTER TABLE `'.$table.'` ADD `'.$name.'` DATETIME NOT NULL');

				} elseif($pro['type']=='TIME'){

					sql('ALTER TABLE `'.$table.'` ADD `'.$name.'` TIME NOT NULL');

				} elseif($pro['type']=='DATE'){

					sql('ALTER TABLE `'.$table.'` ADD `'.$name.'` DATE NOT NULL');

				}	elseif($pro['type']=='INT'){

					sql('ALTER TABLE `'.$table.'` ADD `'.$name.'` INT( 11 ) NOT NULL ');

				} else {

					echo 'ERROR: NO TYPE RECONIZE';

				}
			}

			sql('ALTER TABLE `'.$table.'` ADD `created_at` DATETIME NOT NULL');

		}
	
	}
	
	static public function addSelect ($var) {
		
		self::$select = $var;
		
	}
	
	static public function create ($template) {
		
		$sql = new sql();
		
		return $sql;
		
		if (!self::$table) self::$table = resource::controller ();
		
		echo 'SELECT ' . self::$select . ' FROM ' . self::$table;
		
	}
	
	static function printQueries () {
		
		echo count(self::$queries) . ' queries';
		
		echo '<hr />';
		
		echo layout::table(self::$queries);
		
//		foreach (self::$queries as $value) {
//			
//			echo $value . '<br />';
//			
//		}
		
	}
	
}

?>