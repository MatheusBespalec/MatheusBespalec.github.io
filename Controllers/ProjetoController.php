<?php 

	namespace Controllers;

	class ProjetoController{

		private $view;

		public function executar(){
			\Router::rota('projeto',function(){
				$this->view = new \Views\MainView('projeto');
				$this->view->render();
			});
		}

	}

?>