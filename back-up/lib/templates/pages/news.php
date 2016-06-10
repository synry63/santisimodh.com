<?

$status = ($_SESSION['layout']=='backtend') ? '' : 'status="1" AND' ;

$titles = sql('SELECT ID,title,date FROM news WHERE '.$status.' (lang="'.$_SESSION['language'].'" OR lang="") ORDER BY date DESC LIMIT 015');

$show = (resource::action()) ? 'AND ID="'.resource::action().'"' : 'ORDER BY date DESC' ;

$info 	= sql('SELECT * FROM news WHERE '.$status.' (lang="'.$_SESSION['language'].'" OR lang="") '.$show.' LIMIT 1');

?>
<h1><?=hlink(lang('News'),a(TRUE))?></h1>
<? if($titles) { ?>
<ul class="navigation">
	<? foreach($titles as $key => $value){ ?>
  <li>
		<?=hlink($value['title'].'<h6>'.$value['date'].'</h6>',a(TRUE,$value['ID']))?>
    <? if($_SESSION['admin']) {?>
    <div>
    	<a href="<?=a(TRUE,'edit',$value['ID'])?>"><?=lang('Edit')?></a>
      <a href="<?=a(TRUE,'delete',$value['ID'])?>"><?=lang('Delete')?></a>
    </div>
    <? } ?>
  </li>
  <? } ?>
</ul>
<? } ?>
<? if($info) { ?>
<div>
  <div class="title"><?=$info['title']?></div>
  <h6><?=$info['date']?></h6>
  <div class="content"><?=$info['content']?></div>
</div>
<? } else {
			echo '<h1>'.lang('No news jet').'</h1>';
	 }
?>