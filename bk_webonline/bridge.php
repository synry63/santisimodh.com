<?php

$identities['www.santisimodh.com'] 	= array('db'=>'uhupi_santisimodh',
																				 		'db_user'=>'uhupi_santino',
																				 		'db_password'=>'ex4por5t',
																				 		'root'=>'../public_html/lib/',
																			);
																			
$identities['santisimodh'] 					= array('db'=>'uhupi_santisimodh',
																				 		'db_user'=>'root',
																				 		'db_password'=>'root',
																				 		'root'=>'../uhupi/lib/',
																			);


//conexion datos de conexion a la base de datos
$user				= $identities[$_SERVER['HTTP_HOST']]['db_user'];
$password		= $identities[$_SERVER['HTTP_HOST']]['db_password'];
$database		= $identities[$_SERVER['HTTP_HOST']]['db'];
$root 			= $identities[$_SERVER['HTTP_HOST']]['root'];
$adminRoot  = ''; //normalmente vacio
//idioma principal
$lang 			= 'es';
$pageOwner 	= 'Marcelo Elorrieta';
$pageAuthor = 'Santino Lange';
$login 			= 'marcelo';
$loginPassword		= 'elorrieta';
include($root . 'bootstrap.php');