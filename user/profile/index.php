<?

$user = users::get();

?><ul class="menu">
	<li><?=hlink('Perfil','/profile/')?></li>
	<li><?=hlink(lang('Imágen'),'/profile/picture/')?></li>
	<li><?=hlink('Competidor','/profile/biker/')?></li>
	<li><?=hlink('Fotografo','/profile/photographer/')?></li>
</ul>
<div class="interface">
<? if($_POST['update']) echo '<h2>'.lang('Datos actualizados con éxito').'</h2>'; ?>

<form method="post">

<? include content::sector(); ?>
  
  <input type="submit" name="update" value="<?=lang('Actualizar datos')?>" />
  
</form>
</div>