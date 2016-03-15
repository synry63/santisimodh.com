<?php

$user = users::get();

?>
<h1><?=lang('Configuration')?></h1>
<h2><?=lang('User')?></h2>
<table>
	<tr>
  	<th rowspan="4"></th>
    <td><?=$user['name']?> <?=$user['last-name']?></td>
  </tr>
	<tr>
  	<td><?=$user['email']?></td>
  </tr>
	<tr>
		<td><?=$user['city']?> <?=  international::countries($user['country'])?></td>
  </tr>
	<tr>
  	<td><a href="/configuration/profile/"><?=lang('Edit')?></a></td>
  </tr>
</table>
<h2><?=lang('Logo')?></h2>
<img src="/images/logo.png"  />
<form method="post" enctype="multipart/form-data">
	<dl>
  	<dt><?=lang('Change logo')?></dt>
    <dd><input type="file" name="logo" /> <input type="submit" name="load-logo" value="<?=lang('Upload new logo')?>" /></dd>
  </dl>
</form>
<h2><?=lang('Slogan')?></h2>
<form method="post">
	<dl>
  	<dt><?=lang('Change Slogan')?></dt>
    <dd><input type="text" name="slogan" /> <input type="submit" name="change-slogan" value="<?=lang('Save new slogan')?>" /></dd>
  </dl>
</form>