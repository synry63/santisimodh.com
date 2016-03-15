<?
if($_POST['saveWarning']) {
	$sql='INSERT INTO warning (text,activo) VALUES ("'.$_POST['text'].'","0")';
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

<a href="#" class="adminMenuLine" onclick="MM_showHideLayers('new','','show')"><?=lang('Add a new Warning-Note')?></a>
<div id="new" class="box" style="visibility:hidden; position:absolute; padding:10px;">
  <form action="" method="post">
    <?=doSimpleForm('','text','',60)?><br />
    <input name="saveWarning" type="submit" class="standartFormular" value="<?=lang('Save')?>" /> <a href="#" onclick="MM_showHideLayers('new','','hide')"><?=lang('Close')?></a>
  </form>
</div>
<div class="box">
  <div class="boxTitle"><?=lang('List from notes on the website')?></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td><?=lang('Messaje')?></td>
    <td>Date</td>
    <td>Status</td>
</tr>

<?
	$sql='SELECT * FROM warning';
	$result=mysql_query($sql,$link);
	while($row = mysql_fetch_array($result)){ ?>
  <tr>
    <td><a href="#" class="linkColum1"><?=$row['text']?></a></td>
    <td></td>
    <td>
    	<form action="?<?=$alink?>" method="post">
      	<input name="saveWarning" type="submit" class="standartFormular" value="<?=lang('Activate')?>" />
      </form>
    </td>
  </tr>
<?	}
?>
</table>
<br />
</div>
