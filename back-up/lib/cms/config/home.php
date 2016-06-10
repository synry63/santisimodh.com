<?php

$info = sql('SELECT * FROM config');

?>

<h2><?=lang('Please do not change these parameters if you do no know what you are doing')?></h2>

<form method="post">

  <dl>
    <? foreach($info as $key => $value) { ?>
    <dt><?=lang($value['k'])?></dt>
    <dd><input name="<?=$value['k']?>" type="text" value="<?=$value['value']?>" /></dd>
    <? } ?>
  </dl>
  
  <input type="submit" name="edit-parameters" value="<?=lang('Edit parameters')?>" />

</form>