<?

class currency {
	
	function get($var = FALSE){
		
		$info = sql('SELECT name,symbol,value,short FROM currency');
		
		foreach($info as $key=>$value){
		
			$return[$value['short']] = $value;
			
		}
		
		if($var) $return = $return[$var];
		
		return $return;
		
	}
	
	function show($value){
		
		//$main = sql('SELECT value FROM currency WHERE value = "1" LIMIT 1');
		$now	= sql('SELECT value,symbol FROM currency WHERE short = "'.$_SESSION['currency'].'" LIMIT 1');
		
		$number = $value * $now['value'];
		
		return $now['symbol'].' '.number_format($number,2);
		
	}
	
	function change($value,$currency){
		
		$new	= sql('SELECT value FROM currency WHERE short = "'.$currency.'" LIMIT 1');
		
		$number = $value * $new['value'];
		
		return number_format($number,2);
		
	}
	
	function menu(){
		
		$info = currency::get();
		unset($info[$_SESSION['currency']]);
		
		$return = '<ul class="currency">';
		
		foreach($info as $key => $value){
			
			$return.= '<li id="'.$key.'">';
			$return.= '<a href="/currency/'.$key.'/'.implode($_GET,'-').'/" ><span id="symbol" >'.$value['symbol'].'</span> - <span id="name">'.$value['name'].'</span></a>';
			$return.= '</li>';
			
		}
		
		$return.= '</ul>';
		
		return $return;
		
	}
	
}

?>