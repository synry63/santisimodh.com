<div class="box">
<h1><?=lang('New product')?></h1>
<form action="/catalog/" method="post">
	<?=lang('Name of the product')?>: <input name="name">
  <?=lang('Category')?>:
  <?
	$selector = new html();
	$selector->catalog_selector();
	?>
  <input type="submit" value="<?=lang('Send')?>" name="newProduct">
</form>
</div>