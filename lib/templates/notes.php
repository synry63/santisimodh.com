<?
if($_POST['new']) {
	$sql='INSERT INTO notes (title,autor) VALUES ("'.$_POST['title'].'","'.$_SESSION['sessionUser'].'")';
	mysql_query($sql,$link);
	echo lang('New note saved');
}
if($_POST['save']) {
	$sql='UPDATE notes SET title="'.$_POST['title'].'",text="'.$_POST['text'].'" WHERE ID="'.$_GET['pageID'].'" LIMIT 1';
	mysql_query($sql,$link);
	echo lang('Note saved');
}
if($_POST['del']) {
	$sql='DELETE FROM notes WHERE ID="'.$_GET['pageID'].'"';
	mysql_query($sql,$link);
	echo lang('Note deleted');
}
if($_POST['share']) {
	$sql='INSERT INTO notetouser (note,user) VALUES ("'.$_GET['pageID'].'","'.$_POST['user1'].'")';
	mysql_query($sql,$link);
}
if($_POST['unshare']) {
	$sql='DELETE FROM notetouser WHERE note="'.$_GET['pageID'].'" and user="'.$_POST['user2'].'"';
	mysql_query($sql,$link);
}
?>
<script type="text/javascript">
<!--
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>

<a href="#" class="adminMenuLine" onClick="MM_showHideLayers('new','','show')"><?=lang('Add a new note')?></a>
<div id="new" style="visibility:hidden; position:absolute;" class="boxTitle">
	<form action="?<?=$alink?>" method="post">
  	<?=lang('Name from the new note')?>: <?=doSimpleForm('','title','',40)?>
    <input name="new" type="submit" class="standartFormular" value="<?=lang('Save')?>"> 
    <a href="#" onClick="MM_showHideLayers('new','','hide')"><?=lang('Close')?></a>
  </form>
</div>
<div class="colum1">
<div class="box">
	<div class="boxTitle"><?=lang('Your notes')?></div>
  <?
  	$sql='SELECT * FROM notes WHERE autor="'.$_SESSION['sessionUser'].'"';
		$result = mysql_query($sql,$link);
		while($row = mysql_fetch_array($result)){
	?>
  	<a href="?<?=$alink?>&pageID=<?=$row['ID']?>" class="linkColum1"><?=$row['title']?></a>
  <?
  	}
	?><br />
</div>
<div class="box">
	<div class="boxTitle"><?=lang('Share notes with you')?></div>
  <?
  	$sql='SELECT * FROM notetouser a, notes b WHERE (a.user="'.$_SESSION['sessionUser'].'" or a.user="0") and a.note=b.ID and b.autor!="'.$_SESSION['sessionUser'].'" GROUP BY b.title';
		$result = mysql_query($sql,$link);
		while($row = mysql_fetch_array($result)){
	?>
  	<a href="?<?=$alink?>&pageID=<?=$row['ID']?>" class="linkColum1"><?=$row['title']?></a>
  <?
  	}
	?><br />
</div>
</div>
<?
if($_GET['pageID']) {
?>
<div class="colum2">
<div class="box">
	<form action="?<?=$alink?>" method="post">
  <?
  $sql='SELECT * FROM notes WHERE ID="'.$_GET['pageID'].'" LIMIT 1';
	$result = mysql_query($sql,$link);
	while($row = mysql_fetch_array($result)){
		$title = $row['title'];
		$text	 = $row['text'];
		$autor = $row['autor'];
	}	
	?>
	<div class="boxTitle"><?=doSimpleForm($title,'title','',40)?></div>
  <div style="padding:5px; text-align:center;"><textarea name="text" cols="40" rows="25" class="standartFormular"><?=$text?></textarea>
  <input name="del" type="submit" class="standartFormular" value="<?=lang('Delete')?>">
  <input name="save" type="submit" class="standartFormular" value="<?=lang('Save')?>">
  </form>
<? if($autor==$_SESSION['sessionUser']) { ?>
  <form action="?<?=$alink?>" method="post">
  	<?=lang('Share it with')?>:
    <select name="user1" class="standartFormular">
    	<option value="0"><?=lang('Everybody')?></option>
    <?
    	$sql='SELECT * FROM adminUsers WHERE userLogin!="'.$_SESSION['sessionUser'].'"';
			$result = mysql_query($sql,$link);
			while($row = mysql_fetch_array($result)){
		?>
  	  <option value="<?=$row['userLogin']?>"><?=$row['userName']?> <?=$row['userLastName']?></option>
    <? } ?>
  	</select>
    <input name="share" type="submit" class="standartFormular" value="<?=lang('Share')?>">
    <br />
    <?=lang('Already shared with')?>:
    <select name="user2" class="standartFormular">
    	<option value="0"><?=lang('Everybody')?></option>
    <?
    	$sql='SELECT * FROM notetouser a, adminUsers b WHERE a.note="'.$_GET['pageID'].'" and a.user=b.userLogin';
			$result = mysql_query($sql,$link);
			while($row = mysql_fetch_array($result)){
		?>
  	  <option value="<?=$row['userLogin']?>"><?=$row['userName']?> <?=$row['userLastName']?></option>
    <? } ?>
  	</select>
    <input name="unshare" type="submit" class="standartFormular" value="<?=lang('Unshare')?>">
  </form>
<?  } ?>
  </div>
</div>
<?	
	}
?>