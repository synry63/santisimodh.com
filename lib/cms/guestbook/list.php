<?php

$comments = sql('SELECT * FROM guestbook');
$i = 1;

?>

<table width="100%">
  
  	<tr>
    	<th></th>
    	<th><?=lang('Name')?></th>
    	<th><?=lang('E-mail')?></th>
    	<th><?=lang('Date')?></th>
    	<th><?=lang('Show')?></th>
    </tr>
    
    <? foreach($comments as $key => $value) { ?>
    	<tr id="c_<?=$value['ID']?>">
      	<td><?=$i++?></td>
      	<th><?=$value['name']?></th>
      	<td><?=$value['email']?></td>
      	<td><?=$value['date']?></td>
      	<td>
          <form method="post" target="ajax">
            <input type="hidden" value="<?=$value['ID']?>" name="ID">
            <input type="hidden" value="" name="status">
            <input type="checkbox" name="status" value="1" onChange="submit()" <?=checked($value['status'],1)?>/>
        	</form>
        </td>
        <td><a href="/guestbook/<?=$value['ID']?>/"><?=lang('Edit')?></a></td>
        <td>
        	<form method="post" target="ajax">
        		<input type="hidden" value="<?=$value['ID']?>" name="ID">
            <input type="submit" name="delete-comment" value="<?=lang('Delete')?>" onClick="document.getElementById('c_<?=$value['ID']?>').style.display='none';" />
          </form>
        </td>
      </tr>
    <? } ?>
  
  </table>