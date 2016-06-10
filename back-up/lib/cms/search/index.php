<?php



?>
<h1>
	<?=lang('Search')?>
	<span><?=lang('Choose the fields you want search')?></span>
</h1>
<form method="post">
	<table>
  	<tr>
      <td><?=lang('Table')?></td>
      <td><?=lang('Field')?></td>
    </tr>
  	<tr>
      <td><input type="text" name="table" /></td>
      <td><input type="text" name="field" /></td>
    </tr>
  </table>
</form>