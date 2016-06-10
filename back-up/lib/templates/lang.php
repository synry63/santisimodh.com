<?
/* if($_GET['changeLang']=='en'){
	$sql='DELETE FROM lang WHERE langPage="admin"';
	mysql_query($sql,$link);
}
if($_GET['changeLang']=='es'){
	$data = array('Languages'																	=>'Idiomas',
								'Staff'																			=>'Equipo',
								'My categories (Admin)'											=>'Mis categorias (Admin)',
								'My visitors'																=>'Mis visitas',
								'Newsletter'																=>'Boletines',
								'Log out'																		=>'Salir',
								'Add Language'															=>'Agregar idioma',
								'Company telephone'													=>'Telefono de la empresa',
								'Photo'																			=>'Foto');
}

foreach($data as $word=>$newWord){
	$sql='UPDATE lang SET '.$lang.'="'.$newWord.'" WHERE langID="'.$word.'" and langPage="admin"';
	mysql_query($sql,$link);
} */
$_SESSION['language']=$_GET['changeLang'];
?>