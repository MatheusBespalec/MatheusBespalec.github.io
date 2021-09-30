<?php 

	namespace Controllers;

	class HomeController{

		private $view;

		public function __construct(){
			
		}

		public function executar(){
			\Router::rota('home',function(){
				$this->view = new \Views\MainView('home');
				$this->view->render();
			});	
		}

	}

?>