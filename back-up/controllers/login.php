<?php

if($_POST['login']){
	
	$i = login::validator();
	
	if($i) header('Location: /' );
	
}

?>