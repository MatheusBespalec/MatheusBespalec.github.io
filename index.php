<?php 
	
	include('config.php');

	//Autoload
	$autoload = function($class){
		$class = str_replace('\\','/',$class);
		if(file_exists($class.'.php'))
			include($class.'.php');
	};

	spl_autoload_register($autoload);

	$app = new App;
	$app->executar();

?>