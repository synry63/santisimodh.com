<?php


	function isMobile() {
			return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}

	if($_SESSION['module'] == 'pages' && config::ID('mobile-view') && isMobile()){

		if ($_SESSION['module'] != 'mobile') $_SESSION['module'] = 'mobile';

	}


?>