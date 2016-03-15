<?php

class main{
	
	static $ID;
	static $controller;
	static $orderby = NULL;
	static $where = NULL;
	static $select = '*';
	static $limit = 0100;
	
	function controller(){
		
		$controller = ($this->controller) ? $this->controller : get_class($this);
		
		return $controller;
		
	}
	
	public function get($ID){
		
		if($ID){
		
			$i = sql('SELECT ' . $this->select . ' FROM '.$this->controller().' WHERE ID = "'.$ID.'" LIMIT 1');
		
		} else {
			
			if($this->orderby) $orderby = 'ORDER BY ' . $this->orderby;
			if($this->where) 	 $where = 'WHERE ' . $this->where;
			
			$i = sql('SELECT '. $this->select.' FROM '. $this->controller().' '.$where.' ' . $orderby . ' LIMIT ' . $this->limit);
			
		}
		return $i;
		
	}
	
}

?>