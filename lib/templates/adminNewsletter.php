<style type="text/css" media="screen">
	.paper {
		background:#FFF;
		color:#000;
	}
body,td,th {
	color: #000;
}
</style>
<?
$folder = substr($_SERVER['SCRIPT_NAME'],0,-10);

if($_POST['delIMG']){
	$sql='DELETE FROM images WHERE position="newsletter"';
	mysql_query($sql,$link);
	delFile($_POST['img'],'images');
}

if($_POST['saveIMG']) {
	$fname=saveFoto($_FILES['IMG'],'images','400');
	$sql='INSERT INTO images (img,position) VALUES ("'.$fname.'","newsletter")';
	mysql_query($sql,$link);
}

if($_POST['properties2']) {
	$sql='UPDATE images SET properties2="'.$_POST['properties2'].'" WHERE ID="'.$_POST['ID'].'"';
	mysql_query($sql,$link);
}

if($_POST['delNews']){
	$sql='DELETE FROM newsletter WHERE newsletterID="'.$_GET['pageID'].'"';
	mysql_query($sql,$link);
}

if($_POST['saveNews'] and isset($_GET['pageID'])) {
	$sql='UPDATE newsletter SET newsletterContent="'.$_POST['content'].'",newsletterTitle="'.$_POST['title'].'",newsletterSP="'.$_POST['sp'].'" WHERE newsletterID="'.$_GET['pageID'].'"';
	mysql_query($sql,$link);
} elseif($_POST['saveNews']) {
	$sql='INSERT INTO newsletter(newsletterTitle,
															 newsletterContent,
															 newsletterUser,
															 newsletterSP) VALUES 
															("'.$_POST['title'].'",
															 "'.$_POST['content'].'",
															 "'.$_POST['by'].'",
															 "'.$_POST['sp'].'")';
	mysql_query($sql,$link);
}

$sql='SELECT * FROM images WHERE position="newsletter" LIMIT 1';
$result = mysql_query($sql,$link);
while($row = mysql_fetch_array($result)) {
	$imgHead=$row['img'];
}

$sql='SELECT * FROM newsletter WHERE newsletterID="'.$_GET['pageID'].'" LIMIT 1';
$result=mysql_query($sql,$link);
while($row = mysql_fetch_array($result)) {

	$newsletterTitle 	 = $row['newsletterTitle'];
	$newsletterContent = $row['newsletterContent'];
	$newsletterUser 	 = $row['newsletterUser'];
	$newsletterSP			 = $row['newsletterSP'];

}
	$saveLang=$_SESSION['language'];
	
	$_SESSION['language']=$newsletterSP;

	$body = '<div style="background-color:#FFF;">
					<table border="0" cellspacing="0" cellpadding="0">
					<tr>
					<td>';
	$body.='<img src="http://'.$_SERVER['HTTP_HOST'].''.$folder.'/'.$imagesFolder.''.conf('logo').'" width="200px" /><br />';
	$body.='<div style="color:#F00; width:100%; font-size:16px; margin-left:5px;">www.'.$_SERVER['HTTP_HOST'].'</div>';
	$body.='<div style="color:#666; width:100%; font-weight:600; margin-left:5px;">'.lang('Newsletter').' '.writeMonth(date("m")).' '.date("Y").'</div>';
	$body.='</td><td><img src="http://'.$_SERVER['HTTP_HOST'].''.$folder.'/'.$imagesFolder.''.$imgHead.'" width="400px" height="150" />';
	$body.='</td>
  				</tr>
					</table>';
	$body.='<hr color="#025541" size="4px" />';
	$body.='<table width="100%" border="0" cellpadding="0" cellspacing="0">
  				<tr>
    			<td rowspan="2" align="center" valign="top" width="160">';
	$sql2='SELECT * FROM images WHERE position="banner" and properties2="1"';
	$result2 = mysql_query($sql2,$link);
	while($row2 = mysql_fetch_array($result2)) {
	$body.='<a href="http://'.$row2['properties1'].'">
					<img src="http://'.$_SERVER['HTTP_HOST'].''.$folder.'/'.$row2['path'].'/'.$row2['img'].'" width="150" style="border:none; margin:2px;" title="'.lang('Go to').': '.$row2['properties1'].'" />
					</a><br />';
  }
	//$body.='<br /><a href="#" style="border:1px solid #025541; margin:3px; padding:3px; display:block;">hkjhkjhk</a>';
	$sql='SELECT * FROM adminUsers WHERE userFront="1"';
	$result = mysql_query($sql,$link);
	while($row = mysql_fetch_array($result)) {
	$body.='<div style=" text-align:left; margin:3px; padding:3px; display:block; color: #025541; font-size:10px;"><strong>'.$userType[$row['userLevel']].'<br />'.$row['userName'].' '.$row['userLastName'].'</strong></div><br />';
	}
	$body.='</td>
    			<td valign="top">';
	$body.=$newsletterContent;
	$body.='</td>
					</tr>
					<tr>
					<td align="right" valign="top">';
	$body.='</td>
  				</tr>
					</table>';
	$body.='<div>';
	
	$_SESSION['language']=$saveLang;

