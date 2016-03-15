<?php

$cronjob = sql('SELECT *, COUNT(ID) AS count FROM cronjob GROUP BY type');

?>
<table>
	<tr>
		<th></th>
		<th>type</th>
		<th></th>
	</tr>
	<? foreach($cronjob as $key => $value) { ?>
	<tr>
		<td><?=$value['count']?></td>
		<td><a href="/cronjob/type/<?=$value['type']?>/"><?=$value['type']?></a></td>
		<td><a class="button" href="/cronjob/deleteByType/<?=$value['type']?>/"><?=lang('Delete all')?></a></td>
	</tr>
	<? } ?>
	
</table>