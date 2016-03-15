<?php

$info = sql('SELECT * FROM guestbook WHERE ID = "' . resource::action() . '" LIMIT 1');

?>

<form method="post">
	<dl>
  	<dt><?=lang('Name')?></dt>
    <dd><input type="text" name="name" value="<?=$info['name']?>"></dd>
  	<dt><?=lang('E-Mail')?></dt>
    <dd><input type="text" name="email" value="<?=$info['email']?>"></dd>
  	<dt><?=lang('Language')?></dt>
    <dd><?=form::select('language',$l,$info['language'])?></dd>
  	<dt><?=lang('Comment')?></dt>
    <dd><textarea name="text"><?=$info['text']?></textarea></dd>
  </dl>
  <input type="hidden" value="<?=$info['ID']?>" name="ID">
  <input type="submit" name="edit-comment" />
</form>