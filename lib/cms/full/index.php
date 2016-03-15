<?
global $root;

?>
<form method="post">
<? include $root.'/lib/admin/pages/edit.php'; ?>
<input type="submit" value="<?=lang('Save and Continue')?>"><input type="submit" value="<?=lang('Save and exit')?>">
</form>