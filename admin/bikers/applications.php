<table>
	<tr>
    <th>Nombre</th>
    <th>Correo</th>
    <th></th>
    <th></th>
  </tr>
  <? foreach(events::appliers() as $key => $value) { $u = users::get($value['code']);?>
  <tr>
    <td><?=$u['name']?> <?=$u['last-name']?></td>
    <td><?=$u['email']?></td>
    <td><form method="post"><input type="hidden" name="code" value="<?=$u['code']?>" ><input type="submit" value="<?=lang('Aceptar')?>" name="accept" ></form></td>
    <td><form method="post"><input type="hidden" name="code" value="<?=$u['code']?>" ><input type="submit" value="<?=lang('Aceptar')?>" name="denied" ></form></td>
  </tr>
  <? }?>
</table>