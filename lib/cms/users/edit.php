<?php

$info = users::ID($_GET['edit']);
$t = explode(',',$info['type']);
foreach($t as $key => $value) $type[$value] = $value ;

$types['active'] 				= 'Active';
$types['administrator'] = 'Administrator';
$types['webmaster'] 		= 'Webmaster';

?>

<h1><?=lang('Profile from')?> <?=$info['name']?> <?=$info['last-name']?></h1>

<form method="post">
  <dl>
    <dt><?=lang('Name')?></dt>
    <dd><input type="text" value="<?=$info['name']?>" name="name"></dd>
    <dt><?=lang('Lastname')?></dt>
    <dd><input type="text" value="<?=$info['last-name']?>" name="last-name"></dd>
    <dt><?=lang('E-mail')?></dt>
    <dd><input type="text" value="<?=$info['email']?>" name="email"></dd>
    <dt><?=lang('Password')?></dt>
    <dd><input type="text" value="<?=$info['password']?>" name="password"></dd>
    <dt><?=lang('Country')?></dt>
    <dd><?=form::select('country',international::countries(),$info['country'])?></dd>
    <dt><?=lang('Type')?></dt>
    <? foreach($types as $key => $value) { ?>
    <dd><input type="checkbox" value="<?=$key?>" <?=checked($type[$key],$key)?> name="type1[]"><?=$value?></dd>
    <? } ?>
    <? foreach($types as $key => $value) unset($type[$key]); ?>
    <dd>
    	<?=lang('Set others separate by ,<br />')?>
      <input type="text" value="<?=implode(',',$type)?>" name="rest" />
    </dd>
    <dt><?=lang('Position')?></dt>
    <dd><input type="text" value="<?=$info['position']?>" name="type"></dd>
  </dl>
  
  <input type="hidden" name="ID" value="<?=$info['ID']?>" />
  <input type="submit" name="submit-user" />
  
</form>