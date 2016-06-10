<?php

$i = sponsors::get($_GET['section']);

?>

<?=form::start()?>

	<dl>
  	<dt>Name</dt>
    <dd><input type="text" name="name" value="<?=$i['name']?>" /></dd>
  	<dt>Link</dt>
    <dd>http://<input type="text" name="link" value="<?=$i['link']?>" /></dd>
  	<dt><?=fix('Descripction')?></dt>
    <dd><textarea name="description"><?=$i['description']?></textarea></dd>
  </dl>
  
  <input type="hidden" name="ID" value="<?=$i['ID']?>" />
  <input type="submit" name="update-sponsor" value="Guardar" />

<?=form::finish()?>

<h2>Imagen</h2>

<form method="post" enctype="multipart/form-data">
	
	<?=form::image($i['image'],'image','images','Subir img')?>
  
  <input type="hidden" name="ID" value="<?=$i['ID']?>" />

</form>