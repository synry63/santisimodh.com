<?php

$info = events::get(resource::variable());

?>
<style>
	select[name="category"] {
		width:150px;
		min-width:inherit;
	}
</style>

<form method="post">

	<dl>
  	<dt>Titulo</dt>
    <dd><input name="title" value="<?=$info['title']?>" type="text" /></dd>
  	<dt>Fecha</dt>
    <dd class="date"><?=form::select('day',FALSE,$info['day'])?><?=form::select('month',FALSE,$info['month'],TRUE)?><?=form::select('year',date('Y'),$info['year'])?> Hora <?=form::select('hour',FALSE,$info['hour'])?> <?=form::select('minute',FALSE,$info['minute'])?></dd>
    <dt>Descripcion</dt>
    <dd><textarea name="description"><?=$info['description']?></textarea></dd>
    <dt>Reglas</dt>
    <dd><textarea name="rules"><?=$info['rules']?></textarea></dd>
  </dl>
  
  <input type="hidden" name="ID" value="<?=$info['ID']?>" />
  <input type="submit" name="update-event" value="Guardar cambios" />

</form>

<h2>Imagen</h2>

<form method="post" enctype="multipart/form-data" >

  <input type="hidden" name="ID" value="<?=$info['ID']?>" />
	<?=form::image($info['image'],'image','images','Subir Imagen')?>

</form>

<h2>Mapa</h2>

<form method="post" enctype="multipart/form-data" >

  <input type="hidden" name="ID" value="<?=$info['ID']?>" />
	<?=form::image($info['map'],'map','images','Subir mapa')?>

</form>

<? if($info['apliers'] or $info['no-category'] or $info['no-category'] or $info['category']) echo '</div><div class="body">';?>

<? if($info['apliers']) { ?>
<h2>Aplicantes</h2>

<table>
	<tr>
  	<th>Nombre</th>
    <th>Correo</th>
    <th></th>
    <th></th>
  </tr>
  <? foreach($info['apliers'] as $key => $value){ $user = users::get($value);?>
  <tr>
  	<td><?=$user['name']?> <?=$user['last-name']?></td>
  	<td><?=$user['email']?></td>
  	<td><form method="post"><input type="hidden" name="ID" value="<?=$key?>" /><input type="submit" value="Aceptar" name="accept-event-user" /></form></td>
    <td><form method="post"><input type="hidden" name="ID" value="<?=$key?>" /><input type="submit" value="Rechazar" name="reject-event-user" /></form></td>
  </tr>
  <? } ?>
</table>

<? } ?>

<? if($info['no-category']) { ?>
<h2><?=lang('Competidores sin categoría')?></h2>

<table>
	<tr>
  	<th>Nombre</th>
    <th>Correo</th>
    <th>Categoria</th>
    <th></th>
  </tr>
  <? foreach($info['no-category'] as $key => $value){ $user = users::get($value);?>
  <tr>
  	<td><?=$user['name']?> <?=$user['last-name']?></td>
  	<td><?=$user['email']?></td>
    <td>
    	<form method="post">
    		<input type="hidden" name="ID" value="<?=$key?>" /><?=form::select('category',categories::get());?>
        <input type="submit" value="Recategorizar" name="change-category-user" />
      </form>
    </td>
    <td><form method="post"><input type="hidden" name="ID" value="<?=$value['id']?>" /><input type="submit" value="Rechazar" name="reject-event-user" /></form></td>
  </tr>
  <? } ?>
</table>

<? } ?>

<? if($info['category']) { ?>

<h2>Competidores</h2>

	<? foreach($info['category'] as $category => $users) { ?>
  
  <h2><?=fix(categories::get($category))?></h2>
  
  <table>
    <tr>
      <th>N</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th></th>
      <th>Mejor resultado</th>
      <th></th>
    </tr>
    <? foreach($users as $k => $v){ $user = users::get($v['code']);?>
    <tr>
      <td><?=++$i?></td>
      <td><?=$user['name']?> <?=$user['last-name']?></td>
      <td><?=$user['email']?></td>
    <td>
    	<form method="post">
    		<input type="hidden" name="ID" value="<?=$k?>" /><?=form::select('category',categories::get(),$v['category']);?>
        <input type="submit" value="Recategorizar" name="change-category-user" />
      </form>
    </td>
      <td>
        <form method="post">
          <input type="hidden" name="ID" value="<?=$k?>" />
          <input type="text" style="width:100px; min-width:inherit;" value="<?=$v['result']?>" name="result" />
          <input type="submit" name="change-time" value="Guardar" />
        </form>
      </td>
      <td>
        <form method="post">
          <input type="hidden" name="ID" value="<?=$k?>" />
          <input type="submit" name="reject-user" value="Cancelar participacion" />
        </form>
      </td>
    </tr>
    <? } ?>
  </table>
  <? } ?>
<? } ?>