<?
if($_GET[action]=='del'){
	$sql='DELETE FROM visitors WHERE visitorID="'.$_GET[visitorID].'"';
	mysql_query($sql,$link);
}
if($_GET[action]=='block'){
	$sql='UPDATE visitors SET visitorBlock="1" WHERE visitorID="'.$_GET[visitorID].'"';
	mysql_query($sql,$link);
}
if($_GET[action]=='Desblock'){
	$sql='UPDATE visitors SET visitorBlock="" WHERE visitorID="'.$_GET[visitorID].'"';
	mysql_query($sql,$link);
}
$sql='SELECT count(*) as number FROM visitors';
$result=mysql_query($sql,$link);
while($row = mysql_fetch_array($result)){
$number=$row[number];
}
$sql='SELECT * FROM visitors ORDER BY visitorID DESC';
$result=mysql_query($sql,$link);
?>
<div class="box">
<div class="boxTitle"><?=lang('Lista de visitantes')?> (<?=$number?>)</div>
<table class="listing" border="0" cellpadding="0" cellspacing="5">
  <thead>
  <tr>
    <td>IP</td>
    <td>Country</td>
    <td>Date/Time</td>
    <td>Information</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </thead>
<? while($row = mysql_fetch_array($result)){
if($row[visitorBlock]==''){
	$blockLink = '<a href="?'.$alink.'&action=block&visitorID='.$row[visitorID].'">Bloquear</a>';
} else {
	$blockLink = '<a href="?'.$alink.'&action=Desblock&visitorID='.$row[visitorID].'">Desbloquear</a>';
}
?>
  <tr>
    <td><?=$row['visitorIP']?></td>
    <td><?=  international::countries(getCountry($row['visitorIP']))?></td>
    <td><?=date("d/m/Y H:i:s",strtotime($row[visitorDate]))?></td>
    <td><?=$row['visitorsExplorer']?></td>
    <td><a href="?<?=$alink?>&action=del&visitorID=<?=$row[visitorID]?>">Borrar</a></td>
    <td><?=$blockLink?></td>
  </tr>
<? } ?>
</table>
</div>