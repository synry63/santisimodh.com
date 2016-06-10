<?

$DB['sponsors']['name']					= array('type' => 'VARCHAR');
$DB['sponsors']['description']	= array('type' => 'TEXT');
$DB['sponsors']['status']				= array('type' => 'VARCHAR');
$DB['sponsors']['link']					= array('type' => 'VARCHAR');
$DB['sponsors']['image']				= array('type' => 'VARCHAR');

sql_structure($DB);

?>

<?=form::start()?>

	<dl>
  	<dt>Name</dt>
    <dd><input type="text" name="name" /></dd>
  </dl>
  
  <input type="submit" name="add-sponsor" value="Guardar" />

<?=form::finish()?>