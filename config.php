<?php
	
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	//Links
	define('INCLUDE_PATH', 'http://localhost/site_dinamico/');
	define('INCLUDE_PATH_FULL', INCLUDE_PATH.'Views/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'admin/painel/');
	define('BASE_DIR',__DIR__);

	//DB
	define('HOST','localhost');
	define('DB','portifolio');
	define('USER','root');
	define('PASS','');

?>