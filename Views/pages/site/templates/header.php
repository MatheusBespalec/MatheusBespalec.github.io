<?php \Models\Online::newLog(); ?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Links -->
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_FULL; ?>pages/site/css/style.css">
			<!-- Google Fonts -->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400&display=swap" rel="stylesheet">
		<!--  -->

		<title>Matheus Bespalec | Desenvolvedor Web</title>

		<!-- Meta Tags -->
			<!-- UTF-8 -->
			<meta charset="utf-8">
			<!-- Responsivo -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- SEO -->
			<meta name="keywords" content="" />
			<meta name="description" content="" />
			<meta name="author" content="Matheus Bespalec - matheusbespalec@gmail.com">
			<meta http-equiv="X-UA-Compatible" content="IE=Edge">
			<meta name="robots" content="index,follow">
		<!--  -->

		<!-- Icone -->
		<link rel="icon" href="" type="image/x-icon" />
	</head>
	<body>
		<header class="home">
			<h1>Matheus</h1>

			<nav class="desktop">
				<ul>
					<li><a href="home">Home</a></li>
					<li><a href="sobre">Sobre</a></li>
					<li><a href="portifolio">Portifólio</a></li>
					<li><a href="contato">Contato</a></li>
				</ul>
			</nav><!--desktop-->

			<div class="icon-menu">
				<i class="fas fa-bars"></i>
			</div><!--icon-meni-->
		</header>
		<nav class="mobile">
			<div class="icon-menu">
				<i class="fas fa-times"></i>
			</div><!--icon-meni-->
			<ul>
				<li><a href="home">Home</a></li>
				<li><a href="sobre">Sobre</a></li>
				<li><a href="portifolio">Portifólio</a></li>
				<li><a href="contato">Contato</a></li>
				<li>
					<div style="position: relative; z-index: 2;" class="wraper-sociais">
						<a href="https://github.com/MatheusBespalec/" target="_blank"><i class="fab fa-github"></i></a>
						<a href="https://linkedin.com/in/matheus-bespalec-927616149/" target="_blank"><i class="fab fa-linkedin"></i></a>
						<a href="https://api.whatsapp.com/send?phone=5511968997403&text=Ol%C3%A1" target="_blank"><i class="fab fa-whatsapp"></i></a>
					</div><!--wraper-sociais-->
				</li>
			</ul>

		</nav><!--mobile-->