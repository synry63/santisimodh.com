<?
if($_POST['newsLetterSubmit']) {
	$sql = 'INSERT INTO newsletterList (newsletterEmail,newsletterSP) VALUES ("'.$_POST['email'].'","'.$_SESSION['language'].'")';
	mysql_query($sql,$link);
}
?>
<form action="?<?=$_SERVER['QUERY_STRING']?>" method="post">
	<input name="email" type="text"  class="<?=$class?>" />
	<input name="newsLetterSubmit" type="submit" class="<?=$class?>" value="<?=lang('Subscribe')?>">
</form>