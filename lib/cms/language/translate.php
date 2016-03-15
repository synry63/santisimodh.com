<?
if($_POST['change']){
	$sql='UPDATE lang SET langPage="'.$_POST['page'].'" WHERE lID="'.$_POST['langActive'].'"';
	mysql_query($sql,$link);
}

global $lang;

$language = sql('SELECT * FROM page WHERE pageLang="' . resource::action() . '" LIMIT 1');

	
?>
<h2><?=lang('Web content in')?> "<?=$language['pageLangTitle']?>"</h2>
<table border="0" cellspacing="5" cellpadding="0" width="100%">
<?

$option = (resource::variable()=='all') ? '' : 'WHERE langPage="'.resource::variable().'"' ;

$entries = sql('SELECT * FROM lang '.$option.' ORDER BY ' . resource::action() . ' ASC');

foreach($entries as $key => $row){

?>
<form method="post" target="ajax" id="form<?=$row['lID']?>">
  <tr>
    <td>
    	<span title="Original text: <?=$row['langID']?> (ID - <?=$row['lID']?>)">
				<? echo ($row[$lang]) ? $row[$lang] : $row['langID']; ?>
    	</span>
      <a name="<?=$row['lID']?>"></a>
    </td>
  </tr>
  <tr>
  <td>
  <textarea name="<?=resource::action()?>" onclick="document.getElementById('submit<?=$row['lID']?>').value='<?=lang('Save')?>';" ><?=$row[resource::action()]?></textarea>
  </td>
  </tr>
  <tr>
    <td>
    <input name="adminSendLang" type="submit" value="<?=lang('Save')?>" id="submit<?=$row['lID']?>" onclick="document.getElementById('submit<?=$row['lID']?>').value='<?=lang('Saved')?>';">
    <input name="del" type="submit" value="<?=lang('Delete')?>" id="del<?=$row['lID']?>" onclick="document.getElementById('form<?=$row['lID']?>').style.display='none';document.getElementById('del<?=$row['lID']?>').value='<?=lang('Deleted')?>';">
    <input name="lID" type="hidden" value="<?=$row['lID']?>">
    <input name="adminSendLang" type="submit" value="<?=lang('Change to:')?>">
    <select name="langPage">
    <?
      foreach($pages as $k => $row2){
      if($row['langPage']==$row2['langPage']){
        $selected = 'selected="selected"';
      } else {
        $selected = '';
      }
    ?>
    	<option <?=$selected?>><?=$row2['langPage']?></option>
    <? } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><hr></td>
  </tr>
</form>
<? } ?>
</table>