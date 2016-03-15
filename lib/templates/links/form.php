<?
  
	
$form = new form();
	
$categories = sql('SELECT ID,name FROM links_category');
foreach($categories as $key => $value){
	$select[$value['ID']]=$value['name'];
}

$submit = (resource::action()=='edit') ? 'edit_link' : 'submit_link' ;
	
	?>
<form action="<?=a(TRUE,TRUE,TRUE)?>" method="post">
  <div>
    <?=lang('Title')?>
    <input type="text" name="title" value="<?=$info['title']?>">
  </div>
  <div>
    <?=lang('Link')?>
    <input type="text" name="link" value="<?=$info['link']?>">
  </div>
  <div>
    <?=lang('Description')?>
    <textarea name="description"><?=$info['description']?></textarea>
  </div>
  <div>
    <?=lang('Category')?>
    <?=$form->select('category',$select,$info['category'],FALSE,TRUE);?>
  </div>
  <div>
    <input type="submit" name="<?=$submit?>">
  </div>
</form>