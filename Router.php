<?php 

	class Router{

		public static function rota($path,$arg){
			$url = @$_GET['url'];
			if($url == $path || $url == null){
				$arg();
				die();
			}

			$url  = explode('/', $url);
			$path = explode('/', $path);
			$ok   = true;
			$par  = [];

			if(count($url) == count($path)){

				foreach ($path as $key => $value) {
					if($value == '?'){
						$par[] = $url[$key];
					}else if($url[$key] != $value){
						$ok = false;
						break;
					}
				}

				if($ok){
					$arg($par);
					die();
				}

			}
		}

	}

?>