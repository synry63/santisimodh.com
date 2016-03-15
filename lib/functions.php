<?

$errors = array('â€œ'=>'"',
								'â€'=>'"',
								'Ã"'=>'&Auml;', //Ä
								'Ä'=>'&Auml;', //Ä
								'ï¿½'=>'&auml;', //ä
								'ä'=>'&auml;', //ä
								'Ã¤'=>'&auml;', //ä
								'Ã–'=>'&Ouml;', //Ö
								'Ö'=>'&Ouml;', //Ö
								'Ã¶'=>'&ouml;', //ö
								'ö'=>'&ouml;', //ö
								'Ã¼'=>'&uuml;', //ü
								'ü'=>'&uuml;', //ü
								'Ãœ'=>'&Uuml;', //Ü
								'Ã±'=>'&ntilde;', //ñ
								'ñ'=>'&ntilde;', //ñ
								'ÃŸ'=>'&szlig;', //ß
								'ß'=>'&szlig;', //ß
								'Â¿'=>'&iquest;', //¿
								'¿'=>'&iquest;', //¿
								'Ã¡'=>'&aacute;', //á
								'á'=>'&aacute;', //á
								'Ã©'=>'&eacute;', //é
								'é'=>'&eacute;', //é
								'Ã­'=>'&iacute;', //í
								'í'=>'&iacute;', //í
								'Ã³'=>'&oacute;', //ó
								'ó'=>'&oacute;', //ó
								'Ãº'=>'&uacute;', //ú
								'ú'=>'&uacute;', //ú
								'Ãš'=>'&Uacute;', //Ú
								'Ú'=>'&Uacute;', //Ú
								'â‚¬'=>'&euro;', //€
								'€'=>'&euro;', //€
								'Â¡'=>'&iexcl;', //¡
								'Ãœ'=>'Ü',
								'Â'=>'', //
								'Ãœ' =>'Ü',
								'Ã‘'=>'Ñ',
								//'&'=>'&amp;', //&
);
		

include('functions/sql.php');
include('functions/image.php');
include('functions/countries.php');
include('functions/languages.php');
include('functions/mail.php');
include('functions/tools.php');

// ADD CLASSES FROM PROJECT

$dir = 'functions';
$ph 		= scandir($dir);
foreach($ph as $k => $pfile){
	if(strrchr($pfile,'.')=='.php') {
		include $dir.'/'.$pfile;
	}
}

function ref($page,$sector,$section){
	
	$ref = '/';
	$ref.= (resource::controller()!='') ? resource::controller().'/' : '/';
	$ref.= (resource::action()!='')  ? resource::action().'/' : '/';
	$ref.= (resource::variable()!='') ? resource::variable().'/' : '/';
	
	return $ref;

}

// SHOWS CONTENT AS A TEXT OR FORMULAR

function doShow($table,$ID,$action,$row,$valor,$class=FALSE,$edit) {
		
		if($class==''){ $class='standartFormular'; }
		
		if (!isset($action)) {
		
			$doFrom = $row[$valor].'<br />';
			echo $doFrom;
		}
		
		if ($action=='edit' and $edit==TRUE) {
			$sizeValor = strlen($row[$valor]);
			if ($sizeValor < 70){
			$doForm = '<input name="'.$valor.'" size="40" class="'.$class.'" type="text" value="'.$row[$valor].'"><br />';
			} 
			if ($sizeValor >  70){
				if($sizeValor > 255) {
					$editHtml = '<script language="javascript1.2">generate_wysiwyg("'.$valor.'");</script>';
				}
			$doForm = '<textarea name="'.$valor.'" id="'.$valor.'" class="'.$class.'" cols="30" rows="10">'.$row[$valor].'</textarea>'.$editHtml;
			}
			if(is_array($valor)){
				echo 'ahh';
			}
			echo $doForm;
		}
		
		if ($action=='add') {
		
			$doForm = '<input name="'.$valor.'" class="'.$class.'" type="text" value="'.$row[$valor].'"><br />';
			echo $doForm;
		}
		
}

function doSimpleForm($valor,$ID=FALSE,$class=FALSE,$size=50,$ifText=FALSE,$html=FALSE) {
	if(!$class){ $class='standartFormular'; }
	$sizeValor = strlen($valor);
		if ($sizeValor < 70 and $size!='text'){
				$doForm = '<input name="'.$ID.'" size="'.$size.'" class="'.$class.'" type="text" value="'.$valor.'">';
				} else {
					if($html=='1') {
						$editHtml = '<script language="javascript1.2">generate_wysiwyg("'.$ID.'");</script>';
					}
					if($size=='text'){
						$size = $ifText;
					}
				$doForm = '<textarea name="'.$ID.'" id="'.$ID.'" class="'.$class.'" cols="'.$size.'" rows="5">'.$valor.'</textarea>'.$editHtml;
				}
		echo $doForm;
}

