<?php

class file{
	
	function upload($name, $fileName){
		
		$target_path = "uploads/";
		
		if(!file_exists($target_path)) mkdir($target_path);
			
			
		if ($fileName) {
			
			$ext = '.' . pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);
			$fileName = $fileName . $ext;
			$target_path = $target_path . $fileName;
			
		} else {
			
			$target_path = $target_path . basename( $_FILES[$name]['name']);
			$fileName = basename( $_FILES[$name]['name']);
		
		}
//		die($target_path);
		if(move_uploaded_file($_FILES[$name]['tmp_name'], $target_path)) {
			
			
			
		} else{
			
				echo "There was an error uploading the file, please try again! ";
				echo $target_path;
				die;
				
		}
		
		return $fileName;

		
	}
	
	function delete($file, $path){
		
		if (!$path) $path = 'uploads/';
		
		unlink($path . $file);
		
	}
	
}

?>
