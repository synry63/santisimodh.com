<?

$user = users::get();

?>

<h2>
	<?=lang('Edit my profile')?>
  <form method="post">
  	<input type="submit" value="<?=lang('Delete Account')?>" />
	</form>
</h2>
<form method="post">
	<dl>
  	<dt><?=lang('E-mail')?></dt>
    <? if($_POST['change-email'] && !$_POST['email']) echo '<dd class="red">'.lang('You need to write an email').'</dd>'; ?>
    <dd><input type="text" name="email" value="<?=$user['email']?>" /> <input type="submit" value="<?=lang('Change E-Mail')?>" name="change-email" /></dd>
  </dl>
</form>
<hr />
<form method="post">
	<dl>
  	<dt><?=lang('Change password')?></dt>
    <dd class="clear"></dd>
    <? if($_POST['change-password'] && !users::password()) echo '<dd class="red">'.lang('The password do not match').'</dd>'; ?>
    <dt><?=lang('Actual password')?></dt>
    <dd><input type="text" name="password" /></dd>
    <dt><?=lang('New password')?></dt>
    <dd><input type="text" name="new-password" /></dd>
    <dt><?=lang('Repeat new password')?></dt>
    <dd><input type="text" name="re-password" /> <input type="submit" value="<?=lang('Change password')?>" name="change-password" /></dd>
  </dl>
</form>
<hr />
<form method="post">
	<dl>
  	<dt><?=lang('Image')?></dt>
    <dd><input type="file" name="image" /> <input type="submit" value="<?=lang('Change image')?>" name="change-image" /></dd>
  </dl>
</form>
<h2><?=lang('My Information')?></h2>
<form method="post">
	<dl>
  	<dt><?=lang('Name')?></dt>
    <dd><input type="text" name="name" value="<?=$user['name']?>" /></dd>
		<hr />
  	<dt><?=lang('Last-Name')?></dt>
    <dd><input type="text" name="last-name" value="<?=$user['last-name']?>" /></dd>
		<hr />
  	<dt><?=lang('Language')?></dt>
    <dd><?=form::select('language',lang::get(),$user['language'])?></dd>
    <hr />
  	<dt><?=lang('Type')?></dt>
    <dd><input type="text" name="type" value="<?=$user['type']?>" /></dd>
		<hr />
  	<dt><?=lang('City')?></dt>
    <dd><input type="text" name="city" value="<?=$user['city']?>" /></dd>
		<hr />
    <dt><?=lang('Country')?></dt>
    <dd><?=form::select('country',international::countries(),$user['country'])?></dd>
  </dl>
  <input type="submit" value="<?=lang('Save profile')?>" name="save-profile" />
</form>