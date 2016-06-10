<?php
$menu[] = '- - -';
//sort($menu);
?>
<h2>
	<?=lang('Page Information for')?> /<? echo ($info['pagesTitle']) ? $info['pagesTitle'] : $info['pagesAdresse'];?>/
  	<input class="right" type="submit" value="<?=lang('Delete Page')?>" name="delete-Page" >
</h2>

<dl>
	<dt><?=lang('Direction')?> ($_GET)</dt>
  <dd><input type="text" name="pagesAdresse" value="<?=$info['pagesAdresse']?>"></dd>
	<dt><?=lang('Nombre')?></dt>
  <dd><input type="text" name="name" value="<?=lang::ID('name_'.resource::action().'_PAGES',$_SESSION['pages-language'])?>"></dd>
  <dt><?=lang('Title')?></dt>
  <dd><input type="text" name="title" value="<?=lang::ID('title_'.resource::action().'_PAGES',$_SESSION['pages-language'])?>"></dd>
  <dt><?=lang('Description')?></dt>
  <dd><input type="text" name="description" value="<?=lang::ID('description_'.resource::action().'_PAGES',$_SESSION['pages-language'])?>"></dd>
  <dt><?=lang('Key Words')?></dt>
  <dd><input type="text" name="keywords" value="<?=lang::ID('keywords_'.resource::action().'_PAGES',$_SESSION['pages-language'])?>"></dd>
  <dt><input type="hidden" name="home" value=""><input type="checkbox" name="home" value="1" <?=checked($info['home'],1)?>> <?=lang('Main Page')?></dt>
  <dt><input type="hidden" name="submenu" value=""><input type="checkbox" name="submenu" value="1" <?=checked($info['submenu'],1)?>> <?=lang('Show Navigation in content')?></dt>
  <dt><input type="hidden" name="menu" value=""><input type="checkbox" name="menu" value="1" <?=checked($info['menu'],1)?>> <?=lang('Menu')?><?=form::select('category',$menu,$info['category'])?></dt>
</dl>

<br /><br /><br />

<h2><?=lang('Content position')?></h2>

<ul class="content-position">
	
  <li class="content1">
    <p><?=form::radio('position-sector','1',$info['position-sector']) ?> OPTION 1 </p>
    <div>
      <span><?=lang('Content')?></span>
      <span><?=lang('Template')?></span>
    </div>
  </li>
  <li class="content2">
    <p><?=form::radio('position-sector','2',$info['position-sector']) ?> OPTION 2</p>
    <div>
      <span><?=lang('Content')?></span>
      <span><?=lang('Template')?></span>
    </div>
  </li>
  <li class="content3">
    <p><?=form::radio('position-sector','3',$info['position-sector']) ?> OPTION 3</p>
    <div>
      <span><?=lang('Template')?></span>
      <span><?=lang('Content')?></span>
    </div>
  </li>
  <li class="content4">
    <p><?=form::radio('position-sector','4',$info['position-sector']) ?> OPTION 4</p>
    <div>
      <span><?=lang('Template')?></span>
      <span><?=lang('Content')?></span>
    </div>
  </li>
  

</dl>

