	<dl>
  	<dt><?=lang('Nombre')?></dt>
    <dd><input type="text" value="<?=$user['name']?>" name="name"></dd>
  	<dt><?=lang('Apellido')?></dt>
    <dd><input type="text" value="<?=$user['last-name']?>" name="last-name"></dd>
  	<dt><?=lang('Correo Electrónico')?></dt>
    <dd><input type="text" value="<?=$user['email']?>" name="email"> <h5>(<?=lang('Considerar el cambio de correo al ingresar la próxima vez')?>)</h5></dd>
  	<dt><?=lang('Fecha de nacimiento')?></dt>
    <dd><?=form::select('day',FALSE,$user['day'])?><?=form::select('month',FALSE,$user['month'],TRUE)?><?=form::select('year',date('Y')-100,$user['year'],FALSE,FALSE,FALSE,83)?></dd>
  	<dt><?=lang('Nacionalidad')?></dt>
    <dd><?=fix(form::select('country',FALSE,$user['country']))?></dd>
  	<dt><?=lang('Sexo')?></dt>
    <dd>Femenino <input type="radio" name="gender" <?=checked('female',$user['gender'])?> value="female" /> Masculino <input type="radio" value="male" name="gender" <?=checked($user['gender'],'male')?> /></dd>
  </dl>