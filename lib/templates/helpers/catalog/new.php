<?

$vars['limit'] = ($vars['limit']) ? $vars['limit'] : 3 ;

$products = sql('SELECT * FROM catalog WHERE status="1" ORDER BY ID DESC LIMIT '.$vars['limit']);
?>
<ul>
	<?
  		foreach ($products as $key => $value) {
				$img = sql('SELECT image FROM catalog_images WHERE product="'.$value['ID'].'" AND main="1" LIMIT 1');
	?>
	<li>
  		<a href="/catalog/<?=$value['category']?>/<?=$value['ID']?>/">
      	<span class="image"><?=image($img['image'],'images/catalog/')?></span>
				<span class="name"><?=$value['name']?></span>
  		</a>
  </li>
  <? } ?>
</ul>