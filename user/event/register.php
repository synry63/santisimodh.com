<?
	
if($_POST['accept-rules'] and $validation){

	foreach($validation as $k => $v){
		
		echo '<h2>'.lang('Has olvidado escribir datos').': '.$v.'</h2>';
		
	}

}

?>
<h2><?=lang('Para la incripción es necesario que aceptes el reglamento del Santisimo DH')?></h2>

<?=form::start()?>
  
  <? include 'user/profile/yes-biker.php'; ?>
  
  <?=lang('* Campos obligatorios')?><br />
  
  <input type="submit" value="<?=lang('Leí y acepto el reglamento del Santisimo Downhill')?>" name="accept-rules" />
  
<?=form::finish()?>

<br /><br /><br />

<?=nl2br($info['rules'])?>