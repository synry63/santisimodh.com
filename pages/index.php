<div class="content">
	<div class="menu">
  	<ul class="right">
    	<li>
				<?=hlink(lang('Registrate'),'/register/')?>
    	</li>
    	<li>
				<?=hlink(lang('Eventos'),'/events/')?>
    	</li>
    	<li>
				<?=hlink(lang('Prensa'),'/press/')?>
    	</li>
    	<li>
				<?=hlink(lang('Auspiciadores'),'/sponsors/')?>
    	</li>
    	</li>
    	<li>
				<?=hlink(lang('Equipo'),'/about/')?>
    	</li>
    </ul>
  </div>
  <div class="box">
  	
    <a class="logo" href="/"><img src="/images/logo.png" width="250" /></a>
    
  	<h2><?=lang('Santisima Comunidad')?></h2>
    <form method="post" action="/login/">
      <dl>
        <dt><?=lang('E-Mail')?></dt>
        <dd><input type="text" name="email" /></dd>
        <dt><?=lang('Contraseña')?></dt>
        <dd><input type="password" name="password" /></dd>
      </dl>
    
    	<input class="right" type="submit" name="login" value="entrar" />
    	<a class="right" href="/register/"><?=lang('Registrate')?></a>
    
    </form>
    
    
    <?
			$next = events::Next(); 
			if($next) { ?>
    
    <h2><?=lang('Próximo evento')?>: <a href="/events/view/<?=content::href2address($next['title'])?>"><strong><?=$next['title']?></strong></a></h2>
    
		<h3><?=$next['day']?> <?=date('M',mktime(0,0,0,$next['month'],10))?> <?=$next['year']?></h3>
    
    <? } ?>
    <br class="clear" />
    
	</div>
  <div class="page">
  
  	<? content::page(); ?>
  
  </div>  
  
  <br class="clear" />

</div>
<div class="footer">
	Santisimo Downhill &copy; 2013
  <a href="/faq/">FAQ</a><a href="/contact/">Contacto</a><a href="/press/">Prensa</a>
	<iframe src="http://www.facebook.com/plugins/like.php?href=www.santisimodh.com&amp;layout=standard&amp;show_faces=true&amp;width=490&amp;action=like&amp;font=arial&amp;colorscheme=dark&amp;height=25" scrolling="no" frameborder="0" style="border:none; margin-bottom:-8px; overflow:hidden; width:490px; height:25px;" allowTransparency="true"></iframe>
</div>


</body>
</html>