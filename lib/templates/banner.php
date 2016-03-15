<?
if(isset($_GET['del'])) {
	$sql='DELETE FROM images WHERE img="'.$_GET['del'].'"';
	mysql_query($sql,$link);
	delFile($_GET['del'],'images/banner/');
}

if(isset($_POST['saveBanner'])){
	$sql='INSERT INTO images (img,path,position,properties1) VALUES ("'.saveFoto($_FILES['banner'],'images/banner',200).'","images/banner","banner","'.$_POST['web'].'")';
	mysql_query($sql,$link);
}
?>
<div class="box">
	<div class="boxTitle"><?=lang('Manage your Banners')?></div>
  <form action="?<?=$alink?>" method="post" enctype="multipart/form-data">
		<?=lang('Upload a new Banner')?><br>
    <input name="banner" type="file" class="standartFormular" /><br>
    <?=lang('Link for the banner')?><br>
    http://<input name="web" type="text" class="standartFormular"><br><br>
    <input name="saveBanner" type="submit" class="standartFormular" value="<?=lang('Load')?> Logo" />
  </form>
  <?
  $sql='SELECT * FROM images WHERE position="banner"';
	$result=mysql_query($sql,$link);
	while($row = mysql_fetch_array($result)){
		echo '<a href="?'.$alink.'&del='.$row['img'].'"><img src="images/banner/'.$row['img'].'" class="image" style="margin:5px;" title="'.lang('Click here to delete').'"></a>';
	}
	?>
</div>