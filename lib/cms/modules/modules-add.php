<?php

if($_POST){
	sql_insert('adminPages');
	echo $_POST['adminPagesTitle'].' '.lang('has been added');
	echo '<br><br><a href="/pages/">'.lang('Back').'</a>';
}

?>

<form method="post" action="/pages-add/">
	<?=lang('Title')?><input type="text" name="adminPagesTitle" >
	<input type="submit">
</form>