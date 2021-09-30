<?php 

	namespace Controllers;

	class AdminController{

		private $view;

		public function executar(){
			//Logar
			\Router::rota('admin',function(){
				$this->view = new \Views\PainelView('login');
				$this->view->render();
			});

			//Home Painel
			\Router::rota('admin/painel',function(){
				$this->view = new \Views\PainelView('home');
				$this->view->render();
			});

			//PAgina Painel
			\Router::rota('admin/painel/?',function($par){
				$pag = ($par[0] == '') ? 'home' : $par[0];
				$this->view = new \Views\PainelView($pag);
				$this->view->render($par);
			});
			
		}

	}

?>