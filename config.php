<?php
	
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	//Links
	define('INCLUDE_PATH', 'http://matheusbespalec.alwaysdata.net/');
	define('INCLUDE_PATH_FULL', INCLUDE_PATH.'Views/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'admin/painel/');
	define('BASE_DIR',__DIR__.'/');

	//DB
	define('HOST','mysql-matheusbespalec.alwaysdata.net');
	define('DB','matheusbespalec_matheus');
	define('USER','243831');
	define('PASS','Matheus1!');

	//Autoload
	
	$autoload = function($class){
		$class = str_replace('\\','/',$class);
		if(file_exists(BASE_DIR.$class.'.php')){
			include($class.'.php');
		}
	};

	spl_autoload_register($autoload);

?>