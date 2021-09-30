<?php

	class App{

		public function executar(){
			$url = (isset($_GET['url'])) ? explode('/',$_GET['url'])[0] : 'home';
			$url = ucfirst($url);
			$url.='Controller';

			if(file_exists('Controllers/'.$url.'.php')){
				$className = 'Controllers\\'.$url;

				$controller = new $className();
				$controller->executar();
			}else{
				die('<h1>Esta página não existe!</h1>');
			}

		}

	}

?>