<?
if($_POST['delete']){
	sql('DELETE FROM competitors WHERE ID="'.$_POST['ID'].'" LIMIT 1');
}
if($_POST['confirm']){
	sql_update('competitors');
}

//$category = array('1'=>'Noveles','2'=>'Damas - Master','3'=>'Semi-Pro - Junior','4'=>'Elite Doble - Elite Rigida');

$status = array('0'=>'Nuevas inscripciones','1'=>'Inscripciones confirmadas','2'=>'Inscripciones Canceladas');

foreach($status as $key=>$value){
	
	$button 			= ($key==0) ? 'Confirmar Corredor' : 'Cancelar participaci&oacute;n' ;
	$button 			= ($key==2) ? 'Reactivar Corredor' : $button ;
	$button_value = ($key==0) ? '1' : '2' ;
	$button_value = ($key==2) ? '1' : $button_value ;
	$button_action= ($key==2) ? '<input name="delete" type="submit" value="Eliminar corredor" />' : '';
	$var = 'var'.$key;
	
	$$var = sql('SELECT * FROM competitors WHERE status="'.$key.'" ORDER BY name');
	echo $value;
	echo '<table border="1"><tr><th scope="col">ID</th><th scope="col">Nombre</th><th scope="col">Correo</th><th scope="col">Categor&iacute;a</th><th scope="col">Sexo</th><th scope="col">Pa&iacute;s</th><th scope="col">Fecha</th><th scope="col">Contacto</th><th scope="col">Otros</th><th scope="col"></th></tr>';
	
	foreach($$var as $id=>$info){
?>
  <tr>
  	<td><?=$info['ID']?></td>
    <td><?=$info['name']?> <?=$info['lastName']?></td>
    <td><?=$info['email']?></td>
    <td><?=$category[$info['category']]?></td>
    <td><?=$info['sex']?></td>
    <td><?=$info['country']?></td>
    <td><?=$info['date']?></td>
    <td><?=$info['emergency']?></td>
    <td><?=$info['text']?></td>
    <td><form method="post">
    			<input type="hidden" name="ID" value="<?=$info['ID']?>" />
          <input type="hidden" name="status" value="<?=$button_value?>" />
          <input name="confirm" type="submit" value="<?=$button?>" />
          <?=$button_action?>
        </form>
    </td>
  </tr>
<?
	}
	echo '</table>';
}
?>