<?php

global $lang;

?>

<ul>
	<li><?=hlink(lang('Configuration'),'/configuration/')?></li>
	<li><?=hlink(lang('Profile'),'/configuration/profile/')?></li>
	<li><?=hlink(lang('Users'),'/users/')?></li>
  <li><?=hlink(lang('International'),'/language/'.$lang.'/')?></li>
  <li><?=hlink(lang('Variables'),'/config/')?></li>
  <li><?=hlink(lang('Cron Job'),'/cronjob/','Manage your CronJobs')?></li>
  <li><?=hlink(lang('Page Manager'),'/pages/','Manage your Pages')?></li>
</ul>