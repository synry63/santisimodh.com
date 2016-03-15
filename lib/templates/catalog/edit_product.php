<?

$selector = new html();
$form 		= new form();

if($_POST['editProduct']){
	$_POST['ID'] = resource::variable();
	sql_update('catalog');
}

if($_POST['loadImage']){
	$_POST['image'] = saveFoto($_FILES['image'],'images/catalog');
	$_POST['product'] = resource::variable();
	sql_insert('catalog_images');
}

if(isset($_GET['del'])){
	$img = sql('SELECT image FROM catalog_images WHERE ID="'.$_GET['del'].'" LIMIT 1');
	sql('DELETE FROM catalog_images WHERE ID="'.$_GET['del'].'" LIMIT 1');
	delFile($img['image'],'images/catalog');
	$img = FALSE;
}

if($_POST['main']){
	sql('UPDATE catalog_images SET main="1" WHERE ID="'.$_POST['main'].'" LIMIT 1');
	sql('UPDATE catalog_images SET main="" WHERE ID!="'.$_POST['main'].'" LIMIT 1');
}

$db['catalog'] = array('sale'=>array('type'=>'VARCHAR'),
											 'status'=>array('type'=>'VARCHAR'),
											 'price'=>array('type'=>'VARCHAR'),
											 );
sql_structure($db);

$product = sql('SELECT * FROM catalog WHERE ID="'.resource::variable().'" LIMIT 1');
$images = sql('SELECT * FROM catalog_images WHERE product="'.resource::variable().'"');
?>

<div class="box">
  <h1><?=lang('Edit product')?></h1>
  <form action="/catalog/<?=resource::action()?>/<?=resource::variable()?>/" method="post">
    <div><?=lang('Name of the product')?>: <input name="name" value="<?=$product['name']?>"></div>
    <div><?=lang('Products Code')?>: <input name="code" value="<?=$product['code']?>"></div>
    <div><?=lang('Show')?>: <input type="hidden" name="status" value="" /><input type="checkbox" <?=checked($product['status'],'1')?> name="status" value="1" /></div>
    <div><?=lang('Price')?>: <input type="number" name="price" value="<?=$product['price']?>" /></div>
    <div>
      <?=lang('Category')?>:
      <?
      $selector->catalog_selector($product['category']);
      ?>
    </div>
    <div>
			<?=lang('Show in the front')?>:
      <? echo $form->checkbox('front',1,$product['front']); ?>
    </div>
    <div>
      <?=lang('Description')?>:
      <textarea name="description"><?=$product['description']?></textarea>
    </div>
    <div><input type="submit" value="<?=lang('Send')?>" name="editProduct"></div>
  </form>
  <h1><?=lang('Images')?></h1>
  <form action="/catalog/<?=resource::action()?>/<?=resource::variable()?>/" method="post" enctype="multipart/form-data">
    <div>
      <input name="image" type="file" />
      <input type="submit" value="<?=lang('Upload')?>" name="loadImage">
    </div>
  </form>
  <form class="images" action="/catalog/product/<?=resource::variable()?>/" method="post">
  <?
  foreach ($images as $key => $value){ ?>
    <div>
    	<div><img src="/images/catalog/<?=$value['image']?>" /></div>
      Main <input name="main" type="radio" value="<?=$value['ID']?>" <?=checked($value['main'],'1')?> onclick="submit();" />
      <a href="/catalog/product/<?=resource::variable()?>/del/<?=$value['ID']?>">Delete</a>
    </div>
  <?
  }
  ?>
  </form>
  <div class="clear"></div>
</div>