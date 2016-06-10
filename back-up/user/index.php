<div class="content">
	<div class="menu">
  	<ul>
    	<li>
				<?=hlink(lang('Inicio'),'/')?>
      </li>
    	<li>
				<?=hlink(lang('Perfil'),'/profile/')?>
      </li>
    	<li>
    		<a class="right" href="/logout/"><?=lang('Salir')?></a>
    	</li>
    </ul>
  </div>
  <div class="page">
  	<? content::page(); ?>
  </div>
</div>