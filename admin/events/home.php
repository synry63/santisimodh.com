<table>
	<tr>
  	<th>Titulo</th>
  	<th>Fecha</th>
  </tr>
  <? foreach(events::get() as $key => $value) { ?>
  <tr>
  	<td><a href="/events/edit/<?=$value['ID']?>/"><?=$value['title']?></a></td>
  	<td><?=$value['date']?></td>
  </tr>
  <? } ?>
</table>