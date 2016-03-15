<?php

$DB['guestbook']['name'] 		= array('type' => 'VARCHAR');
$DB['guestbook']['email'] 	= array('type' => 'VARCHAR');
$DB['guestbook']['language']= array('type' => 'VARCHAR');
$DB['guestbook']['status']	= array('type' => 'VARCHAR');
$DB['guestbook']['text']		= array('type' => 'TEXT');
$DB['guestbook']['date']		= array('type' => 'TIMESTAMP');

sql_structure($DB);

if($_POST['new-comment']) sql_insert('guestbook');

if(isset($_POST['status'])){
	
	sql_update('guestbook');
	die;
	
}

if($_POST['edit-comment']) sql_update('guestbook');

if($_POST['delete-comment']) sql('DELETE FROM guestbook WHERE ID = "'.$_POST['ID'].'" LIMIT 1');
if($_POST['delete-comment']) die;

?>