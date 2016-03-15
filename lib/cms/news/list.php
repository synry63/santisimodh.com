<?php

$news = sql('SELECT * FROM news');

?>
<h1>Noticias</h1>

<form method="post">
	<dl>
  	<dt>Titulo</dt>
    <dd><input name="title" type="text" /></dd>
    <dd><textarea name="content" id="content"></textarea></dd>
  </dl>
  
  <input type="submit" value="Crea nuevo" name="new-news" />
  
</form>

<table width="100%">
	<tr>
  	<th>Titulo</th>
  </tr>
  <? foreach($news as $key => $value){?>
  <tr>
  	<td><?=$value['title']?></td>
  	<td><a href="/news/<?=$key?>/">Editar</a></td>
  	<td><a href="/news/delete/<?=$key?>/">Eliminar</a></td>
  </tr>
  <? } ?>
</table>