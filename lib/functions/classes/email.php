<?php

class email {
	
	
	function head($name,$email,$reply = FALSE,$cc = FALSE,$bcc = FALSE){
		
		$header = (!$name) ? $email : "From: ". $name ." <".$email.">\r\n";
		$header.= ($reply) ? "Reply-To:".$reply."\r\n" : '' ;
		$header.= "X-Mailer:PHP/".phpversion()."\r\n";
		$header.= "Mime-Version: 1.0\r\n";
		$header.= "Content-Type: text/html\r\n";
		//$header.= ($cc) ? "Cc: ".$cc."\r\n" : '' ;
		//$header.= ($bcc) ? "Bcc: ".$bcc."\r\n" : '' ;
		
		return $header;
		
	}
	
	
	function send($from,$to,$subject,$template) {
		
		$header = email::head($from['name'],$from['email'],$from['reply'],$to['cc'],$to['bcc']);
		
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
		
		mail($to['email'],$subject,$template,$header);
	
	}
		
}

?>