<?php

if (!layout::isAjax()) {

	if(!is_array($page)) $page = FALSE;

	//select parameters from database
	$design_info = sql('SELECT * FROM page WHERE pageLang="' . $_SESSION['language'] . '" LIMIT 1');

	$pages= sql('SELECT ID FROM pages WHERE pagesAdresse="' . resource::controller() . '.php" OR pagesAdresse="' . resource::controller() . '" LIMIT 1');

	$design_info['pageTitle'] = ($_SESSION['module']=='admin') ? 'Uhupi 2.0 '.$_SERVER['HTTP_HOST'] : $design_info['pageTitle'] ;

	$l = lang::get();  

	// PAGE DESCRIPTION
	$pageDescription = ($page['description']) ? $page['description'] : $design_info['pageDescription'] ;
	$p = lang::ID('description_'.$pages['ID'].'_PAGES');
	$pageDescription = ($p) ? $p : $pageDescription ;

	// PAGE KEYWORDS
	$pageKeywords = ($page['keywords']) ? $page['keywords'] : $design_info['pageKeyWords'];
	$k = lang::ID('keywords_'.$pages['ID'].'_PAGES');
	$pageKeywords = ($k) ? $k : $pageKeywords ;
	
	$jquery = array(
			'jquery.min.js' => 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/',
			'jquery-ui.min.js' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/',
	);

	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.1//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-2.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml"
				xmlns:fb="http://www.facebook.com/2008/fbml"
				xml:lang="<?=$_SESSION['language']?>"
				lang="<?=$_SESSION['language']?>"
				xsi:schemalocation="http://www.w3.org/1999/xhtml http://www.w3.org/MarkUp/SCHEMA/xhtml-rdfa-2.xsd"
	>
	<head>
	<title><?=page::title($page['title'],$page['title-show'])?></title>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
	<!--<meta http-equiv="content-type" content="text/html; charset=utf-8" />-->	
	<meta http-equiv="last-Modified" content="Thu, 14 Aug 2013 08:00:00 GMT" /> 
	<meta http-equiv="Content-Language" content="<?=$_SESSION['language']?>" />
	<meta name="language" content="<?=$_SESSION['language']?>" />
	<meta name="title" content="<?=$design_info['pageContentTitle']?>" />
	<meta http-equiv="title" content="<?=$design_info['pageContentTitle']?>"/>
	<meta name="description" content="<?=$pageDescription?>" />
	<meta name="keywords" content="<?=$pageKeywords?>" />
	<meta name="author" content="<?=config::ID('author')?>" />
	<meta name="owner" content="<?=config::ID('owner')?>" />
	<meta name="robot" content="all" />

	<?php

	// APPLE TOUCH BROWSER

	echo '<meta name="apple-mobile-web-app-capable" content="yes" />';
	echo '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';

	if (config::ID('apple-mobile-web-app-title')) {
		echo '<meta name="apple-mobile-web-app-title" content="' . config::ID('apple-mobile-web-app-title') . '">';
	}

	if (file_exists('images/apple-touch-icon.png')) {
		echo '<link rel="apple-touch-icon" href="/images/apple-touch-icon.png"/>';
	}

	if (file_exists('images/apple-touch-startup-image.png')) {
		echo '<link rel="apple-touch-startup-image" href="/images/apple-touch-startup-image.png" />';
	}

	echo head::meta();

	?>

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<?
	
	foreach($l as $key => $value) echo '<link rel="alternate" hreflang="'.$key.'" href="/lang/'.$key.'/" />';
	
	foreach ($jquery as $file => $address) {
		
		if (!file_exists('js/autoload/' . $file)) echo '<script type="text/javascript" src="' . $address . $file . '"></script>';
		
	}
	
	?>

	<?

	if($_SESSION['module']=='admin'){

		include('lib/css/style.php');
//		include(__DIR__ . '/../css/style.php');

	} else {

		head::css($page['css']);

	}

	echo head::js($page['js']);

	//include('javascript/javascript.php');

	?>
	<!-- END DESIGN :PHP!!! -->
	</head>
	<body class="<?=KEY?>">
	
	<? if (config::ID('iframe') or $_SESSION['module'] == 'admin') { ?>
	
		<iframe src="" name="ajax" style="display:none;"></iframe>

	<? } ?>
<?

// END OF IF isAjax
}

?>