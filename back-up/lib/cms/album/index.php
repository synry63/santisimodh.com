<?php

$albums = sql('SELECT * FROM album GROUP BY folder');

?>
<h1><?=lang('Album')?></h1>
<ul class="navigation">
	<li><a><?=lang('Upload image')?></a></li>
  <? foreach($albums as $key => $value){ ?>
  <li><a><?=$value['folder']?></a></li>
  <? } ?>
</ul>