<?php

if(isset($_GET['admin'])) header('Location: /admin/');

if(resource::controller() == 'admin' and $_SESSION['user']) {
	
	if($vars && login::validator(sql('SELECT email,password FROM users WHERE code = "'.$_SESSION['user'].'" LIMIT 1'),'email','password','admin',array('type'=>'administrator'))) header('Location: /');

}

if($_POST['login_admin']) {
	
	if(login::validator(FALSE,'email','password','admin',array('administrator','webmaster','translator'))) header('Location: /');
	
}

if (resource::controller()=='logout'){
	session_destroy();
	header('Location: /');
}

if (resource::controller()=='frontend'){
	$_SESSION['module']	= 'default';
	header('Location: /');
}

if (resource::controller()=='backtend' or (resource::controller()=='admin' and $_SESSION['admin'])){
	$_SESSION['module']	= 'admin';
	header('Location: /');
}

if ($_SESSION['module']=='admin'){
	
	if(isset($_GET['resourse'])){
		
		include('templates/'.$_GET['resourse'].'.php');
		die;
	
	}
	
	if(resource::controller()) include 'admin-controllers/'.resource::controller().'.php';
	if(resource::controller()) include 'controllers/'.resource::controller().'.php';
	
	include('design.php');
	
?>
<script type="application/javascript">
	
	$(window).load(function(){
		
		$('div.loading').fadeOut(500);
		$('div.page').fadeIn(1500);
		
	});
	
</script>
<?
	
//	include __DIR__ . '/../cms/index.php';
	include 'lib/cms/index.php';
	
	echo '</body>';
	echo '</html>';
	die;
}


?>