<!DOCTYPE html>
<html>
	<head>
		<!-- Links -->
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_FULL; ?>pages/painel/css/style.css">
			<!-- Google Fonts -->
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400&display=swap" rel="stylesheet">
		<!--  -->

		<title>Painel de Controle</title>

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
			<meta name="robots" content="noindex,nofollow">
		<!--  -->

		<!-- Icone -->
		<link rel="icon" href="" type="image/x-icon" />
	</head>
	<body>
		<?php 
	
			//Deslogar
			if(isset($_GET['logout']) || !isset($_SESSION['logado'])){
				\Models\Painel::logout();
			}

		?>
		<header class="home">
			<div class="btn-menu"><i class="fas fa-bars"></i> Menu</div><!--btn-menu-->
			<div class="btn-loggout"><a href="?logout"><i class="fas fa-sign-out-alt"></i> Sair</a></div><!--btn-loggout-->
		</header>

		<div class="content">