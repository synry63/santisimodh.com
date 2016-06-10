<?

$result = sql('SELECT * FROM adminPages');

?>
<div class="boxTitle">
<select name="page" size="1" onchange='location = this.value;'>
<option>Seleciona una Categoria</option>
<?
foreach($result as $key => $row){
	
?>
<option value="/pages/<?=$row['adminPagesID']?>/" <?=selected(resource::action(),$row['adminPagesID'])?>><?=$row['adminPagesTitle']?></option>

<?
} ?>
</select>
<input class="standartFormular" type="button" value="<?=lang('Add new')?>" onclick="location.href='/pages/add/'" />      
</div>
<?

if(is_numeric(resource::action())){
	include 'modules-edit.php';
} elseif(resource::action()=='add'){
	include 'modules-edit.php';
}

?>