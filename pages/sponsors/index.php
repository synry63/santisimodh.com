<?

$sponsors = new sponsors;

?>

<h1><?=lang('Auspiciadores')?></h1>
<ul class="list">
	<? foreach($sponsors->get() as $key => $value) { ?>
	<li>
  	<img src="/images/images/<?=$value['image']?>" height="80" class="right" />
  	<a target="_blank" href="http://<?=$value['link']?>"><h2><?=$value['name']?></h2></a>
    <?=$value['description']?>
    <br class="clear" />
  </li>
  <? } ?>
</ul>
