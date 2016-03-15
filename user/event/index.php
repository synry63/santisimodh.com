<?php

$info = events::get(resource::action());

$user = users::get();

?>

<img src="/images/images/<?=$info['image']?>" width="200" class="right" />

<?php

echo '<h1>'.$info['title'].'</h1>';

include content::section();

?>

<br /><br /><br />

<h2>Descripcion</h2>

<?=nl2br($info['description'])?>

<br /><br /><br />

<img src="/images/images/<?=$info['map']?>" />

<h2><?=lang('Participantes')?></h2>

<?php foreach($info['category'] as $category => $users){ ?>

<h3 class="clear"><?=fix(categories::get($category))?></h3>

<ul>
	<?php foreach($users as $key => $value) { $u = users::get($value['code']); ?>
	<li>
  	<div class="image" style="background-image:url('/images/users/<?=$u['image']?>')"></div>
		<h4><?=$u['name']?> <?=$u['last-name']?></h4>
    <h5><?=$u['team']?> - <?=international::countries($u['country'])?></h5>
  </li>
  <?php } ?>
</ul>

<?php } ?>