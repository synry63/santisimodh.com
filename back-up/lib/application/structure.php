<?php

//header('Content-Type: text/html; charset=UTF-8');

//$structure = new structure();
//
//if(!file_exists('.htaccess')) $structure->create_ini();
//if(!file_exists('robots.txt')) $structure->create_robots();
//if(!file_exists('sitemap.xml')) $structure->create_sitemap();
	

/////////////////////// FUNCTIONS /////////////////////////////
function createVarchar ($table,$items) {
	
	$link = $GLOBALS['link'];

	foreach($items as $cont) {
	$sql='ALTER TABLE '.$table.' ADD '.$cont.' VARCHAR( 255 ) NOT NULL';
	mysql_query($sql,$link);
	}
}


/////////////////////////// CONFIG FOLDERS ///////////////////////////////


$fol = array(	'functions',
							'functions/autoload',
							'pages',
							'controllers',
							'controllers/modules',
							'module',
							'cronjob',
							'plugins',
							'css',
							'images',
							'admin',
							'images/banner',
							'images/images',
							'images/users',
							'mail_templates',
							'images/album',
							'css/autoload',
							'css/modules',
							'images/catalog',
							'uploads',
							'prj',
							'js',
							'js/autoload',
							'js/autoload/module',
							'js/autoload/controller',
			);

foreach($fol as $inf) {
	$carpeta = './'.$inf.'/';
	if(!file_exists($carpeta)) {
		mkdir($inf);
	}
}

//////////////////////// IMAGES /////////////////////////////////

$DB['images']['image'] 	= array('type'=>'VARCHAR');
$DB['images']['page'] 	= array('type'=>'VARCHAR');
$DB['images']['autor'] 	= array('type'=>'VARCHAR');
$DB['images']['date'] 	= array('type'=>'DATE');

//////////////////////// USERS /////////////////////////////////

$DB['users']['code'] 							= array('type'=>'VARCHAR');
$DB['users']['name'] 							= array('type'=>'VARCHAR');
$DB['users']['last-name'] 				= array('type'=>'VARCHAR');
$DB['users']['email'] 						= array('type'=>'VARCHAR');
$DB['users']['password'] 					= array('type'=>'VARCHAR');
$DB['users']['country'] 					= array('type'=>'VARCHAR');
$DB['users']['type'] 							= array('type'=>'VARCHAR');
$DB['users']['position']					= array('type'=>'VARCHAR');
$DB['users']['image']							= array('type'=>'VARCHAR');
$DB['users']['language']					= array('type'=>'VARCHAR');
$DB['users']['birthday']					= array('type'=>'DATE');
$DB['users']['gender']						= array('type'=>'VARCHAR');
$DB['users']['id_number']					= array('type'=>'VARCHAR');
$DB['users']['about']							= array('type'=>'TEXT');
$DB['users']['status']						= array('type'=>'VARCHAR');
$DB['users']['last-visit']				= array('type'=>'VARCHAR');
$DB['users']['facebook']					= array('type'=>'VARCHAR');
$DB['users']['skype']							= array('type'=>'VARCHAR');

//////////////////////// PAGES /////////////////////////////////

$DB['pages']['pagesFile'] 			= array('type'=>'VARCHAR');
$DB['pages']['pagesAdresse']		= array('type'=>'VARCHAR');
$DB['pages']['menu'] 						= array('type'=>'VARCHAR');
$DB['pages']['category'] 				= array('type'=>'VARCHAR');
$DB['pages']['home'] 						= array('type'=>'VARCHAR');
$DB['pages']['submenu'] 				= array('type'=>'VARCHAR');
$DB['pages']['position-sector'] = array('type'=>'VARCHAR');

//////////////////////// CONFIG /////////////////////////////////

$DB['config']['k'] 				= array('type'=>'VARCHAR');
$DB['config']['value'] 		= array('type'=>'VARCHAR');


//////////////////////// SITEMAP /////////////////////////////////

$DB['sitemap']['url'] 		 = array('type'=>'VARCHAR');
$DB['sitemap']['query'] 	 = array('type'=>'VARCHAR');
$DB['sitemap']['title'] 	 = array('type'=>'VARCHAR');
$DB['sitemap']['language'] = array('type'=>'VARCHAR');

//////////////////////// LINKS /////////////////////////////////

$DB['links']['link']	 = array('type' => 'VARCHAR');
$DB['links']['status'] = array('type' => 'VARCHAR');
$DB['links']['image']	 = array('type' => 'VARCHAR');

//////////////////////// SEARCH /////////////////////////////////

