<?
if ($_GET[action]=='add'){
$postButton = '<input class="standartFormular" type="submit" value="Guardar nuevo" name="postContent" />';
}
if ($_GET[action]=='add' and $_POST){
	
	$updateSQL = array();
	foreach($context as $valor=>$titulo){
		$updateSQL[] = $valor;
	}
	
	$updateSQL = (count($updateSQL)>1) ? implode(', ',$updateSQL) : $updateSQL;
	
	$updateSQL2 = array();
	foreach($context as $valor=>$titulo){
		$updateSQL2[] = '"'.$_POST[$valor].'"';
	}
	
	$updateSQL2 = (count($updateSQL2)>1) ? implode(', ',$updateSQL2) : $updateSQL2;
	
	$sql='insert INTO '.$table.' ('.$updateSQL.') VALUES ('.$updateSQL2.')';
	mysql_query($sql,$link);
	echo '<br>';
	echo $sql;
}
if (isset($_POST['postContent']) and $_GET[action]=='edit') {
	
	$updateSQL = array();
	foreach($context as $valor=>$titulo){
		$updateSQL[] = $valor.'="'.$_POST[$valor].'"';
	}
	
	$updateSQL = (count($updateSQL)>1) ? implode(', ',$updateSQL) : $updateSQL;
	
	$sql='UPDATE '.$table.' SET '.$updateSQL.' WHERE '.$ID.'="'.$_GET[$ID].'"';
	mysql_query($sql,$link);
}

if (isset($_GET[$ID])) {
$sql='SELECT * FROM '.$table.' WHERE '.$ID.'="'.$_GET[$ID].'"';
$pageEditShow=mysql_query($sql,$link);
while($row = mysql_fetch_array($pageEditShow)){ 
//PostLink
if(isset($_GET[$ID]) and $edit==TRUE and $_GET[action]!=add) {
$postLink 	= $alink.'&action=edit';
$postButton = '<input class="standartFormular" type="submit" value="Editar" />';
}

if(isset($_GET[$ID]) and $_GET[action]=='edit' and $edit==TRUE) {
	$postLink 	= $alink.'&action=edit';
	$postButton = '<input class="standartFormular" type="submit" value="Guardar" name="postContent" />';
}

if($_GET[action]!='add'){
	$newButton  = '<input class="standartFormular" type="button" value="Agregar nuevo" onclick="location.href=\'?'.$alink.'&action=add\'" />';
?>
<form name="postContent" action="?<?=$postLink?>" method="post">
<table>
  <tr><td><?=$postButton?><?=$newButton?></td></tr>
  <? foreach ($context as $valor=>$titulo) { ?>
  <tr>
    <td><span class="registro"><?=$titulo?></span></td>
  </tr>
  <tr>
    <td><?=doShow($table,$ID,$_GET[action],$row,$valor,$class,$edit)?></td>
  </tr>
  <? } ?>
  <tr><td><?=$postButton?><?=$newButton?></td></tr>
</table>
</form>
<?
}
}
}
if ($_GET[action]=='add' and !$_POST) {
	$postLink		=	$alink;
?>
<form name="postContent" action="?<?=$postLink?>" method="post">
  <table>
    <tr><td><?=$postButton?></td></tr>
    <? foreach ($context as $valor=>$titulo) { ?>
    <tr>
      <td><span class="registro"><?=$titulo?></span></td>
    </tr>
    <tr>
      <td><?=doSimpleForm('',$valor)?></td>
    </tr>
    <? } ?>
    <tr><td><?=$postButton?></td></tr>
  </table>
</form>
<? } ?>