<?
if($_POST['adminSendLang']) sql_update('lang',FALSE,'lID');
if($_POST['adminSendLang']) die;

if($_POST['del']) sql('DELETE FROM lang WHERE lID="'.$_POST['lID'].'"');
if($_POST['del']) die;

if($_POST['addLanguage']){
	sql_insert('page');
	//echo $_POST['pageLang'];
	sql('ALTER TABLE `lang` ADD `'.$_POST['pageLang'].'` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL');
}

$menu = sql('SELECT pageID,pageLang,pageLangTitle FROM page');

?>
<h1><?=lang('Languages')?></h1>

<?
if(resource::action()=='add'){ ?>

  <form method="post">
		<dl>
			<dt><?=lang('Language')?></st>
			<dd><input name="pageLangTitle" type="text" /></dd>
			<dt><?=lang('Language code')?> (2)</dt>
			<dd><input name="pageLang" type="text" /></dd>
		</dl>
		
		<input name="addLanguage" type="submit" value="Submit" />
		
  </form>
  <?
}


if(resource::action()!='add'){ ?>

<?

if(resource::variable()) {
	
	include('translate.php');
	
} else {

	$language = sql('SELECT * FROM page WHERE pageLang="' . resource::action() . '" LIMIT 1');

?>
	<h2><?=lang('General information about the web site optimize for searchers')?></h2>
	<form method="post">

		<input type="submit" name="saveLanguage" />

		<dl>
			<dt><?=lang('Web title')?></dt>
			<dd><input type="text" name="pageTitle" value="<?=$language['pageTitle']?>" /></dd>
			<dt><?=lang('Language')?></dt>
			<dd><input type="text" name="pageLangTitle" value="<?=$language['pageLangTitle']?>" /></dd>
			<dt><?=lang('Language code (2)')?></dt>
			<dd><input type="text" name="pageLang" value="<?=$language['pageLang']?>" /></dd>
			<dt><?=lang('Website for language')?> (<?=lang('Empty recommended')?>)</dt>
			<dd><input name="web" type="text" value='<?=$language['web']?>' /></dd>
			<dt><?=lang('Page content title')?></dt>
			<dd><textarea name="pageContentTitle"><?=$language['pageContentTitle']?></textarea></dd>
			<dt><?=lang('Page description')?></dt>
			<dd><textarea name="pageDescription"><?=$language['pageDescription']?></textarea><dd>
			<dt><?=lang('Key words')?></dt>
			<dd><textarea name="pageKeyWords"><?=$language['pageKeyWords']?></textarea><dd>
		</dl>

		<input type="submit" name="saveLanguage" />

	</form>
<? }
}
?>