$DB['search']['table']	= array('type' => 'VARCHAR');
$DB['search']['field']	= array('type' => 'VARCHAR');

//////////////////////// BLOG /////////////////////////////////

$DB['blog']['code']			= array('type' => 'VARCHAR');
$DB['blog']['parent']		= array('type' => 'VARCHAR');
$DB['blog']['title']		= array('type' => 'VARCHAR');
$DB['blog']['content']	= array('type' => 'TEXT');
$DB['blog']['date']			= array('type' => 'DATETIME');

//////////////////////// CRON JOB /////////////////////////////////

$DB['cronjob']['code']	 = array('type' => 'VARCHAR');
$DB['cronjob']['type']	 = array('type' => 'VARCHAR');
$DB['cronjob']['cronjob']= array('type' => 'VARCHAR');
$DB['cronjob']['info']	 = array('type' => 'TEXT');
$DB['cronjob']['date']	 = array('type' => 'DATETIME');

//////////////////////// COUNTRIES /////////////////////////////////

$DB['countries']['code'] = array('type' => 'VARCHAR');
$DB['countries']['en']	 = array('type' => 'VARCHAR');
$DB['countries']['de']	 = array('type' => 'VARCHAR');
$DB['countries']['es']	 = array('type' => 'VARCHAR');

////////////////////// PAGE /////////////////////////////////

//crea pgina principal
$sql='CREATE TABLE `page` (`pageID` smallint(4) NOT NULL auto_increment,
													 `pageLang` varchar(2) NOT NULL,
													 `pageLangTitle` varchar(64) NOT NULL,
													 `pageTitle` varchar(128) NOT NULL,
													 `pageContentTitle` varchar(128) NOT NULL,
													 `pageDescription` text NOT NULL,
													 `pageKeyWords` text NOT NULL,
													 	PRIMARY KEY  (`pageID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';
mysql_query($sql,$link);

$DB['page']['web']	 = array('type' => 'VARCHAR');



//Crea seccion para idiomas
$sql='CREATE TABLE `lang` (
									`lID` bigint(20) NOT NULL auto_increment,
									`langID` varchar(255) character set utf8 NOT NULL,
									`langPage` text collate utf8_bin NOT NULL,
									PRIMARY KEY  (`lID`)
) 
ENGINE=MyISAM  DEFAULT CHARSET=utf8
COLLATE=utf8_bin AUTO_INCREMENT=182';
mysql_query($sql,$link);


//crea el listado de páginas

$sql='CREATE TABLE `pages` (`ID` smallint(4) NOT NULL auto_increment,
													 `pagesAdresse` varchar(255) NOT NULL,
													 	PRIMARY KEY  (`pagesID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';
mysql_query($sql,$link);

//////////////////////// VISITORS ////////////////////////////////

$sql='CREATE TABLE `visitors` ( `visitorID` bigint(20) NOT NULL auto_increment,
																`visitorIP` varchar(128) NOT NULL,
																`visitorBlock` varchar(1) NOT NULL,
																`visitorDate` datetime NOT NULL,
																PRIMARY KEY  (`visitorID`))
																ENGINE=MyISAM
																DEFAULT CHARSET=utf8 AUTO_INCREMENT=4';
mysql_query($sql,$link);

$datos = array('visitorsExplorer');
createVarchar('visitors',$datos);

$sql='ALTER TABLE adminUsers 	ADD userNote 			text 					 NOT NULL AFTER userEmail';
mysql_query($sql,$link);


$sql='CREATE TABLE adminPages (adminPagesID TINYINT NOT NULL AUTO_INCREMENT,
															 adminPagesTitle VARCHAR( 20 ) NOT NULL,
															 adminPagesAdresse VARCHAR( 64 ) NOT NULL,
															 adminPagesDescription TEXT NOT NULL,
															 adminPagesDate TIMESTAMP NOT NULL,
															 PRIMARY KEY (adminPagesID)) ENGINE = MYISAM';
mysql_query($sql,$link);


///////////////////////// NEWSLETTER //////////////////////////

$sql='CREATE TABLE newsletter (newsletterID TINYINT NOT NULL AUTO_INCREMENT,
															 PRIMARY KEY (newsletterID)) ENGINE = MYISAM';
mysql_query($sql,$link);

$newsletterItemsVarchar = array('newsletterTitle'=>'newsletterID',
															  'newsletterContent'=>'newsletterTitle',
														 		'newsletterUser'=>'newsletterContent',
																'newsletterIMG'=>'newsletterUser',
																'newsletterSP'=>'newsletterIMG');

