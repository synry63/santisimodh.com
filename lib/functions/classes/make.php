<?php

class make{
	
	function dating($date){
		
		//2012-06-03
		$numbers = explode('-',$date);
		
		$year = $numbers[0];
		$month = $numbers[1];
		$day = $numbers[2];
		
		return $day.' '.date('M',mktime(0,0,0,$month,10)).' '.$year;
		
	}
	
}

?>