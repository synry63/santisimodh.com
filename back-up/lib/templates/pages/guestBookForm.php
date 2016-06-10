<?

$date = date('Y-m-d H:i:s');
if($guestBookShowDate==TRUE or isset($_GET['admin'])){
	$date = $_POST['ano'].'-'.$_POST['mes'].'-'.$_POST['dia'].' 12:00:00';
}

?>
<input type="button"
			 id="write"
			 value="<?=lang('Post on the Guestbook')?>"
       onclick="document.getElementById('guestbook').style.display='inherit';
											 document.getElementById('write').style.display='none';"
/>

<form id="guestbook" action="/guestBook/" method="post" style="display:none;">
<table border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?=lang('Name')?> <?=lang('and')?> <?=lang('Surname')?>:</td>
    <td><input name="name" type="text" value="<?=$_POST['name']?>" /></td>
    <td>
			<?=lang('E-Mail')?>:</td>
    <td><input name="email" type="text" value="<?=$_POST['email']?>" /></td>
  </tr>
  <tr>
    <td colspan="2"><input name="allow" type="checkbox" value="1" checked="checked"><?=lang('Allow others to write me an E-Mail')?></td>
    <td></td>
    <td><input name="showed" type="checkbox" value="1" checked="checked"><?=lang('Show E-Mail address')?></td>
  </tr>
<? if($guestBookShowDate==TRUE or isset($_GET['admin'])){ ?>
  <tr>
    <td><?=lang('Date')?>:</td>
    <td>
			<?=inDateDay('','dia','enc')?>.<?=inDateMonth('','mes','enc')?>.<?=inDateYear('','ano','enc','1997',date('Y'))?>
    </td>
  </tr>
<? } ?>
  <tr>
    <td colspan="4"><textarea name="text"><?=$_POST['text']?></textarea></td>
    </tr>
  <tr>
    <td colspan="4"><input name="submitBook" type="submit" value="<?=lang('Send')?>" /></td>
  </tr>
</table>
</form>