// mostrar valor sin y con opcion de editar
function doShowSimple($valor,$ID=FALSE,$class=FALSE,$size=50){

//global $_GET['action'];

	if($_GET['action']=='edit'){
		doSimpleForm($valor,$ID,$class,$size);
	} else {
		echo $valor;
	}
}

// LANGUAGE

function lang($text,$page=FALSE) {
	
	//$lang = configuration::info();
	
	global $errors;
	global $lang;
	
	$text = utf8_decode($text);

	$atext = substr($text,0,255);
	
	$language = $_SESSION['language'];

	$exist = sql('SELECT '.$language.' FROM lang WHERE langID="'.$atext.'"');

	if (!$exist) {
		
		if(!resource::controller() and $page=='') $page = 'main';
		
		if(resource::controller() and $page=='') $page = resource::controller();
		
		if($_SESSION['module'] == 'admin') $page = 'admin';
		
		if($text) {
			
			$vars['langID'] = $atext;
			$vars['langPage'] = $page;
			$vars[$lang] = $text;
			sql_insert('lang', $vars);
		
		}
	
	}

	$t = sql('SELECT * FROM lang WHERE langID="'.$atext.'" LIMIT 1');
	//print_r($t);

	$show = ($t[$language]) ? $t[$language] : $t[$lang]  ;

	$show = nl2br(strtr($show,$errors));

	return $show;

}

function manageLang($sp) {
	$link = $GLOBALS[link];
	
	$sql='ALTER TABLE lang ADD '.$sp.' TEXT NOT NULL';
	mysql_query($sql,$link);

}

// visitantes

function visitors($plus=FALSE,$show=FALSE) {

global $link;

// INSERT INTO BD

$sql='SELECT count(*) AS co FROM visitors WHERE visitorIP="'.$_SERVER['REMOTE_ADDR'].'"';
$visitorsSearchMatch=mysql_query($sql,$link);
while($row = mysql_fetch_array($visitorsSearchMatch)){
	$block = $row['visitorBlock'];
	if($row['co']==0){
		$sql='INSERT INTO visitors (visitorIP,
																visitorDate,
																visitorsExplorer)
					VALUES							 ("'.$_SERVER['REMOTE_ADDR'].'",
																NOW(),
																"'.$_SERVER['HTTP_USER_AGENT'].'"
																)';
		mysql_query($sql,$link);
	}
}
	$sql='SELECT count(visitorID) as visitors FROM visitors';
	$visitorsCount=mysql_query($sql,$link);
	while($row = mysql_fetch_array($visitorsCount)){
		$visitors=$row['visitors'];
	}
/* echo $_SERVER['REMOTE_ADDR'];
echo $_SERVER['HTTP_X_FORWARDED_FOR']; */
	if($block=='1'){
	//	return die;
	//	die;
	}
	
	if($show==0){
	return '';
	} else {
	return $visitors + $plus;
	}
}


// mostrar menu de idioma en la página

function menuLang($class=FALSE) {
	global $alink;
	$sp=$GLOBALS['sp'];
	//echo $sp;
	$link = $GLOBALS[link];
	$sql='SELECT * FROM page WHERE pageLang!="'.$_SESSION['language'].'"';
	$result=mysql_query($sql,$link);
	while($row = mysql_fetch_array($result)){
		echo '<a href="?'.$alink.'&amp;sp='.$row['pageLang'].'" class="'.$class.'">'.$row['pageLangTitle'].'</a>';
	}
}

function doTime ($date,$zone= - 0) {
	
	return layout::doTime($date, $zone = 3600 * 7);
	
}

function hlink ($name,$hlink,$title=FALSE,$class=FALSE,$classOver=FALSE,$id=FALSE){
	
	$title = ($title) ? 'title="'.$title.'"' : FALSE ;
	$id		 = ($id) ? 'id="'.$id.'"' : FALSE ;
	
	$ref = (strstr($_SERVER['REQUEST_URI'],'/')=='') ? '?'.$_SERVER['QUERY_STRING'] : $_SERVER['REQUEST_URI'] ;
	$classOver = ($classOver==FALSE) ? 'active' : $classOver;
	
	$hlink = (strstr($hlink,'/')=='') ? '/'.$hlink : $hlink;
	
	$class = ($hlink==$ref or preg_match('/'.$hlink.'/',$ref)) ? $classOver : $class ;
	
	$back = '<a href="'.$hlink.'" class="'.$class.'" '.$id.' '.$title.' >'.$name.'</a>';
	
	return $back;

}

function fix($value){
	
	global $errors;
	
	$text = strtr($value,$errors);
	
	return $text;

}

?>