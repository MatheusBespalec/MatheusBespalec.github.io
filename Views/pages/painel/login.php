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
		<!-- Tittle -->
			<title>Login</title>
		<!--  -->

		<!-- Metea Tags -->
			<!-- UTF-8 -->
			<meta charset="utf-8">
			<!-- Responsivo -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- SEO -->
			<meta name="author" content="Matheus Bespalec - matheusbespalec@gmail.com">
			<meta http-equiv="X-UA-Compatible" content="IE=Edge">
			<meta name="robots" content="noindex,nofollow">
		<!--  -->
	</head>
	<body style="display: flex;align-items: center;justify-content: center;">
		<form class="login" method="post">

			<?php

				if(isset($_POST['login'])){
					$user = $_POST['user'];
					$pass = $_POST['pass'];

					$sql = \Models\MySql::conect()->prepare("SELECT * FROM `tb_admin.user` WHERE user = ? AND pass = ?");
					$sql->execute([$user,$pass]);

					if($sql->rowCount() == 1){
						$usuario = $sql->fetch();

						$_SESSION['user'] = $user;
						$_SESSION['pass'] = $pass;
						$_SESSION['nome'] = $usuario['nome'];
						$_SESSION['logado'] = true;

						header('location: '.INCLUDE_PATH.'admin/painel/');
						die();

					}else{
						\Models\Painel::alert('erro','Usuário ou senha invalidos!');
					}
				}

			?>

			<div class="form-group">
				<label>Login:</label>
				<input type="text" name="user" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Senha:</label>
				<input type="password" name="pass" />
			</div><!--form-group-->

			<input type="submit" name="login" value="Logar!" />
		</form>
	</body>
</html>