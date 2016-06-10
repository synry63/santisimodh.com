<?php

$product = sql('SELECT * FROM catalog WHERE ID="'.resource::variable().'" AND status="1" LIMIT 1');
$images = sql('SELECT * FROM catalog_images WHERE product="'.resource::variable().'"');

$album = new album();
?>
<div class="product">
	<div class="images">
  <? foreach($images as $key=>$value) {?>
  	<a href="/images/catalog/<?=$value['image']?>" rel="show"><img src="/images/catalog/<?=$value['image']?>" /></a>
  <? } ?>
  </div>
	<h1><?=$product['name']?></h1>
  <div class="description"><?=$product['description']?></div>
  <div class="price"><?=$product['price']?></div>
</div>