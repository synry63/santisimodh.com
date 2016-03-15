<?php

$info = sql('SELECT * FROM news WHERE ID = "'.resource::action().'" LIMIT 1');

?>

<form method="post">
  <dl>
    <dt>Titulo</dt>
    <dd><input name="title" value="<?=$info['title']?>" /></dd>
    <dd><textarea name="content"><?=$info['content']?></textarea></dd>
  </dl>
  
  <input type="hidden" value="<?=$info['ID']?>" name="ID" />
  <input type="submit" value="Guardar" name="save-news" />
  
</form>