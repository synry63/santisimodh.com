<h2><?=lang('Eventos')?></h2>
<ul class="list">
	<? foreach(events::get() as $key => $value) { ?>
  	<li>
    	<a href="/event/<?=$value['ID']?>/"><div class="image" style="background-image:url('/images/images/<?=$value['image']?>');"></div></a>
			<h2><a href="/event/<?=$value['ID']?>/"><?=$value['title']?></a></h2>
      <dl>
      	<dt><?=lang('Fecha')?></dt>
        <dd><?=$value['day']?> <?=date('M',mktime(0,0,0,$value['month'],10))?> <?=$value['year']?></dd>
      </dl>
      <? if(events::userIsAllowed($value['ID'])) { ?><a class="button" href="/event/<?=$value['ID']?>/register/"><?=lang('Preinscribirse en este evento')?></a><? } ?>
    </li>
  <? } ?>
</ul>