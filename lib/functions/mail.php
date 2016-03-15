<?php
function mailHTML($name,$from,$reply=FALSE,$mail,$subject,$template,$cc=FALSE,$bcc=FALSE,$variable=FALSE) {
	
	foreach($variable as $key){
		global $$key;
	}
	
	global $link;
	
	$header = ($name=='') ? $from : "From:". $name . " <".$from.">\r\n";
	$header.= ($reply) ? "Reply-To:".$reply."\r\n" : '' ;
	$header.= "X-Mailer:PHP/".phpversion()."\r\n";
	$header.= "Mime-Version: 1.0\r\n";
	$header.= "Content-Type: text/html\r\n";
	$header.= ($cc) ? "Cc: ".$cc."\r\n" : '' ;
	$header.= ($bcc) ? "Bcc: ".$bcc."\r\n" : '' ;
	
	if(file_exists('mail_templates/'.$template.'.php')){
		
		ob_start();  //startet Buffer
		
		@include('mail_templates/header.php');
		
		include('mail_templates/'.$template.'.php'); 
		
		@include('mail_templates/footer.php');//.php ist jetzt im Buffer
		
		$template = ob_get_contents();  //Buffer wird in $var geschrieben
		
		ob_end_clean();  //Buffer wird gelöscht
	
	}
	
	if($_GET['blank'] or $_GET['resourse']) {
	
		echo $template;
	
	}
	
	mail($mail,$subject,$template,$header);
}

?>