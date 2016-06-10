
	
  <h2><?=lang('Datos personales')?></h2>
  
  <dl>
  	<dt><?=lang('Teléfono')?>*</dt>
    <dd><input type="text" value="<?=$user['phone']?>" name="phone"></dd>
    <dt><?=lang('Documento de identidad')?>*</dt>
    <dd><input name="id_number" type="text" value="<?=$user['id_number']?>" /></dd>
  </dl>
  
  <h2><?=lang('En caso de emergencia')?></h2>
  
  <dl>
  	<dt><?=lang('Tipo sanguineo')?></dt>
    <dd>RH- <?=form::select('rh',blod::get(),$user['rh'])?></dd>
  	<dt><?=lang('Contacto de emergencia')?>*</dt>
    <dd><input type="text" value="<?=$user['emergency-contact']?>" name="emergency-contact"></dd>
  	<dt><?=lang('Numero telefónico de contacto de emergencia')?>*</dt>
    <dd><input type="text" value="<?=$user['emergency-contact-number']?>" name="emergency-contact-number"></dd>
  </dl>
  
  <h2><?=lang('Equipo y referencias')?></h2>
  
  <dl>
    <dt><?=lang('Equipo')?></dt>
    <dd><input name="team" type="text" value="<?=$user['team']?>" /></dd>
    <dt><?=lang('N&deg; de carnet UCI')?></dt>
    <dd><input name="uci" type="text" value="<?=$user['uci']?>" /></dd>
    <dt><?=lang('Categoria')?>*</dt>
    <dd><?=form::select('category',categories::get(),$user['category'])?></dd>
  </dl>
  
	<h2><?=lang('Otros datos')?></h2>

  <dl>
  	<dt><?=lang('Bicicleta')?></dt>
    <dd><input type="text" value="<?=$user['bike']?>" name="bike"></dd>
  </dl>