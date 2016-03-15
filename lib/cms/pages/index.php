<?

if($_POST['submitPages']){
	
	$_POST['pagesID'] = resource::action();
	sql_update('pages',FALSE,'pagesID');
	
	
	if($_POST['pagesHome']==1){
		$sql='UPDATE pages SET pagesHome=0 WHERE pagesID!="'.resource::action().'"';
		mysql_query($sql,$link);
	}
}

if($_POST['deletePage']){
	
	sql('DELETE FROM pages WHERE pagesID="'.resource::action().'"');
	
}

$l = lang::get();

?>

<h1><?=lang('Pages')?></h1>
<div id="new" style="display:none;">
  <? include 'form-add.php';?>
</div>

<? if(is_numeric(resource::action())) {?>



<form method="post">
<?

$info = sql('SELECT * FROM pages WHERE ID="'.resource::action().'" LIMIT 1');

include 'form-information.php';

?>

	<input type="submit" value="<?=lang('Save')?>" name="save" />

</form>

<br /><br /><br />

<? echo '</div><div class="body clear">'; ?>

<form method="post">

<h2><?=lang('Content in')?> <?=doLang($_SESSION['pages-language'])?> <a class="button" href="/full/<?=resource::action()?>/<?=resource::variable()?>/"><?=lang('Fullscreen')?></a></h2>
<? include 'edit.php'; ?>

  <input type="submit" value="<?=lang('Save')?>" name="save" />

<? } ?>
</form>