if($_POST['sendNews']){
	
	$title = $_POST['title'];
	
	$sql = 'SELECT * FROM adminUsers WHERE userLogin="'.$_SESSION['sessionUser'].'" LIMIT 1';
	$result = mysql_query($sql,$link);
	
	while($row = mysql_fetch_array($result)) {
		$userName 		= $row['userName'];
		$userLastName = $row['userLastName'];
		$userEmail		= $row['userEmail'];
	}
	
	$sql = 'SELECT * FROM newsletterList WHERE newsletterSP="'.$newsletterSP.'"';
	$result = mysql_query($sql,$link);
	while($row = mysql_fetch_array($result)) {
	
	$from = lang('Newsletter').' '.lang('from').' www.'.$_SERVER['HTTP_HOST'];
	
	$subs ='<div>'.lang('You recieve this message because you are subscribe to').' '.$_SERVER['HTTP_HOST'].'<br />
					<a href="http://'.$_SERVER['HTTP_HOST'].'/?unsuscribe='.$row['newsletterEmail'].'">'.lang('Click here to unsubscribe').'</a></div>';
	
	mailHTML($from,conf('adminContactEmail'),'',$row['newsletterEmail'],$_POST['title'],$body.''.$subs);
	
	}
	
	echo '<div class="boxTitle">'.lang('New newsletter added').'</div>';
	
	if(isset($_GET['pageID'])){
		
		$sql='UPDATE newsletter SET newsletterContent="'.$_POST['content'].'",newsletterTitle="'.$_POST['title'].'" WHERE newsletterID="'.$_GET['pageID'].'"';
		mysql_query($sql,$link);
		
	} else {
	
	$sql='INSERT INTO newsletter(newsletterTitle,
															 newsletterContent,
															 newsletterUser) VALUES 
															("'.$_POST['title'].'",
															 "'.$_POST['content'].'",
															 "'.$_POST['by'].'")';
	mysql_query($sql,$link);
	
	}
}
?>
<?=hlink(lang('Sent'),'?admin&page=adminNewsletter&sector=1','See all sent items','adminMenuLine','adminMenuLineSelected')?>
<?=hlink(lang('Send New'),'?admin&page=adminNewsletter&sector=2','Send a new newsletter','adminMenuLine','adminMenuLineSelected')?>
<?=hlink(lang('Users subscribed'),'?admin&page=adminNewsletter&sector=3','See all the users who are on list','adminMenuLine','adminMenuLineSelected')?>
<?=hlink(lang('Banners'),'?admin&page=adminNewsletter&sector=4',lang('Select banners to show	'),'adminMenuLine','adminMenuLineSelected')?>
<div class="box">
<?

////////////////// SECTOR 1 ///////////////////////

