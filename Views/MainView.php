<?php 

	namespace Views;

	class MainView{

		private $header;
		private $path;
		private $footer;

		public function __construct($path,$header='header',$footer='footer'){
			
			$this->header = $header;
			$this->path = $path;
			$this->footer = $footer;
		}

		public function render($par=[]){
			include('pages/site/templates/'.$this->header.'.php');
			include('pages/site/'.$this->path.'.php');
			include('pages/site/templates/'.$this->footer.'.php');
		}

	}

?>