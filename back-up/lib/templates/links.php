<?
if(resource::action()=='edit'){
	include 'links/edit.php';
}
if(resource::action()=='delete'){
	include 'links/delete.php';
}


$db['links'] 	 = array('title'=>array('type'=>'VARCHAR'),
											 'link'=>array('type'=>'VARCHAR'),
											 'description'=>array('type'=>'TEXT'),
											 'category'=>array('type'=>'VARCHAR'),
											 );

$db['links_category'] 	= array('name'=>array('type'=>'VARCHAR')
											 );
											 
sql_structure($db);
											 
if($_POST['submit_category']){
	sql_insert('links_category');
}
if($_POST['submit_link']){
	sql_insert('links');
}

?>
<h1>
	<?=lang('Links')?>
	<a onclick="document.getElementById('new').style.display='block';"><?=lang('New Link')?></a>
  <a onclick="document.getElementById('category').style.display='block';"><?=lang('New Category')?></a>
</h1>
<div class="box" style="display:none;" id="new">
<? include 'links/form.php'; ?>
</div>

<div class="box" id="category" style="display:none;">
  <form action="<?=a(TRUE)?>" method="post">
    <div>
      <?=lang('Name')?>
      <input type="text" name="name">
    </div>
    <div>
      <input type="submit" name="submit_category">
    </div>
  </form>
</div>
<div class="body">
<? include 'pages/links.php'; ?>
</div>