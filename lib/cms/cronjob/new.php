<h2><?=lang('New Cron Job')?></h2>

<form method="post">

	<dl>
  	<dt><?=lang('type')?></dt>
    <dd><input type="text" name="type" /></dd>
  	<dt><?=lang('User')?></dt>
    <dd><input type="text" name="code" /></dd>
  	<dt><?=lang('Cron job')?></dt>
    <dd><input type="text" name="cronjob" /></dd>
  	<dt><?=lang('Information')?></dt>
    <dd><textarea name="info"></textarea></dd>
  </dl>
  
  <input type="submit" name="add-cronjob" value="<?=lang('Add Cron Job')?>"  />

</form>