<div class="album">
<?

$picture = sql('SELECT *, DATE_FORMAT(date, "%d %m %Y") as day FROM album WHERE ID="'.$_GET['show'].'" LIMIT 1');
$next		 = sql('SELECT ID FROM album WHERE folder="'.$picture['folder'].'" AND ID>"'.$_GET['show'].'" LIMIT 1');
$back 	 = sql('SELECT ID FROM album WHERE folder="'.$picture['folder'].'" AND ID<"'.$_GET['show'].'" ORDER BY ID DESC LIMIT 1');

$sub  = (isset($_GET['sub'])) ? $_GET['sub'] : $sub ;
$show = (isset($_GET['show'])) ? $_GET['show'] : $show ;

$pictures = sql('SELECT *, DATE_FORMAT(date, "%d %m %Y") as day FROM album WHERE folder="'.$sub.'"');
$filer		= sql('SELECT * FROM album_folder WHERE code!="'.$sub.'"');
$folder		= sql('SELECT *, DATE_FORMAT(date, "%d %m %Y") as day FROM album_folder WHERE code="'.$_GET['sub'].'" LIMIT 1');

if($TABULATOR==TRUE){

?>
  <div class="tabulator">
    <a href="?<?=$alink?>&page=album&sub=&show"><?=lang('Album')?></a>
    <? if($_GET['sub']) { ?> >> <a href="?page=album"><?=$folder['title']?></a><? } ?>
    <? if($_GET['show']) { ?> >> <a href="?page=album"><?=$picture['title']?></a><? } ?>
  </div>
<?
}
if($_GET['show']){
  ?>
  <div class="show">
    <a href="?<?=$alink?>&show=<?=$next['ID']?>">
      <img src="/images/album/<?=$picture['image']?>">
    </a>
    <span class="title"><?=$picture['title']?></span>
    <span class="date"><?=$picture['day']?></span>
    <span class="description"><?=$picture['description']?></span>
    <a href="?<?=$alink?>&show=<?=$back['ID']?>" class="back"><?=lang('Back')?></a>
    <a href="?<?=$alink?>&show=<?=$next['ID']?>" class="next"><?=lang('Next')?></a>
  </div>
<?
} else {
	//if($FOLDERS==TRUE){
?>
  <div class="albums">
    <div class="folder">
  <? foreach($filer as $key=>$value) {
      $ran = sql('SELECT * FROM album WHERE folder="'.$value['code'].'" ORDER BY RAND() LIMIT 1');
  ?>
    <a href="?<?=$alink?>&sub=<?=$value['code']?>">
      <img src="/images/album/<?=$ran['image']?>">
      <span class="title"><?=$value['title']?></span>
      <span class="date"><?=$value['day']?></span>
      <span class="description"><?=$value['description']?></span>
    </a>
  <? } ?>
    </div>
<? //} ?>
    <div class="images">
  <? foreach($pictures as $key=>$value) {?>
    <a href="?<?=$alink?>&show=<?=$value['ID']?>">
      <img src="/images/album/<?=$value['image']?>">
      <span class="title"><?=$value['title']?></span>
      <span class="date"><?=$value['day']?></span>
      <span class="description"><?=$value['description']?></span>
    </a>
  <? } ?>
  </div>
</div>
<? } ?>