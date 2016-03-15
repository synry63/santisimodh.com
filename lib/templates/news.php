<?

if(resource::action()=='edit'){
	include 'news/edit.php';
	exit;
}
if(resource::action()=='delete'){
	include 'news/delete.php';
}

if($_POST['submit_news']){
	sql_insert('news',$_POST);
}

$db['news'] 	 = array('title'=>array('type'=>'VARCHAR'),
											 'content'=>array('type'=>'TEXT'),
											 'lang'=>array('type'=>'VARCHAR'),
											 'status'=>array('type'=>'VARCHAR'),
											 'date'=>array('type'=>'TIMESTAMP'),
											 );
											 
sql_structure($db);

?>

<h1><?=lang('News')?> <a onclick="document.getElementById('form').style.display='block';"><?=lang('Add news')?></a></h1>
<div class="box" style="display:none;" id="form">
  <form action="<?=a(TRUE)?>" method="post">
    <div>
      <?=lang('Title')?>
      <input name="title" type="text">
    </div>
    <div><input type="submit" name="submit_news"></div>
  </form>
</div>
<div class="body">
<? include 'pages/news.php'; ?>
</div>