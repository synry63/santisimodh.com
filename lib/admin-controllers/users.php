<?php
if($_POST['submit-user']){
	
	$_POST['type'] = implode(',',$_POST['type1']);
	
	if($_POST['rest'] and $_POST['type1']) $_POST['type'].= ',';
	
	$_POST['type'].= $_POST['rest'];
	
	users::update(FALSE,users::ID2code($_GET['edit']));

}

if ($_GET['delete']){
	
	$code = users::ID2code($_GET['delete']);
	
	if ($code) {
		
		users::delete($code);
		
	} else {
	
		sql('DELETE FROM users WHERE ID = "' . $_GET['delete'] . '" LIMIT 1');
	
	}
	
	header('Location: ' . resource::url(FALSE, array('delete')));
	
}

if($_POST['add-user']){
	
	users::add();
	
}

?>