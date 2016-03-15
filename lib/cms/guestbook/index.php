<?php

$l = lang::get();

?>

<h1>Guestbook</h1>
<ul class="navigation">
	<li><a onclick="document.getElementById('new').style.display='block';"><?=lang('New comment')?></a></li>
</ul>
<div class="body">

	<div id="new" style="display:none;">
  	<form method="post">
    	<dl>
      	<dt><?=lang('Name')?></dt>
        <dd><input type="text" name="name" /></dd>
      	<dt><?=lang('E-Mail')?></dt>
        <dd><input type="text" name="email" /></dd>
      	<dt><?=lang('Language')?></dt>
        <dd><?=form::select('language',$l)?></dd>
        <dt><?=lang('Comment')?></dt>
        <dd><textarea name="text"></textarea></dd>
      </dl>
      
      <input type="submit" name="new-comment" />
      
    </form>
  </div>
  
  <? include (is_numeric(resource::action())) ? 'edit.php' : 'list.php' ; ?>
  
</div>