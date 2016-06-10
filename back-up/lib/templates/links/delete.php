<?

//$redirect = sql('SELECT category FROM links WHERE linksID="'.resource::variable().'" LIMIT 1');

sql('DELETE FROM links WHERE linksID="'.resource::variable().'" LIMIT 1');

//header('Location: '.a(TRUE,$redirect['category']).'');

?>