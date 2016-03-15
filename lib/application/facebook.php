<?php

if($identities[$_SERVER['HTTP_HOST']]['FACEBOOK_APP_ID'] and $identities[$_SERVER['HTTP_HOST']]['FACEBOOK_SECRET']){
	
	$config['appId'] 	= $identities[$_SERVER['HTTP_HOST']]['FACEBOOK_APP_ID'];
	$config['secret'] = $identities[$_SERVER['HTTP_HOST']]['FACEBOOK_SECRET'];
	$facebook = new facebook($config);
	$fb_cookie = $facebook->get_facebook_cookie();
	
}

?>