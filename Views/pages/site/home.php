<?php 

	$site = \Models\MySql::select('tb_site.home');

?>
<section class="banner">
	<div class="overlay"></div><!--overlay-->
	<div class="container">
		<h1>Matheus Bespalec</h1>
		<p><?php echo $site['site_desc_banner']; ?></p><br>
		<a href="sobre">Conheca Mais Sobre Mim!</a>
	</div><!--container-->
</section><!--banner-->

<section class="sobre">
	<div class="container">
		<h3>Sobre</h3>
		<h2><?php echo $site['sobre_titulo']; ?></h2>
		<div class="wraper-sobre">
			<img src="<?php echo INCLUDE_PATH_FULL; ?>images/author.jpg" />
			<div>
			<p>
				<?php echo $site['sobre_text']; ?>
			</p>
			</div>
		</div><!--wraper-sobre-->
		
		<div class="w50">
			<h3>Perfil</h3>

			<h4>Nome</h4>
			<p>Matheus Bespalec Daloia</p>

			<h4>Idade</h4>
			<p>19</p>

			<h4>Educação</h4>
			<p style="margin: 0;">Cursando Sistemas de Informação</p>
			<p style="margin: 0;">Curso Webmaster Front-End (<a href="https://dankicode.com" target="_blank">DankiCode</a>)</p>
			<p>Curso Desenvolvimento Web (<a href="https://dankicode.com" target="_blank">DankiCode</a>)</p>

			<h4>Endereço</h4>
			<p>Ribeirão Pires - SP</p>

			<h4>E-mail</h4>
			<p>matheusbespalec@gmail.com</p>

			<h4>Telefone</h4>
			<p>(11) 96899-7403</p>

		</div><!--w50-->
		<div class="w50">
			<h3>Skills</h3>
			
			<h4>Front-End</h4>
			<ul class="main">
				<li><i class="fab fa-html5" style="color: #f78736;"></i> HTML5</li>
				<li><i class="fab fa-css3" style="color: #116dd6;"></i> CSS3</li>
				<li><i class="fab fa-js-square" style="color: #f0d10c;"></i> JavaScript(+JQuery)</li>
			</ul>

			<h4>Back-End</h4>
			<ul class="main">
				<li><i class="fab fa-php" style="color: #4091ed;"></i> PHP</li>
			</ul>

			<h4>Banco de Dados</h4>
			<ul class="main">
				<li><i class="fas fa-database"></i> MySql</li>
			</ul>

		</div><!--w50-->
		<div class="clear"></div><!--clear-->
	</div><!--container-->
</section><!--sobre-->

<section class="portifolio">
	<div class="container">
		<h3>Portifólio</h3>
		<h2><?php echo $site['portifolio_titulo']; ?></h2>

		<div class="wraper-projetos">
			<div class="projeto" style="background-image: url('<?php echo INCLUDE_PATH_FULL; ?>images/portifolio/portifolio.png');">
				<a href="https://github.com/MatheusBespalec/Portifolio" target="_blank"><div class="overlay"><i class="fas fa-external-link-alt"></i> Portifólio</div><!--overlay--></a>
			</div><!--projeto-->

			<div class="projeto" style="background-image: url('<?php echo INCLUDE_PATH_FULL; ?>images/portifolio/site_pequeno_negocio.png');">
				<a href="https://github.com/MatheusBespalec/sistema-pequeno-negocio" target="_blank"><div class="overlay"><i class="fas fa-external-link-alt"></i> Sistema de Pequeno Negócio</div><!--overlay--></a>
			</div><!--projeto-->
		</div><!--wraper-projetos-->

	</div><!--container-->
</section><!--portifolio-->

<section class="contato">
	<div class="container">
		<h3>Contato</h3>
		<h2><?php echo $site['contato_titulo']; ?></h2>

		<form method="post" class="ajax" action="<?php echo INCLUDE_PATH; ?>Models/Mail.php">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" required/>
			</div><!--form-group-->

			<div class="form-group">
				<label>E-mail:</label>
				<input type="email" name="email" required/>
			</div><!--form-group-->

			<div class="form-group">
				<label>Telefone:</label>
				<input type="text" name="telefone"/>
			</div><!--form-group-->

			<div class="form-group">
				<label>Sua Mensagem:</label>
				<textarea name="mensagem"></textarea>
			</div><!--form-group-->

			<input type="submit" name="action" value="Enviar!" />
		</form>
	</div><!--container-->
</section><!--contato-->

<div class="overlay-callback"></div><!--overlay-callback-->
<div class="callback">
	<img src="<?php echo INCLUDE_PATH_FULL; ?>images/ajax-loader.gif">
	<div class="icon">
		<i style="color: #71eb7b;" class="fas fa-check"></i>
		<i style="color: #f53b3b;" class="fas fa-times"></i>
	</div><!--icon-->
	<div class="mensagem"></div><!--mensagem-->
	<a>Ok!</a>
</div><!--callback-->