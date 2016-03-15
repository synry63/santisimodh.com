<?

global $contactEmailRecipient;

// SET EMAIL
if(!$contactEmailRecipient){
	echo 'ERROR: NO EMAIL ADDRESS: $contactEmailRecipient';
}

if ($_POST['submitContact']){
				 
	$header ="From:". $_POST['name'] . " <".$_POST['email'].">\nReply-To:".$_POST['email']."\r\n";
	$header.="X-Mailer:PHP/".phpversion()."\r\n";
	$header.="Mime-Version: 1.0\r\n";
	$header.="Content-Type: text/html\r\n";	 
	
	
	mail($contactEmailRecipient,lang('Message from').' '.$_SERVER['HTTP_HOST'],$_POST['message'],$header);
	echo lang('Thank you').' '.$_POST['name'].' '.lang('for contacting us, be will be in touch soon.');
	//mail('santino@uhupi.com','Heute','hallo',$cabeceras);
} else {
?>
<form class="contact" id="contact" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
  <div><?=lang('Name')?>:</div>
  <div><input name="name" type="text" class="<?=$formular?>" /></div>
  <div><?=lang('E-Mail')?>:</div>
  <div><input name="email" type="text" class="<?=$formular?>" /></div>
  <div><?=lang('Message')?>:</div>
  <div>
  	<textarea name="message"></textarea>
  </div>
  <div><input name="submitContact" type="submit" class="<?=$formular?>" value="<?=lang('Send')?>" /></div>
</form>
<? } ?>