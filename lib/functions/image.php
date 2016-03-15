<?

function image($image,$path=FALSE,$width=FALSE,$height=FALSE,$class=FALSE,$alt=FALSE,$title=FALSE) {

	$alt = (!$alt) ? $image : $alt ;
	
	// Path

	$url = substr($image,0,7);
	
	if($url=='http://') {
		
		
		$width 	= ($width) ? 'width="'.round($width).'"' : FALSE ;
		$height = ($height) ? 'height="'.round($height).'"' : FALSE ;
		$title 	= ($title) ? 'title="'.$title.'"' : FALSE ;
		$class 	= ($class) ? 'class="'.$class.'"' : FALSE ;
		$alt 		= (!$alt) ? 'extern' : $alt ;
		
		$image = '<img src="'.$image.'" '.$width.' '.$height.' alt="'.$alt.'" '.$class.' />';
		
	} else {
		
		if($width==TRUE and $height==TRUE){
	
			$fSized[] = '32';
			$fSized[] = '64';
			$fSized[] = '128';
			$fSized[] = '256';
			$fSized[] = '512';
			
			$fName = 'thumbnail_';
			
			//$fSized = FALSE;
			
			foreach($fSized as $key => $value){
				
				$real = ($width+$height)/2;
				if($real <= $value and $real>$last){
					
					//if(!file_exists($path.'/'.$fname.''.$value)){
						mkdir($path.'/'.$fName.''.$value);
					//}
					
					$path_th = $path.''.$fName.''.$value.'/';
					
					if(!file_exists($path_th.'/'.$image)){
						
						saveFoto(''.$path.''.$image,$path_th,$value,$image);
						
					}
					
					//$path = $path_th;
					
					
					
				}
				
				$last = $value;
			
			}
		}
	
		$limitedext  = array(".gif",".JPG",".jpg",".png",".jpeg",".bmp");
		$real 			 = getimagesize($path.''.$image);
		$real_width  = $real[0];
		$real_height = $real[1];
		$saveWidth	 = $width;
		$saveHeigth	 = $height;
		$dif1 = abs($real_width - $width);
		$dif2 = abs($real_height - $height);
		
		if($dif1>$dif2) {
			
			$height = (($width * 100)/$real_width)*($real_height/100);
			//echo '1';
		}
		
		if($dif2>$dif1) {
			
			$width  = (($height * 100)/$real_height)*($real_width/100);
			//echo $width;
		}
		//echo $unreal_height;
		
		if(($real_width<=$saveWidth) and ($real_height<=$saveHeigth)) {
			
			$width  = $real_width;
			$height = $real_height;
		
		}
		
		$path = ($path_th) ? $path_th : $path ;
		
		$ext = strrchr($image,'.');
		$ext = strtolower($ext);
		
		
		$ur = explode("/", $_SERVER['REQUEST_URI']);
		//print_r($ur);
		foreach($ur as $key=>$value){
			if($value!=''){
				$pa.='../';
			}
		}
		//echo $pa;
		if ((in_array($ext,$limitedext)) and file_exists($path.''.$image)) {
				
				$width 	= ($width) ? 'width="'.round($width).'"' : FALSE ;
				$height = ($height) ? 'height="'.round($height).'"' : FALSE ;
				$title 	= ($title) ? 'title="'.$title.'"' : FALSE ;
				$return 	= '<img src="/'.$path.''.$image.'" '.$width.' '.$height.' alt="'.$alt.'" class="'.$class.'" '.$title.' />';
		}
		
	}
	
	return $return;
}





function saveFoto($img,$folder,$size=600,$name=FALSE) {

		
	//global $_FILES['img'];
		//print_r ($img);
		
		
		$img_thumb_width = $size; // in pixcel
		$imgFolder = $folder;
		
		$extlimit = "yes"; //Do you want to limit the extensions of files uploaded (yes/no)
		//allowed Extensions
		$limitedext = array(".gif",".jpg",".JPG",".png",".jpeg",".bmp");
		
		
		//check if folders are Writable or not
		//please CHOMD them 777
		if (!is_dir($imgFolder)){
			 die ('<div class="boxTitle">Error: El directorio <b>('.$imgFolder.')</b> no es escribible o no existe</div>');
		}
		
	 
	 /* $file_type = $_FILES['img']['type'];
	 $file_name = $_FILES['img']['name'];
	 $file_size = $_FILES['img']['size'];
	 $file_tmp  = $_FILES['img']['tmp_name']; */
	 
	 
	 $file_type = $img['type'];
	 $file_name = $img['name'];
	 $file_size = $img['size'];
	 $file_tmp  = $img['tmp_name'];
	
	
	
	if(!is_array($img)){
		
		//print_r($img);
		
		$i = getimagesize($img);
		
		$file_type = $i['mime'];
		$file_name = $img;
		$file_size = filesize($img);
		$file_tmp  = $img;
	}
	 
	 
	 //print_r($_FILES['img']);
	
	 //check if you have selected a file.
	 if(!is_uploaded_file($file_tmp) and is_array($img)){
			$error = 'no file or to big';
			echo $error;
	 }
	 //check file extension
	 $ext = strrchr($file_name,'.');
	 $ext = strtolower($ext);
	 if (($extlimit == "yes") && (!in_array($ext,$limitedext))) {
		 	
			$error = '';
			echo $error;
			
	 }
	 //get the file extension.
	 $getExt = explode ('.', $file_name);
	 $file_ext = $getExt[count($getExt)-1];
	 $file_ext = strtolower($file_ext);
	
	 //create a random file name
	 if(!$name){
	 	$rand_name = md5(time());
	 	$rand_name = rand(0,999999999);
	 } else {
		$rand_name = str_replace($limitedext,'',$name);
	 }
	 
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
	return $rand_name.'.'.$file_ext;
}

?>