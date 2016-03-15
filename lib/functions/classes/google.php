<?
class google{

	function contacts($user,$password){
		 
		// ref: http://code.google.com/apis/accounts/docs/AuthForInstalledApps.html
		 
		// step 1: login
		$login_url = "https://www.google.com/accounts/ClientLogin";
		$fields = array(
			'Email' => $user,
			'Passwd' => $password,
			'service' => 'cp', // <== contact list service code
			'source' => 'test-google-contact-grabber',
			'accountType' => 'GOOGLE',
		);
		 
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,$login_url);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,$fields);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec($curl);
		 
		$returns = array();
		 
		foreach (explode("\n",$result) as $line)
		{
			$line = trim($line);
			if (!$line) continue;
			list($k,$v) = explode("=",$line,2);
		 
			$returns[$k] = $v;
		}
		 
		curl_close($curl);
		 
		// step 2: grab the contact list
		$feed_url = "http://www.google.com/m8/feeds/contacts/$user/full?alt=json&max-results=250";
		 
		$header = array(
			'Authorization: GoogleLogin auth=' . $returns['Auth'],
		);
		 
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $feed_url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		 
		$result = curl_exec($curl);
		curl_close($curl);
		 
		$data = json_decode($result);
		 
		$contacts = array();
		 
		foreach ($data->feed->entry as $entry)
		{
			$contact = new stdClass();
			$contact->title = $entry->title->{'$t'};
			$contact->email = $entry->{'gd$email'}[0]->address;
		 
			$contacts[] = $contact;
		}
		 
		//var_dump($contacts);
		foreach($contacts as $key=>$value){
			
			$var[$value->email] = $value->title;
			//print_r($value);
		}
		unset($var['']);
		
		return $var;
	
	}
	
	static public function getCoordinates($address){
		
		$address = str_replace(" ", "+", $address);
		$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
		$response = file_get_contents($url);
		$json = json_decode($response,TRUE);
		
		return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);
		
	}
}

?>