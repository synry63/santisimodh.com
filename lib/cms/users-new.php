<form method="post" action="/users/">

	<dl>
  
  	<dt><?=lang('Name')?></dt>
    <dd><input type="text" name="name" ></dd>
  
  	<dt><?=lang('Last Name')?></dt>
    <dd><input type="text" name="last-name" ></dd>
  
  	<dt><?=lang('Email')?></dt>
    <dd><input type="text" name="email" ></dd>
  
  	<dt><?=lang('Password')?></dt>
    <dd><input type="password" name="password" ></dd>
  
  </dl>
  
  <input type="hidden" value="adm" name="type"  />
  <input type="submit" value="<?=lang('Add')?>" name="add-user" >

</form>