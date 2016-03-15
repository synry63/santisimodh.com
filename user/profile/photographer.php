<h1><?=lang('Fotógrafo')?></h1>

<?

$DB['users']['photographer']	= array('type' => 'VARCHAR');

sql_structure($DB);

include ($user['biker']) ? 'yes-photo.php' : 'no-photo.php' ;

?>