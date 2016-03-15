<?
function inDateDay($select=FALSE,$name,$class=FALSE){
	$numbers = range(1,31);
	//echo date(m);
	
	$option = '<select name="'.$name.'" class="'.$class.'">';
	foreach($numbers as $day){
	
		$day = (strlen($day)<2 ? '0'.$day : $day);
		$selected = ($day==date(d) ? 'selected' : '');
		if($select) { $selected = ($day==$select ? 'selected' : ''); }
	
	$option.= '<option value="'.$day.'" '.$selected.'>'.$day.'</option>';
	}
	$option.= '</select>';
	
	return $option;
}

function inDateMonth($select=FALSE,$name,$class=FALSE){
	$numbers = range(1,12);
	//echo date(m);
	
	$option = '<select name="'.$name.'" class="'.$class.'">';
	foreach($numbers as $day){
	
		$day = (strlen($day)<2 ? '0'.$day : $day);
		$selected = ($day==date('m') ? 'selected' : '');
		if($select) { $selected = ($day==$select ? 'selected' : ''); }
		
		$option.= '<option value="'.$day.'" '.$selected.'>'.date('M',mktime(0,0,0,$day)).'</option>';
	}
		$option.= '</select>';
		
		return $option;
}

function inDateYear($select=FALSE,$name,$class=FALSE,$start,$end){
	$numbers = range($start,$end);
	//echo date(m);
	
	$option = '<select name="'.$name.'"  class="'.$class.'">';
	foreach($numbers as $day){
	
		$day = (strlen($day)<2 ? '0'.$day : $day);
		$selected = ($day==date(Y) ? 'selected' : '');
		if($select) { $selected = ($day==$select ? 'selected' : ''); }
	
		$option.= '<option value="'.$day.'" '.$selected.'>'.$day.'</option>';
	}
	$option.= '</select>';
	
	return $option;
}

function inDateHour($name,$class=FALSE,$start,$end,$choose=FALSE){
	$numbers = range($start,$end);
	//echo date(H);
	
	echo '<select name="'.$name.'" class="'.$class.'">';
	foreach($numbers as $day){
	
		$day = (strlen($day)<2 ? '0'.$day : $day);
		$selected = ($day==date(H) and $choose==FALSE ? 'selected' : '');
		$selected = ($day==$choose ? 'selected' : '');
	
		echo '<option value="'.$day.'" '.$selected.'>'.$day.'</option>';
	}
		echo '</select>';
}
function inDateMinute($name,$class=FALSE,$interval=FALSE,$choose=FALSE){
	$numbers = range(0,59);
	//echo date(i);
	
	//FALTA INTEVAL!!!!
	
	echo '<select name="'.$name.'"  class="'.$class.'">';
	foreach($numbers as $day){
	
		$day = (strlen($day)<2 ? '0'.$day : $day);
		
		$selected = ($day==date(i) and $choose==FALSE ? 'selected' : '');
		$selected = ($day==$choose ? 'selected' : '');
	
		echo '<option value="'.$day.'" '.$selected.'>'.$day.'</option>';
	}
		echo '</select>';
}

function pageLinks($classTitleDiv=FALSE,$classDiv=FALSE,$classTitle=FALSE,$classDescription=FALSE,$classLink=FALSE) {
	$link = $GLOBALS[link];

	include'templates/pageLinks.php';
	
}
function pageContact ($contactEmailRecipient,$class=FALSE,$formular=FALSE) {
	
	include 'templates/pages/contact.php';

}

function pageBook ($class=FALSE) {
	
	$link = $GLOBALS[link];
	$alink = $GLOBALS[alink];
	
	include 'templates/pages/guestBook.php';

}
function newsLetter ($class=FALSE) {
	$link = $GLOBALS['link'];
	include 'templates/newsletter.php';
}

function getCountry($ip_address){
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

function diaShow($img,$with=FALSE,$height=FALSE,$class=FALSE,$title=FALSE) {
	$diaShow = '<img id="setIMG_6565" name="setIMG_6565" width="'.$with.'" height="'.$height.'" src="'.$img.'" class="'.$class.'" title="'.$title.'" />';
	// LINK EXAMPLE <a target="_self" href="Javascript:fp_ShowImg(document['fpphoto_7595'],'500','','6565',6);"><img hspace="10" vspace="5" border="0" src="photogallery/photo00029145/Imagen%20006.jpg" id="fpphoto_7595" name="fpphoto_7595" lowsrc="Imagen%20006.jpg" width="100" height="75" title="" align="absmiddle" /></a>
	return $diaShow;
}

/* linkDiaShow($id,$img,$showWith=FALSE,$ShowHeight=FALSE,$with=FALSE,$height=FALSE,$title=FALSE) {
	$vinculo=' <a target="_self" href="Javascript:fp_ShowImg(document['.$id.'],'.$showWith.','.$ShowHeight.','6565',1);"><img hspace="0" vspace="0" border="0" src="'.$img.'" id="'.$id.'" name="'.$id.'" lowsrc="'.$img.'" width="'.$with.'" heigth="'.$heigth.'" title="'.$title.'" class="imagen" align="absmiddle" /></a>';
	return $vinculo;
} */

function writeMonth($number) {
	
			$sp=$_SESSION['language'];
			$link = $GLOBALS['link'];
	
	/* if(isset($_GET['admin'])) {
		$sql='SELECT adminLang FROM config LIMIT 1';
		$result=mysql_query($sql,$link);
		while($row = mysql_fetch_array($result)) {
			$sp=$row['adminLang'];
		}
	} */
	
	if($sp=='es') {
		$getMonth = array('01'=>'Enero',
											'02'=>'Febrero',
											'03'=>'Marzo',
											'04'=>'Abril',
											'05'=>'Mayo',
											'06'=>'Junio',
											'07'=>'Julio',
											'08'=>'Agosto',
											'09'=>'Septiembre',
											'10'=>'Octubre',
											'11'=>'Noviembre',
											'12'=>'Diciembre');
	}
	
	if($sp=='en') {
		$getMonth = array('01'=>'January',
											'02'=>'February',
											'03'=>'Marz',
											'04'=>'April',
											'05'=>'May',
											'06'=>'Juni',
											'07'=>'July',
											'08'=>'August',
											'09'=>'September',
											'10'=>'October',
											'11'=>'November',
											'12'=>'December');
	}
	
		if($sp=='de') {
		$getMonth = array('01'=>'Januar',
											'02'=>'Februar',
											'03'=>'M�rz',
											'04'=>'April',
											'05'=>'Mai',
											'06'=>'Juni',
											'07'=>'Juli',
											'08'=>'August',
											'09'=>'September',
											'10'=>'Oktober',
											'11'=>'November',
											'12'=>'December');
	}
	
	return $getMonth[$number];
	
}

function sele($lang,$x4) {
	if($x4==$lang){
		$selec = 'selected="selected"';
	} else {
		$selec = FALSE;
	}
	return $selec;
}

function selected($lang,$x4){
	return sele($lang,$x4);
}

function check($lang,$x4) {
	if($x4==$lang){
		$selec = 'checked="checked"';
	} else {
		$selec = FALSE;
	}
	return $selec;
}

function checked($lang,$x4){
	return check($lang,$x4);
}

?>