<?php

class international {
	
	static function countries($value = FALSE) {
	
//		ob_start(fix);
		
		$language = $_SESSION['language'];
		
		if ($value) {
			
			$i = sql('SELECT ' . $language . ' FROM countries WHERE code = "' . $value . '" LIMIT 1');
		
			$return = $i[$language];
			
		} else {
			
			$i = sql('SELECT code, ' . $language . ' FROM countries');
		
			foreach ( $i as $key => $value)  $return[$value['code']] = $value[$language];
			
		}
		
		return $return;
		
	}
	
	static function cities($city = FALSE, $language = FALSE){
	
		if (!$language) {
			
			$language = $_SESSION['language'];
		
		}

		if ( $city ) {
			
			$city = sql('SELECT ' . $language . ' FROM cities WHERE code = "' . $city . '" LIMIT 1');
			
			$city = strtr($city[$language], lang::errors());
			
		} else {
			
			$i = sql('SELECT code, ' . $language . ' FROM cities');
			
			foreach($i as $value) {
				
				$city[$value['code']] = strtr($value[$language], lang::errors());
			
			}
		}
		
		return $city ;
	
	}
	
	static function languages($l){
	
	ob_start(fix);
	
	//English
	$lang['en']['en'] = 'English';
	$lang['en']['de'] = 'German';
	$lang['en']['it'] = 'Italian';
	$lang['en']['pl'] = 'Polish';
	$lang['en']['ru'] = 'Rusian';
	$lang['en']['es'] = 'Spanish';
	
	//German
	$lang['de']['en'] = 'Englisch';
	$lang['de']['de'] = 'Deutsch';
	$lang['de']['it'] = 'Italianisch';
	$lang['de']['pl'] = 'Polnisch';
	$lang['de']['ru'] = 'Rusisch';
	$lang['de']['es'] = 'Spanisch';
	
	//Spanish
	$lang['es']['de'] = 'Alemán';
	$lang['es']['es'] = 'Español';
	$lang['es']['en'] = 'Inglés';
	$lang['es']['it'] = 'Italiano';
	$lang['es']['pl'] = 'Polaco';
	$lang['es']['ru'] = 'Ruso';
	
	if($l) {
		
		return $lang[$_SESSION['language']][$l];
	
	} else {
		
		return $lang[$_SESSION['language']];
	
	}
	
}

	static function getCountry($ip_address){
		//By Marc Palau (http://www.nbsp.es)
		$url = "http://ip-to-country.webhosting.info/node/view/36";
		
		$inici = "src=/flag/?type=2&cc2=";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST,"POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "ip_address=$ip_address"); 
		
		ob_start();
		
		curl_exec($ch);
		curl_close($ch);
		$cache = ob_get_contents();
		ob_end_clean();
		
		$resto = strstr($cache,$inici);
		$pais = substr($resto,strlen($inici),2);
		
		return $pais;
	}
	
}

?>