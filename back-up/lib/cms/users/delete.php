<?php

$i = users::ID(resource::variable());

?>

<?=lang('Do you really want to delete')?> <strong><?=$i['name']?> <?=$i['last-name']?></strong>

<a href="/users/delete/<?=resource::variable()?>/yes/NULL/" class="button"><?=lang('Yes')?></a> <a href="/users/" class="button"><?=lang('No')?></a>