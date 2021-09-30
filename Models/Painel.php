<?php 

	namespace Models;

	class Painel{

		public static function alert($tipo,$mensagem){
			echo '<div class="alert '.$tipo.'">'.$mensagem.'</div><!--alert-->';
		}

		public static function logout(){
			session_destroy();
			header('location: '.INCLUDE_PATH.'/admin');
			die();
		}

		public static function log(){
			session_destroy();
			header('location: '.INCLUDE_PATH.'/admin');
			die();
		}

	}

?>