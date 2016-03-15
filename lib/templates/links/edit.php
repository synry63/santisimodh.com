<?

if($_POST['edit_link']){
	$_POST['linksID'] = resource::variable();
	sql_update('links',FALSE,'linksID');
	echo 'Change saved';
}

$info = sql('SELECT * FROM links WHERE linksID="'.resource::variable().'" LIMIT 1');

include 'form.php';

exit;
?>