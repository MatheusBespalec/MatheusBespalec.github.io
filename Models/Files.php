<?php 

	namespace Models;

	class Files{

		public static function validImage($img){
			if ($img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' || $img['type'] == 'image/png') {
				$tamanho = intval($img['size']/1024);
				if ($tamanho > 500) {
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}

		public static function uploadImage($file){
			$formatImage = explode('.', $file['name']);
			$nameImage = uniqid().'.'.$formatImage[count($formatImage) - 1];
			if(move_uploaded_file($file['tmp_name'], BASE_DIR.'Views/images/portifolio/'.$nameImage)){
				return $nameImage;
			}else{
				return false;
			}
		}

		public static function deleteFile($file){
			@unlink(BASE_DIR.'Views/images/portifolio/'.$file);
		}

	}

?>