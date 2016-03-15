<?php

$info = events::get(content::short2ID('events','title', resource::variable()));

?>

<img src="/images/images/<?=$info['image']?>" class="right" height="100" />

<h2><?=$info['title']?></h2>
<h3><?=$info['day']?> <?=date('M',mktime(0,0,0,$info['month'],10))?> <?=$info['year']?></h3>

<?=nl2br($info['description'])?>

<h2><?=lang('Competidores')?></h2>
<table>
	<? foreach($info['category'] as $key => $value) { ?>
	<tr>
  	<th colspan="5"><h3><?=fix(categories::get($key)) ?></h3></th>
  </tr>
	<tr>
  	<th><?=lang('Nombre')?></th>
  	<th><?=lang('País')?></th>
  	<th><?=lang('Equipo')?></th>
  </tr>
  <? foreach($value as $k => $v) { $u = users::get($v['code']); ?>
	<tr>
  	<td><?=$u['name']?> <?=$u['last-name']?></td>
  	<td><?=international::countries($u['country'])?></td>
  	<td><?=$u['team']?></td>
  </tr>
  <? } ?>
  <? } ?>

</table>