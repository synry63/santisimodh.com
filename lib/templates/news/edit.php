<?

$form = new form();
$l = sql('SELECT pageLang,pageLangTitle FROM page');
foreach($l as $k => $v){
	$la[$v['pageLang']]=$v['pageLangTitle'];
}

if($_POST['edit_news']){
	echo 'done';
	$_POST['ID'] = resource::variable();
	sql_update('news');
	
}

$info = sql('SELECT * FROM news WHERE ID="'.resource::variable().'" LIMIT 1');

?>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
new nicEditor({fullPanel : true}).panelInstance('content');
});
</script>
<div>
<form action="<?=a(TRUE,TRUE,TRUE)?>" method="post">
<div>
	<?=lang('Title')?><input name="title" type="text" value="<?=$info['title']?>">
  <?=$form->select('lang',$la,$info['lang'],FALSE,FALSE);?>
</div>
<div><?=lang('Show')?><?=$form->checkbox('status',1,$info['status'])?></div>
<div><textarea id="content" name="content" style="width:750px; height:400px;"><?=$info['content']?></textarea></div>
<div><input type="submit" name="edit_news"></div>
</form>
</div>