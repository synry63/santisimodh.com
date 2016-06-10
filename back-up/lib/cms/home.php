<?
if($_POST['structure']){
	include('../structure.php');
	echo '<div class="boxTitle">'.lang('you refresh the structure of the page').'</div>';
}

if($_GET['del']=='logo') {
	
	$logo=conf('logo');
	$sql='UPDATE config SET logo=""';
	mysql_query($sql,$link);
	delFile($logo,$imagesFolder);
}

if(isset($_POST['loadLogo'])) {
	$sql='UPDATE config SET logo="'.saveFoto($_FILES['logo'],'images','250').'"';
	mysql_query($sql,$link);
	//echo 'bbbAAA';
}
?>
<div class="colum1">
  <div class="box">
    <div class="boxTitle">
      <a href="<?=$adminMenuLink?>adminUsers&sector=1">Bienvenido <?=$userName?> <?=$userLastName?></a>
    </div>
    <div><?=lang('New Messages')?>: 0</div>
	</div>
  <?
  	$phpVersion = substr(phpversion(),0,1);
		if($phpVersion<5){
			echo '<div class="boxTitle">'.lang('Your server is too old, Uhupi recommends to actualize it to a modern server').'</div>';
		}
	?>
</div>
<div class="colum2">
	<div class="box">
		<div class="boxTitle">
    	<?=lang('Information')?>
    </div>
    <div align="center">
    	<?
			$logo = conf('logo');
      if($logo==''){ ?>
				<form action="?<?=$alink?>" method="post" enctype="multipart/form-data">
        	<?=lang('Upload your logo')?>
          <input name="logo" type="file" class="standartFormular" /><input name="loadLogo" type="submit" class="standartFormular" value="<?=lang('Load')?> Logo" />
        </form>
        <hr />
<?		} else {
			
    		echo '<a href="?'.$alink.'&del=logo" class="edit">'.lang('Delete').'/'.lang('change').' Logo</a>';
				echo '<img src="'.$imagesFolder.''.$logo.'" width="250" class="imagen" />';
				
			
			}
			?>
    </div>
    <div><?=lang('Language for administrator')?> 
    <? 
			$option = array('Espa&ntilde;ol'=>'es',
											'English'			 =>'en',
											'Deutsch'			 =>'de');
		?>
    <select name="language" class="standartFormular" onchange='location = this.value;'>
 <? foreach($option as $l => $c){
 			if($lc==$c){ $selected = 'selected="selected"'; } else { $selected = ''; }
    	echo  '<option value="?'.$alink.'&changeLang='.$c.'" '.$selected.'>'.$l.'</option>';
 		}
 ?> 
    </select></div>
    <div>Web: <?=$_SERVER['HTTP_HOST']?></div>
    <div><?=lang('Owner')?>: <?=$pageOwner?></div>
    <div><?=lang('Visitors')?>: <?=visitors('0','1')?></div>
    <div>IP: <?=$_SERVER['HTTP_HOST']?>	</div>
    <div>
    	<form action="?<?=$alink?>" method="post">
      	Estuctura: <input name="structure" type="submit" class="standartFormular" value="<?=lang('Refresh structure')?>" />
      </form>
    </div>
  </div>
  <div class="box">
    <div class="boxTitle"><?=lang('Your notes')?></div>
    <?
      $sql='SELECT * FROM notes WHERE autor="'.$_SESSION['sessionUser'].'"';
      $result = mysql_query($sql,$link);
      while($row = mysql_fetch_array($result)){
    ?>
      <a href="?admin&page=notes&pageID=<?=$row['ID']?>" class="linkColum1"><?=$row['title']?></a>
    <?
      }
    ?><br />
  </div>
  <div class="box">
    <div class="boxTitle"><?=lang('Share notes with you')?></div>
    <?
      $sql='SELECT * FROM notetouser a, notes b WHERE (a.user="'.$_SESSION['sessionUser'].'" or a.user="0") and a.note=b.ID and b.autor!="'.$_SESSION['sessionUser'].'" GROUP BY b.title';
			$result = mysql_query($sql,$link);
      while($row = mysql_fetch_array($result)){
    ?>
      <a href="?admin&page=notes&pageID=<?=$row['ID']?>" class="linkColum1"><?=$row['title']?></a>
    <?
      }
    ?><br />
  </div>
</div>