<?

lang::register('admin-language');

?>

<div class="loading">Loading...</div>


<div class="header">
  <ul>
  	<li><a href="/"><img src="/images/logo.png" /></a></li>
  	<!--<li class="logout"><a href="/logout/" title="<?=lang('Log out')?>">x</a></li>-->
  </ul>
</div>
<div class="page">
<div class="menu">
	<ul>
  	<li><a href="/"><?=lang('Start')?></a></li>
    <li><?=hlink(lang('Configuration'),'/configuration/')?></li>
    <li class="logout"><a href="/logout/"><?=lang('Log out')?></a></li>
  </ul>
</div>

<div class="content">
	<?=content::admin()?><br class="clear" />
</div>
  
<div class="footer"></div>