<ul class="list">
	<? foreach(events::get() as $key => $value) { ?>
  <li>
  	<a href="/events/view/<?=content::href2address($value['title'])?>">
			<?=$value['title']?>
    	<img src="/images/images/<?=$value['image']?>" height="100" class="right" />
    </a>
  </li>
  <? } ?>
</ul>