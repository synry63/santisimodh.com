<?
if(isset($_POST['accept'])) {
	$sql='UPDATE guestBook SET status="1" WHERE ID="'.$_POST['ID'].'"';
	$result=mysql_query($sql,$link);
}

if(isset($_POST['delete'])) {
	$sql='DELETE FROM guestBook WHERE ID="'.$_POST['ID'].'" LIMIT 1';
	$result=mysql_query($sql,$link);
}


include('pages/guestBookForm.php');

$sql='SELECT * FROM guestBook WHERE status=""';
$result=mysql_query($sql,$link);
while($row = mysql_fetch_array($result)){
?>
<div>
	<div>
 		<strong><?=$row['name']?></strong> (<?=$row['email']?>)
  </div>
  <div>
  	<?=$row['text']?><br />
    <?=$date?>
  <form action="/guestBook/" method="post">
  	<input name="ID" type="hidden" value="<?=$row['ID']?>" />
    <input name="accept" class="standartFormular" value="<?=lang('Post on the Web')?>" type="submit">
    <input name="delete" class="standartFormular" value="<?=lang('Delete')?>" type="submit">
  </form>
  </div>
</div>
<hr />
<?
}
?>