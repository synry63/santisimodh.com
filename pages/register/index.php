<div class="register">
<?

global $validation;

if($_POST['register_user'] and !$validation){
	
	echo '<h2>'.lang('Tu registro ha sido realizado con éxito').'</h2>';
	
	echo '<div>'.lang('Para finalizar con el registro deberás confirmar el mail que te hemos enviado a ').$_POST['email'].'</div>';
	
	echo '<div>'.lang('Anda ajustando tu bicicleta!!').'</div>';
	
	echo '<div>'.lang('Buena vibra').'</div>';

	
} else {
	
	foreach($validation as $k => $v){
		
		echo '<h2>'.lang('Has olvidado escribir datos').': '.$v.'</h2>';
		
	}
	
?>
  <form action="/register/" method="post">
  	<dl>
      <dt><?=lang('Nombre')?></dt>
      <dd><input name="name" type="text" value="<?=$_POST['name']?>" /></dd>
      <dt><?=lang('Apellido')?></dt>
      <dd><input name="last-name" type="text" value="<?=$_POST['last-name']?>"  /></dd>
      <dt><?=lang('Correo Electrónico')?></dt>
      <dd><input name="email" type="text" value="<?=$_POST['email']?>" /></dd>
      <dt><?=lang('Contraseña')?></dt>
      <dd><input name="password" type="password" value="" /></dd>
      <dt><?=lang('Repite tu contraseña')?></dt>
      <dd><input name="password2" type="password" value="" /></dd>
      <dt><?=lang('Sexo')?></dt>
      <dd>
      	<input name="gender" type="radio" value="female" <?=checked('female',$_POST['gender'])?> /><?=lang('Femenino')?><br />
        <input name="gender" type="radio" value="male" <?=checked('female',$_POST['gender'])?> /><?=lang('Masculino')?>
      </dd>
      <dt><?=lang('Fecha de nacimiento')?></dt>
      <dd><?=form::select('day',FALSE,$_POST['day'])?> <?=form::select('month',FALSE,$_POST['month'],TRUE)?><?=form::select('year',date('Y'),date('Y')-18,FALSE,FALSE,FALSE,-90)?></dd>
      <dt><?=lang('Nacionalidad')?></dt>
      <dd><?=fix(form::select('country',FALSE,'PE'))?></dd>
    </dl>
    <input type="submit" name="register_user" value="<?=lang('Registrarse')?>" />
  </form>

<? } ?>

</div>