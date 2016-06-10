<?php

$info = sql('SELECT * FROM currency WHERE ID = "' . resource::action() . '" LIMIT 1');

$l = lang::get();

?>

<form method="post">

	<dl>
  
  	<dt><?=lang('Name')?></dt>
    <dd><input type="text" value="<?=$info['name']?>" name="name"></dd>
    
  	<dt><?=lang('Short')?></dt>
    <dd><input type="text" value="<?=$info['short']?>" name="short"></dd>
    
  	<dt><?=lang('Value')?></dt>
    <dd><input type="text" value="<?=$info['value']?>" name="value"></dd>
    
  	<dt><?=lang('Symbol')?></dt>
    <dd><input type="text" value="<?=$info['symbol']?>" name="symbol"></dd>
    
  	<dt><?=lang('Language')?></dt>
    <dd>
    	<select name="language">
      	<option value=""><?=lang('None')?></option>
      	<? foreach($l as $key => $value) { ?>
        <option value="<?=$key?>" <?=selected($info['language'],$key)?> ><?=$value?></option>
        <? } ?>
      </select>
    </dd>
 
  </dl>
  
  <input type="submit" name="update">

</form>