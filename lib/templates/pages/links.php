<?
$links = sql('SELECT *, linksID as ID FROM links WHERE category="'.resource::action().'"');
$categories = sql('SELECT ID,name FROM links_category WHERE name!=""');
//print_r($categories);
?>


<h1>
	<a href="<?=a(TRUE)?>"><?=lang('Links')?></a>
</h1>
<ul class="navigation">
<? foreach($categories as $key => $value){ ?>

	<li><?=hlink($value['name'],a(TRUE,$value['ID']))?></li>

<? } ?>
</ul>
<div class="link_content">
	<? foreach($links as $key => $value){ ?>
  
  <a href="<?=$value['link']?>" target="_blank">
    <?=$value['title']?>
    <h6><?=$value['link']?></h6>
    <h4><?=$value['description']?></h4>
  </a>
  <? if($_SESSION['admin']){ ?>
  <a href="<?=a(TRUE,'edit',$value['ID'])?>"><?=lang('Edit')?></a>
  <a href="<?=a(TRUE,'delete',$value['ID'])?>"><?=lang('Delete')?></a>
  <? } ?>
  <? } ?>
</div>