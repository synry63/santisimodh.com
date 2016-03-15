<?php

$menu = lang::get();

$pages = sql('SELECT langPage FROM lang WHERE langPage!="" GROUP BY langPage ORDER BY langPage ASC');

?>
<ul>
	<li><?=hlink(lang('Configuration'),'/configuration/')?></li>
<?
echo '<li>'.hlink(lang('Add Language'),'/language/add/','Add a new language').'</li>';

foreach($menu as $key=>$value){
	echo '<li>'.hlink($value,'/language/'.$key.'/',lang('Choose').' '.$value).'</li>';
}

?>
<li><?=lang('Select page to translate')?></li>
<li>
	  <select name="page" size="10" onchange='location = this.value;'>
      <option <?=sele($_GET[langPage],'all')?> value="/language/<?=resource::action()?>/all/">All</option>
      <?
        foreach($pages as $key => $row){
      ?>
      <option <?=sele(resource::variable(),$row['langPage'])?> value="/language/<?=resource::action()?>/<?=$row['langPage']?>/" <?=$selected?>><?=$row['langPage']?></option>
  		<? } ?>
  </select>
</li>
<li><a href="/currencies/"><?=lang('Currency')?></a></li>
<li><a href="/language/clear/"><?=lang('Clear')?></a></li>
</ul>
