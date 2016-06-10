<?

class image{
	
	function get($ID){
		
		$image = sql('SELECT image FROM images WHERE page = "'.$ID.'" LIMIT 1');
		
		return $image['image'];
		
	}
	
	function save($img,$ID,$info = FALSE){
		
		if(is_array($img)) $img = image::upload($img,'images/images',$info['size'],$info['name']);

		$vars = $info;
		$vars['image'] 	= $img;
		$vars['page'] = $ID;
		$i = sql_insert('images',$vars);
		$vars['langID'] = $ID.'_title_'.$i;
		sql_insert('lang',$vars);
		$vars['langID'] = $ID.'_description_'.$i;
		sql_insert('lang',$vars);
		
	}
	
	function delete($ID){
		
		$img = (is_numeric($ID)) ? sql('SELECT ID,image FROM images WHERE ID = "'.$ID.'" LIMIT 1') : sql('SELECT ID,image FROM images WHERE page = "'.$ID.'" LIMIT 1') ;
		sql('DELETE FROM images WHERE ID = "'.$img['ID'].'" LIMIT 1');
		unlink('images/images/'.$image['image']);
		
	}
	
	function extension($name,$extensions = array(".gif",".jpg",".JPG",".png",".jpeg",".bmp")){
		
		$ext = strrchr($name,'.');
		$ext = strtolower($ext);
		if(!in_array($ext,$extensions)) die('ERROR: No image file');
		
		return $ext;
		
	}
	
	static function upload($img,$folder,$size=600,$name=FALSE) {
		
		if(!$folder) $folder = 'images/images';
		
		$imgFolder = $folder;
	 
		$file_type = $img['type'];
		$file_name = $img['name'];
		$file_size = $img['size'];
		$file_tmp  = $img['tmp_name'];
		
		if(!is_array($img)){
			
			$i = getimagesize($img);
			
			$file_type = $i['mime'];
			$file_name = $img;
			$file_size = filesize($img);
			$file_tmp  = $img;
			
		}
		
		//check if you have selected a file.
		if(!is_uploaded_file($file_tmp) and is_array($img)) die('ERROR: No file or too big');
		 
		//check file extension
		$extension = image::extension($file_name);
		
		//create a random file name
		$rand_name = (!$name) ? $rand_name = rand(0,999999999) : $rand_name = str_replace($limitedext,'',$name);
		
		//keep image type
		if($file_size){
			
			if($file_type == "image/pjpeg" || $file_type == "image/jpeg"){
							
					$new_img = imagecreatefromjpeg($file_tmp);
							 
			} elseif($file_type == "image/x-png" || $file_type == "image/png") {
							 
					$new_img = imagecreatefrompng($file_tmp);
					 
			}elseif($file_type == "image/gif"){
						
					$new_img = imagecreatefromgif($file_tmp);
					 
			}
				 
			 //list width and height and keep height ratio.
			 list($width, $height) = getimagesize($file_tmp);
			 $new = image::ratio($width,$height,$size);
			 
			 //function for resize image
			 $resized_img = imagecreatetruecolor($new['width'],$new['height']);
			 
			 imagecopyresized($resized_img, $new_img, 0, 0, 0, 0, $new['width'], $new['height'], $width, $height);
			 
			 //save image
			 imagejpeg($resized_img,''.$imgFolder.'/'.$rand_name.''.$extension);
			 imagedestroy($resized_img);
			 imagedestroy($new_img);
			 
		}
			
		return $rand_name.''.$extension;
	}
	
	function ratio($width,$height,$size){
		
		$imgratio = $width / $height;
		
		if($imgratio>1){
			
			$new['width']  = $size;
			$new['height'] = $size/$imgratio;
		
		} else {
			
			$new['width']  = $size;
			$new['height'] = $size*$imgratio;
		
		}
		
		return $new;
		
	}
		
}

?>