foreach($newsletterItemsVarchar as $cont => $after) {
	$sql='ALTER TABLE newsletter ADD '.$cont.' TEXT NOT NULL AFTER '.$after;
	mysql_query($sql,$link);
}

$sql = 'ALTER TABLE newsletter ADD newsletterDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP';
mysql_query($sql,$link);

$sql='CREATE TABLE newsletterList (newsletterListID TINYINT NOT NULL AUTO_INCREMENT,
															 PRIMARY KEY (newsletterListID)) ENGINE = MYISAM';
mysql_query($sql,$link);														 
															 
$newsletterItemsVarchar = array('newsletterEmail','newsletterSP');

foreach($newsletterItemsVarchar as $cont) {
	$sql='ALTER TABLE newsletterList ADD '.$cont.' VARCHAR( 255 ) NOT NULL';
	mysql_query($sql,$link);
}

$sql = 'ALTER TABLE newsletterList ADD newsletterDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP';
mysql_query($sql,$link);



/* mkdir('admin');
mkdir('admin/img'); */
/* $sql='CREATE TABLE propieties	()';

mysql_query($sql,$link); */

//echo $sql;

// contenido de paginas

/*$pagesDir = 'pages';
$pag 		= scandir($pagesDir);
foreach($pag as $pagFile){
	if(strrchr($pagFile,'.')=='.php') {
		$sql = 'SELECT count(*) as num FROM pages WHERE pagesFile="'.$pagFile.'"';
		$result = mysql_query($sql,$link);
		while($row = mysql_fetch_array($result)){ 
			$num = $row['num'];
		}
		if($num==0){
			$sql = 'INSERT INTO pages (pagesFile,pagesAdresse) VALUES ("'.$pagFile.'","'.$pagFile.'")';
			mysql_query($sql,$link);
		}
	}
}*/

/////////////////////////// TABLE WARNING //////////////////////////////


$sql='CREATE TABLE warning (ID BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY  (`ID`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';
mysql_query($sql,$link);

 $userAddItemsVarchar = array('text',
														 	'activo');
															
foreach($userAddItemsVarchar as $userType ) {

$sql='ALTER TABLE `warning` ADD `'.$userType.'` TEXT NOT NULL';
mysql_query($sql,$link);

}

/////////////////////////// TABLE NOTES //////////////////////////////


$sql='CREATE TABLE notes (ID BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY  (`ID`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';
mysql_query($sql,$link);

 $userAddItemsVarchar = array('title','text','autor');
															
foreach($userAddItemsVarchar as $userType ) {

$sql='ALTER TABLE `notes` ADD `'.$userType.'` TEXT NOT NULL';
mysql_query($sql,$link);

}

$sql = 'ALTER TABLE notes ADD date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP';
mysql_query($sql,$link);



$sql='CREATE TABLE notetouser (ID BIGINT NOT NULL AUTO_INCREMENT, PRIMARY KEY  (`ID`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0';
mysql_query($sql,$link);

 $userAddItemsVarchar = array('note','user');
															
foreach($userAddItemsVarchar as $userType ) {

$sql='ALTER TABLE `notetouser` ADD `'.$userType.'` TEXT NOT NULL';
mysql_query($sql,$link);

}

$sql='SELECT COUNT(*) as co FROM page';
$result = mysql_query($sql,$link);
while($row = mysql_fetch_array($result)){
	$co=$row['co'];
}

if($co==0) {
	$sql='INSERT INTO page (pageLang,pageLangTitle) VALUES ("'.$lang.'","'.$lang.'")';
	mysql_query($sql,$link);
	$sql='ALTER TABLE lang ADD '.$lang.' TEXT NOT NULL';
	mysql_query($sql,$link);
}

sql_structure($DB);

//////////////////////// IMPORT /////////////////////////////////

//////////////////////// COUNTRIES /////////////////////////////////

$data = sql('SELECT * FROM countries');

if (!$data) {

	$countries = new import_countries();

	$en = $countries->countries('en');

	foreach($en as $key => $value) {

		$vars['code'] = $key;
		$vars['en'] = fix($value);

		sql_insert ('countries', $vars);

	}
	
	unset($vars['en']);

	$de = $countries->countries('de');

	foreach($de as $key => $value) {

		$vars['code'] = $key;
		$vars['de'] = $value;

		sql_update ('countries', $vars, 'code');

	}
	
	unset($vars['de']);

	$es = $countries->countries('es');

	foreach($es as $key => $value) {

		$vars['code'] = $key;
		$vars['es'] = $value;

		sql_update ('countries', $vars, 'code');

	}
	
	unset($vars['es']);

}

header('Location: /');

?>