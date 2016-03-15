<?

if($_POST['newCategory']) {
	sql_insert('catalog_category');
}

if($_POST['newProduct']) {
	sql_insert('catalog');
}

$db['catalog'] = array('code'=>array('type'=>'VARCHAR'),
											 'name'=>array('type'=>'VARCHAR'),
											 'description'=>array('type'=>'TEXT'),
											 'category'=>array('type'=>'VARCHAR'),
											 'front'=>array('type'=>'VARCHAR'),
											 );

$db['catalog_category'] = array('name'=>array('type'=>'VARCHAR'),
											 					'category'=>array('type'=>'VARCHAR'),
											 );

$db['catalog_images'] = array('product'=>array('type'=>'VARCHAR'),
											 				'image'=>array('type'=>'VARCHAR'),
															'main'=>array('type'=>'VARCHAR'),
											 );

sql_structure($db);

$categories = sql('SELECT * FROM catalog_category WHERE category="'.resource::action().'"');

?>

<h1>
	Catalog
  <a onclick="getPage('/?resourse=catalog_forms&form=new_category','more');">New category</a>
  <a onclick="getPage('/?resourse=catalog_forms&form=new_product','more');">New product</a>
</h1>
<span id="more"></span>
<?
if(resource::action()=='category'){
	
	include('catalog/edit_category.php');

} elseif(resource::action()=='product'){
	
	include('catalog/edit_product.php');

} else {
	
	include('pages/catalog.php');

}
?>