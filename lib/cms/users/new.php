<h1><?=lang('New User')?></h1>
<? if($_POST['add-user']) echo '<h2 class="red">'.lang('New user sussesfuly added').'</h2>'; ?>
<form method="post">

	<dl>
  	<dt><?=lang('Name')?></dt>
    <dd><input type="text" name="name" /></dd>
  	<dt><?=lang('Last Name')?></dt>
    <dd><input type="text" name="last-name" /></dd>
  	<dt><?=lang('E-mail')?></dt>
    <dd><input type="text" name="email" /></dd>
  	<dt><?=lang('Password')?></dt>
    <dd><input type="password" name="password" /></dd>
  </dl>
  
  <input type="submit" name="add-user" value="<?=lang('Add user')?>"  />

</form>