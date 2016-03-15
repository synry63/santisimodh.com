<div class="<?=$classTitleDiv?>">Links</div>
<?
$sql='SELECT * FROM links WHERE linksShow=1';
$result=mysql_query($sql,$link);
while($row = mysql_fetch_array($result)){
?>
<div class="<?=$classDiv?>">
<div><a href="http://" class="<?=$classTitle?>" target="_blank">
				<?=lang($row['linksTitle'])?>
     </a></div>
<div class="<?=$classDescription?>"><?=lang($row['linksDescription'])?></div>
<div><a href="http://" class="<?=$classLink?>" target="_blank"><?=$row['linksLink']?></a></div>
</div>
<? } ?>