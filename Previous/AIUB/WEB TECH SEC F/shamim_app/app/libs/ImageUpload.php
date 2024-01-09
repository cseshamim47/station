<?php
require 'SimpleImage.php';

class ImageUpload {

		  public function store_uploaded_image($url,$html_element_name, $new_img_width, $new_img_height, $newname, $ext=".jpg") {
			
			$target_dir = $url;
			
			$target_file = $target_dir . basename($_FILES[$html_element_name]["name"]);
						
			$image = new SimpleImage();
			$image->load($_FILES[$html_element_name]['tmp_name']);
			$image->resize($new_img_width, $new_img_height);
			$image->save($target_file);
			rename($target_file,$target_dir.$newname.$ext);
			return $target_file; //return name of saved file in case you want to store it in you database or show confirmation message to user

		}     

}
?>