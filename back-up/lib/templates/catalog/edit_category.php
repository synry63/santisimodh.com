<?php
if($_POST['editCategory']){
	$_POST['ID']=resource::variable();
	sql_update('catalog_category');
}

$data = sql('SELECT * FROM catalog_category WHERE ID="'.resource::variable().'" LIMIT 1');
?>

<div class="box">
<h1><?=lang('Edit category')?></h1>
<form action="/catalog/<?=resource::action()?>/<?=resource::variable()?>/" method="post">
	<?=lang('Name of the category')?>: <input name="name" value="<?=$data['name']?>">
  <?=lang('Category')?>:<?
	$selector = new html();
	$selector->catalog_selector($data['category']);
	?>
  <input type="submit" value="<?=lang('Send')?>" name="editCategory">
</form>
</div>