<?php

if($_POST['add_album']){
	
	$_POST['folder'] = md5($_POST['title']);
	
	sql_insert('album_folder');
	
}

if($_POST['add_foto']){
	
	$_POST['image'] = saveFoto($_FILES['image'],'images/album/');
	sql_insert('album');

}

$db['album_folder'] = array('code'=>array('type'=>'TEXT'),
														'title' =>array('type'=>'TEXT'),
										 				'folder'=>array('type'=>'TEXT'),
														'description'=>array('type'=>'TEXT'),
										 				'autor' =>array('type'=>'TEXT'),
														'date'	 =>array('type'=>'TIMESTAMP'),
													 );

$db['album'] = array('image' =>array('type'=>'TEXT'),
										 'title' =>array('type'=>'TEXT'),
										 'folder'=>array('type'=>'TEXT'),
										 'description'=>array('type'=>'TEXT'),
										 'autor' =>array('type'=>'TEXT'),
										 'date'	 =>array('type'=>'TIMESTAMP'),
										);
sql_structure($db);

$menu = sql('SELECT * FROM album_folder');

$idToFolder = sql('SELECT folder FROM album_folder WHERE ID = "'.resource::action().'" LIMIT 1');
$idToFolder = $idToFolder['folder'];

$images = sql('SELECT * FROM album WHERE folder = "'.$idToFolder.'"');

?>

<ul class="navigation">

	<li><a id="show_form" onclick="document.getElementById('new-album').style.display='inherit';"><?=lang('New Album')?></a></li>

	<li><a onclick="document.getElementById('upload').style.display='inherit';"><?=lang('Upload a new photo')?></a></li>

	<li><a href="/album/" ><?=lang('Pictures without album')?></a></li>
  
  <? foreach($menu as $key => $value){ ?>
  	
  <li><?=hlink($value['title'],'/album/'.$value['ID'].'/')?></li>
    
  <? } ?>

</ul>

<div class="box" style="display:none;" id="new-album">

  <form method="post">
  
    <dl>
      
      <dt><?=lang('New')?> <?=lang('Album')?></dt>
      <dd><input name="title" type="text"></dd>
      
      <input name="add_album" type="submit" value="<?=lang('Save')?>">
      <input name="cancel" type="button" onclick="document.getElementById('new-album').style.display='none';" value="<?=lang('Cancel')?>">
    
    </dl>
    
  </form>

</div>

<div class="box" id="upload" style="display:none;">
  
  <form method="post" enctype="multipart/form-data">
  
    <dl>
  
      <dt><?=lang('Title')?></dt>
      <dd><input name="title" type="text"></dd>
      <dt><?=lang('Foto')?></dt>
      <dd><input name="image" type="file"></dd>
      <dt><?=lang('Album')?></dt>
      <dd>
        <select name="folder">
          <option value=""><?=lang('None')?></option>
          <? foreach($menu as $key=>$value) {?>
          <option value="<?=$value['folder']?>" <?=selected(resource::action(),$value['ID'])?>><?=$value['title']?></option> 
          <? } ?> 	
        </select>
      </dd>
      
    </dl>
    
    <input name="add_foto" type="submit" value="<?=lang('upload')?>">
    <input name="cancel" type="button" onclick="document.getElementById('upload').style.display='none';" value="<?=lang('Cancel')?>">
      
 
  </form>

</div>

<? foreach($images as $key => $value) { ?>

	<span>
  	
    <form>
    
    	<img src="/images/album/<?=$value['image']?>" width="150"  />
  		
      <div><input type="text" /></div>
    	
      <div><input type="submit" value="<?=lang('Save')?>" /><input type="submit" value="<?=lang('Delete')?>" /></div>
    
    </form>
  
  </span>

<? } ?>

<?
if(isset($_GET['admin'])) {
	//include('pages/album.php');
}
?>