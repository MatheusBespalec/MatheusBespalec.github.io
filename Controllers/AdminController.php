<?php 

	namespace Controllers;

	class AdminController{

		private $view;
		private static $page = '';

		private static function formatPage($arr){
			foreach ($arr as $key => $value) {
				if($key == 0)
					self::$page.=$value;
				else
					self::$page.="-$value";
			}
		}

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

			//Pagina Home
			\Router::rota('admin/painel/?',function($par){
				$this->view = new \Views\PainelView('home');
				$this->view->render();
			});

			\Router::rota('admin/painel/?/?',function($par){
				self::formatPage($par);
				$this->view = new \Views\PainelView(self::$page);
				$this->view->render($par);
			});
		}

	}

?>