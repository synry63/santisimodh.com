<table>
	<tr>
  	<th>Nombre</th>
    <th></th>
  </tr>
  <? foreach(sponsors::get() as $key => $value) { ?>
  <tr>
  	<td><?=$value['name']?></td>
  	<td><a class="button" href="/sponsors/edit/<?=$value['ID']?>/">Editar</a></td>
  </tr>
  <? } ?>
</table>