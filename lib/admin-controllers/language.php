<?php

if(resource::action() == 'clear'){
	
	sql('DELETE FROM lang WHERE '.$lang.' = ""');
	
	header('Location: /language/'.$lang.'/');
	
}

if($_POST['saveLanguage']){
	
	sql_update('page',FALSE,'pageLang');

}

?>