if(resource::action()==1){ 

	$sql = 'SELECT a.*, b.* FROM newsletter a, adminUsers b WHERE a.newsletterUser=b.userLogin';
	$result = mysql_query($sql,$link);
	echo '<div class="boxTitle">'.lang('All sent items').'</div>'; ?>
<table class="listing" border="0" cellpadding="0" cellspacing="0">
  <thead>
  <tr>
    <td><?=lang('Title')?></td>
    <td><?=lang('Autor')?></td>
    <td><?=lang('Date')?></td>
  </tr>
  </thead>
  <tbody>
<?
	while($row = mysql_fetch_array($result)) {
	$i = $i+1;
	if($i==2){
		$sec = 'class="sec"';
		$i=0;
	} else {
		$sec = FALSE;
	}
	?>
  <tr <?=$sec?>>
  <td><a href="?admin&page=adminNewsletter&sector=2&pageID=<?=$row['newsletterID']?>&action=edit" title="<?=lang('See content from')?> <?=$row['newsletterTitle']?>"><? if($row['newsletterTitle']=='') { echo lang('No title'); } else { echo $row['newsletterTitle']; } ?></a></td>
  <td><a href="?admin&page=adminUsers&sector=3&userID=<?=$row['usersID']?>" title="<?=lang('See profile from')?> <?=$row['userName']?> <?=$row['userLastName']?>" ><?=$row['userName']?> <?=$row['userLastName']?></a></td>
  <td><?=$row['newsletterDate']?></td>
  </tr>
<? } ?>
	</tbody>
</table>
<?
}

/////////////////////////// SECTOR 2 ///////////////////////////////

if(resource::action()==2) {?>
	<div class="boxTitle"><?=('Create a new Newsletter')?></div>
<div class="paper" style="margin:5px;">
<?

if($_POST['preview']){
	echo '<div style="color:#000;">'.$body.'</div>';
	exit;
}
?>
<? include 'adminNewsletterForm.php'; ?>
</div>
<?
}
if(resource::action()==3) {

	if($_GET['action']=='del') {
		$sql = 'DELETE FROM newsletterList WHERE newsletterListID="'.$_GET['ID'].'" LIMIT 1';
		mysql_query($sql,$link);
	}

	$sql = 'SELECT * FROM newsletterList ORDER BY newsletterEmail ASC';
	$result = mysql_query($sql,$link); ?>
<table class="listing" border="0" cellspacing="0" cellpadding="0">
 <thead>
  <tr>
    <td><?=lang('Email')?></td>
    <td><?=lang('Date')?></td>
    <td><?=lang('Language')?></td>
    <td>&nbsp;</td>
  </tr>
 </thead>
<? while($row = mysql_fetch_array($result)) { ?>
  <tr>
    <td>
    	<?=$row['newsletterEmail']?>
    </td>
    <td>
    	<?=$row['newsletterDate']?>
    </td>
    <td>
    	<?=$row['newsletterSP']?>
    </td>
    <td>
			<a href="?<?=$alink?>&action=del&ID=<?=$row['newsletterListID']?>"><?=lang('Delete')?></a>
    </td>
  </tr>
<? } ?>
</table>
<? } ?>
<?

///////////////////// SECTOR 4 ///////////////////////////

if(resource::action()==4) { ?>
<div class="boxTitle"><?=lang('Banners to be show')?></div>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
<?
$sql='SELECT * FROM images WHERE position="banner"';
$result=mysql_query($sql,$link);
while($row = mysql_fetch_array($result)) {
	$count=$count+1;
	if($row['properties2']=='1') {
		$checked='checked="checked"';
	} else {
		$checked='';
	}
?>
	<form action="?<?=$alink?>" method="post">
    <td>
    	<img src="<?=$row['path']?>/<?=$row['img']?>" class="image" width="195" style="margin:2px;" />
      <input name="properties2" type="hidden" value=" " />
      <input name="properties2" type="checkbox" <?=$checked?> value="1" onclick="submit();" />
      <input name="ID" type="hidden" value="<?=$row['ID']?>" />
    </td>
	</form>
<?
if($count==3) {
	echo '</tr><tr>';
	$count=0;
}
}
?>
  </tr>
</table>
<?
}

?>
</div>
	