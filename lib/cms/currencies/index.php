<?php

$db['currency']['name']			= array('type' => 'VARCHAR');
$db['currency']['short']		= array('type' => 'VARCHAR');
$db['currency']['symbol']		= array('type' => 'VARCHAR');
$db['currency']['value']		= array('type' => 'VARCHAR');
$db['currency']['language']	= array('type' => 'VARCHAR');

sql_structure($db);

if($_POST['add']){
	
	sql_insert('currency');
	
}

if($_POST['update']){
	
	$_POST['ID'] = resource::action();
	sql_update('currency');
	
}

$menu = sql('SELECT * FROM currency');

?>

<h1><?=lang('Currency')?></h1>

<div id="add" style="display:none;">
	<form method="post">
  	<input type="text" name="name" />
    <input type="submit" name="add" />
  </form>
</div>

<ul class="navigation">
	<li><a onclick="document.getElementById('add').style.display='block';"><?=lang('New currency')?></a></li>
	<? foreach($menu as $key => $value){ ?>
  <li><a href="/currencies/<?=$value['ID']?>/"><?=$value['name']?></a></li>
  <? } ?>
</ul>

<div class="body">

<?
if(is_numeric(resource::action())){
	
	include 'edit.php';
	
}
?>

</div>
