<?php

$cronjob = sql('SELECT * FROM cronjob WHERE type = "' . resource::variable() . '"');

include 'table.php';

?>
