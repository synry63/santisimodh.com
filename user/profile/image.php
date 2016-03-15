<img src="/images/users/<?=$user['image']?>" width="560" /><br /><br />
<form method="post">
	<input type="hidden" name="ID" value="<?=$user['ID']?>" />
	<input type="submit" name="delete-image" value="<?=lang('Foto löschen oder ändern')?>" />
</form>