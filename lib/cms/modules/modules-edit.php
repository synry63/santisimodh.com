<?php

if($_POST){
	
	$_POST['adminPagesID'] = resource::action();
	sql_update('adminPages',FALSE,'adminPagesID');
	echo lang('Changes made');
}

$info = sql('SELECT * FROM adminPages WHERE adminPagesID="'.resource::action().'" LIMIT 1');

?>

<form action="/pages/<?=resource::action()?>/" method="post">

	<dl>
  	<dt><?=lang('Title')?></dt>
    <dd><input type="text" name="adminPagesTitle" value="<?=$info['adminPagesTitle']?>"></dd>
  	<dt><?=lang('Address')?></dt>
    <dd><input type="text" name="adminPagesAdresse" value="<?=$info['adminPagesAdresse']?>"></dd>
  	<dt><?=lang('Description')?></dt>
    <dd><textarea name="adminPagesDescription"><?=$info['adminPagesDescription']?></textarea></dd>
  </dl>
  
  <input type="submit">

</form>