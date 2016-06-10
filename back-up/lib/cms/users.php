<?php

if($_POST['add-user']) sql_insert();

?>
<h1><?=lang('Users')?></h1>
<ul class="navigation">
	<li><?=hlink(lang('Users'),'/users/')?></li>
	<li><?=hlink(lang('Your profile'),'/users/profile/')?></li>
	<li><?=hlink(lang('New user'),'/users/new/')?></li>
</ul>
<div class="body">
	<?
  
	(resource::action()) ? include 'users-'.resource::action().'.php' : include 'users-users.php' ;
	
	?>
</div>