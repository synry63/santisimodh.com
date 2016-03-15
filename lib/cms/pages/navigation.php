<?php

$m = sql('SELECT * FROM pages ORDER BY pagesAdresse');
foreach ($m as $key => $value) $menu[$key] = $value['pagesAdresse'];
$l = lang::get();

?>

<ul>
	<li><?=hlink(lang('Pages'),'/pages/')?></li>
  <li><a onclick="document.getElementById('new').style.display='inherit';"><?=lang('New page')?></a></li>
  <? if(resource::variable()) { ?>
	<li>
		<?=lang('Choose language')?>
    <select name="page" size="3" onchange='location = this.value;'>
      <? foreach($l as $key => $value){ ?>
      <option value="/pages/<?=resource::action()?>/<?=$key?>/" <?=selected(resource::variable(),$key)?>><?=$value?></option>
      <? } ?>
    </select>
  </li>
  <? } ?>
  <li><?=lang('Choose a page to edit')?></li>
  <li>
  	<select name="page" size="10" onchange='location = this.value;'>
      <? foreach($menu as $key => $row){ ?>
      <option value="/pages/<?=$key?>/<?=$_SESSION['pages-language']?>/" <?=selected(resource::action(),$key)?>><?=$row?></option>
      <? } ?>
    </select>
  </li>
</ul>