<?php 

	namespace Views;

	class PainelView{

		private $header;
		private $path;
		private $menu;

		public function __construct($path,$header='header',$menu='menu'){
			$this->header = $header;
			$this->path = $path;
			$this->menu = $menu;
		}

		public function render($par = []){
			if($this->path == 'login'){
				include('pages/painel/'.$this->path.'.php');
			}else{
				include('pages/painel/templates/'.$this->header.'.php');
				include('pages/painel/'.$this->path.'.php');
				include('pages/painel/templates/'.$this->menu.'.php');
			}
			
		}

	}

?>