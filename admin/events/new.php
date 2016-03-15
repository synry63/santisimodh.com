<?

$DB['events']['title']				= array('type' => 'VARCHAR');
$DB['events']['date']					= array('type' => 'DATETIME');
$DB['events']['description']	= array('type' => 'TEXT');
$DB['events']['rules']				= array('type' => 'TEXT');
$DB['events']['image']				= array('type' => 'VARCHAR');
$DB['events']['map']					= array('type' => 'VARCHAR');

$DB['bikers2events']['code']		= array('type' => 'VARCHAR');
$DB['bikers2events']['event']		= array('type' => 'VARCHAR');
$DB['bikers2events']['status']	= array('type' => 'VARCHAR');
$DB['bikers2events']['category']= array('type' => 'VARCHAR');
$DB['bikers2events']['result']	= array('type' => 'TIME');

sql_structure($DB);

?>

<h1>Nuevo evento</h1>

<form method="post">
	<dl>
  	<dt>Titulo</dt>
    <dd><input type="text" name="title" /></dd>
  </dl>
  
  <input type="submit" name="add-event" value="Agregar" />
  
</form>