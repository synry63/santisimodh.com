<table>
	<tr>
		<th>ID</th>
		<th>type</th>
		<th>Cronjob</th>
		<th>Info</th>
		<th>code / user</th>
		<th>date</th>
		<th></th>
	</tr>
	<? foreach($cronjob as $key => $value) { ?>
	<tr>
		<td><?=$value['ID']?></td>
		<td><?=$value['type']?></td>
		<td><?=$value['cronjob']?></td>
		<td><?=$value['info']?></td>
		<? 
		$u = users::get($value['code']);
		if ($u){
		?>
		<td><a href="/users/edit/<?=users::code2ID($value['code'])?>/"><?=$u['name']?> <?=$u['last-name']?></a></td>
		<? } else { ?>
		<td><?=lang('No User to this cron')?></td>
		<? }?>
		<td><?=$value['date']?></td>
		<td><a class="button" href="/cronjob/delete/<?=$value['ID']?>/"><?=lang('Delete')?></a></td>
	</tr>
	<? } ?>
	
</table>