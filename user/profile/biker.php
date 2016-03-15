<?

$DB['users']['biker']											= array('type' => 'VARCHAR');
$DB['users']['phone']											= array('type' => 'VARCHAR');
$DB['users']['team']											= array('type' => 'VARCHAR');
$DB['users']['rh']												= array('type' => 'VARCHAR');
$DB['users']['emergency-contact']					= array('type' => 'VARCHAR');
$DB['users']['emergency-contact-number']	= array('type' => 'VARCHAR');
$DB['users']['bike']											= array('type' => 'VARCHAR');
$DB['users']['uci']												= array('type' => 'VARCHAR');
$DB['users']['category']									= array('type' => 'VARCHAR');


sql_structure($DB);

include ($user['biker'] === '1') ? 'yes-biker.php' : 'no-biker.php' ;

?>