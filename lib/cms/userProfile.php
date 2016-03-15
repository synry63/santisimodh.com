<?
$imgFolder = 'admin/img';

if (isset($_POST['submitInfo']) and $_FILES['img']['tmp_name']!=''){

				
				
				//the new width of the resized image.
				$img_thumb_width = 300; // in pixcel
				
				$extlimit = "yes"; //Do you want to limit the extensions of files uploaded (yes/no)
				//allowed Extensions
				$limitedext = array(".gif",".jpg",".png",".jpeg",".bmp");
				
				
				//check if folders are Writable or not
				//please CHOMD them 777
				if (!is_dir($imgFolder)){
					 die ("Error: The directory <b>($imgFolder)</b> is NOT writable");
				}
				
			 
       $file_type = $_FILES['img']['type'];
       $file_name = $_FILES['img']['name'];
       $file_size = $_FILES['img']['size'];
       $file_tmp  = $_FILES['img']['tmp_name'];
			 
			 
			 //print_r($_FILES['img']);

       //check if you have selected a file.
       if(!is_uploaded_file($file_tmp)){
          echo '<div class="boxTitle">Error: Escoja un archivo o su archivo exede el maximo de tamaño!</div>';
          exit(); //exit the script and don't do anything else.
       }
       //check file extension
       $ext = strrchr($file_name,'.');
       $ext = strtolower($ext);
       if (($extlimit == "yes") && (!in_array($ext,$limitedext))) {
          echo "Tipo de archivo incorrecto.";
          exit();
       }
       //get the file extension.
       $getExt = explode ('.', $file_name);
       $file_ext = $getExt[count($getExt)-1];

       //create a random file name
       $rand_name = md5(time());
       $rand_name = rand(0,999999999);
       //get the new width variable.
       $ThumbWidth = $img_thumb_width;

       //keep image type
       if($file_size){
          if($file_type == "image/pjpeg" || $file_type == "image/jpeg"){
               $new_img = imagecreatefromjpeg($file_tmp);
           }elseif($file_type == "image/x-png" || $file_type == "image/png"){
               $new_img = imagecreatefrompng($file_tmp);
           }elseif($file_type == "image/gif"){
               $new_img = imagecreatefromgif($file_tmp);
           }
           //list width and height and keep height ratio.
           list($width, $height) = getimagesize($file_tmp);
           $imgratio=$width/$height;
           if ($imgratio>1){
              $newwidth = $ThumbWidth;
              $newheight = $ThumbWidth/$imgratio;
           }else{
                 $newheight = $ThumbWidth;
                 $newwidth = $ThumbWidth*$imgratio;
           }
           //function for resize image.
           if (function_exists(imagecreatetruecolor)){
           $resized_img = imagecreatetruecolor($newwidth,$newheight);
           }else{
                 die("Error: Please make sure you have GD library ver 2+");
           }
           imagecopyresized($resized_img, $new_img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
           //save image
           ImageJpeg ($resized_img,$imgFolder.'/'.$rand_name.'.'.$file_ext);
           ImageDestroy ($resized_img);
           ImageDestroy ($new_img);
        }
	$sql='UPDATE adminUsers SET userIMG="'.$rand_name.'.'.$file_ext.'" WHERE usersID="'.$userID.'" LIMIT 1';
	mysql_query($sql,$link);
	
}

if($_POST['submitInfo']){
	$sql='UPDATE adminUsers SET userName 		 = "'.$_POST['name'].'",
															userLastName = "'.$_POST['lastname'].'",
															userEmail 	 = "'.$_POST['email'].'",
															userNote		 = "'.$_POST['notes'].'",
															userLevel		 = "'.$_POST['status'].'",
															userTelephone= "'.$_POST['telephone'].'",
															userMobil		 = "'.$_POST['mobil'].'",
															userAdresse	 = "'.$_POST['adresse'].'",
															userCemail	 = "'.$_POST['cemail'].'"
				WHERE usersID = "'.$userID.'" LIMIT 1';
	mysql_query($sql,$link);
}

	$sql='SELECT * FROM adminUsers WHERE usersID="'.$userID.'"';
	$result=mysql_query($sql,$link);
	while($row = mysql_fetch_array($result)){
		$name 		= $row['userName'];
		$lastName = $row['userLastName'];
		$email 		= $row['userEmail'];
		$note 		= $row['userNote'];
		$status		=	$row['userLevel'];
		$telephone=	$row['userTelephone'];
		$mobil		=	$row['userMobil'];
		$adresse	=	$row['userAdresse'];
		$noteShow	=	$row['userNoteShow'];
		$cemail		=	$row['userCemail'];
		$userIMG	=	$row['userIMG'];
	} 
	
$editLink = '?admin&page=adminUsers&userID='.$userID.'&action=edit';

if($_GET['action']=='edit'){
	$changeAndSafe = '<input name="submitInfo" type="submit" class="editBotton" value="'.lang('Save').'" />';
} else {
	$changeAndSafe = '<a href="'.$editLink.'" class="edit">'.lang('Change').'</a>';
}

if($_GET['photo']=='del'){
	$sql='UPDATE adminUsers SET userIMG="" WHERE usersID="'.$userID.'" LIMIT 1';
	mysql_query($sql,$link);
	unlink($imgFolder.'/'.$userIMG);
	$userIMG = FALSE;
}

?>
<form action="?admin&page=adminUsers&userID=<?=$_GET['userID']?>" method="post" enctype="multipart/form-data">
<div></div>
<div class="colum1">
	<div class="box">
    <div class="boxTitle"><?=$changeAndSafe?><?=lang('Personal information')?></div>
    <div><?=lang('Name')?>: <?=doShowSimple($name,'name','',20)?></div>
    <div><?=lang('Lastname')?>: <?=doShowSimple($lastName,'lastname','',20)?></div>
    <div><?=lang('E-Mail')?>: <?=doShowSimple($email,'email','',20)?></div>
    <div><?=lang('Telephone')?>: <?=doShowSimple($telephone,'telephone','',20)?></div>
    <div><?=lang('Mobil')?>: <?=doShowSimple($mobil,'mobil','',20)?></div>
    <div><?=lang('Adresse')?>: <?=doShowSimple($adresse,'adresse','',20)?></div>
    <div><?=lang('Notes')?>: <?=doShowSimple($note,'notes','',20)?></div>
  </div>
</div>
<div class="colum2">
		<div class="box">
  	<div class="boxTitle"><?=$changeAndSafe?><?=lang('Photo')?></div>
    <div>
    		<? if($userIMG==''){ 
						if($_GET['action']=='edit'){ 
							echo '<input type="file" name="img" class="standartFolmular" />';
						} else {
							echo 'No picture';
						}	
					 } else {
					if($_GET['action']=='edit') { ?>
          			<br /><a href="?admin&page=adminUsers&userID=<?=$userID?>&action=edit&photo=del" class="adminMenuLine"><?=lang('Change photo')?></a>
      	<? } ?>
    			<img src="<?=$imgFolder?>/<?=$userIMG?>" width="200" />
          	<? } ?>
    </div>
  </div>
  <div class="box"><div class="boxTitle"><?=$changeAndSafe?><?=lang('Company information')?></div>
  <div><?=lang('Status')?>: <?
                        if($_GET['action']=='edit') {
                        echo '<select name="status" class="standartFormular">';
                                  foreach($userTypeClean as $userTypeStatus=>$userTypeName) {
                                    if ($status==$userTypeStatus){
                                      $selected='selected="selected"';
                                    } else {
                                      $selected='';
                                    }
                                    echo '<option value="'.$userTypeStatus.'" '.$selected.' >'.$userTypeName.'</option>';
                                   }
                        echo '</select>';
                               
                        } else {
                               
                        echo $userTypeClean[$status];
  } ?>
  </div>
  <div><?=lang('E-Mail')?>: <?=doShowSimple($cemail,'cemail','',20)?></div>
  <div><?=lang('Company telephone')?>: <?=doShowSimple($cPhone,'cPhone','',20)?></div>
  </div>
</div>
</form>