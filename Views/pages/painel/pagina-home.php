<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

?>

<div class="box-content">
	<h1>Atualizar Informações da Página</h1>
	<?php 

		if (isset($_POST['att'])) {
			
			if(\Models\MySql::update('tb_site.home',[
				'site_titulo'=>$_POST['site_titulo'],
				'site_desc_banner'=>$_POST['site_desc_banner'],
				'sobre_titulo'=>$_POST['sobre_titulo'],
				'sobre_text'=>$_POST['sobre_text'],
				'portifolio_titulo'=>$_POST['portifolio_titulo'],
				'contato_titulo'=>$_POST['contato_titulo']
			])){
				\Models\Painel::alert('sucesso','Site Atualizado com sucesso!');
			}else{
				\Models\Painel::alert('erro','Erro ao atualizar o site!');
			}

		}

		$site = \Models\MySql::select('tb_site.home');

	?>
	<h2>Site</h2>
	<form method="post">
		<div class="form-group">
			<label>Titulo:</label>
			<input type="text" name="site_titulo" value="<?php echo $site['site_titulo']; ?>" />
		</div><!--form-group-->

		<h2>Sessão Banner</h2>
		<div class="form-group">
			<label>Descrição do Banner:</label>
			<input type="text" name="site_desc_banner" value="<?php echo $site['site_desc_banner']; ?>" />
		</div><!--form-group-->

		<h2>Sessão Sobre</h2>
		<div class="form-group">
			<label>Titulo:</label>
			<input type="text" name="sobre_titulo" value="<?php echo $site['sobre_titulo']; ?>" />
		</div><!--form-group-->

		<div class="form-group">
			<label>Texto:</label>
			<textarea name="sobre_text"><?php echo $site['sobre_text']; ?></textarea>
		</div><!--form-group-->

		<h2>Sessão Portifólio</h2>
		<div class="form-group">
			<label>Portifólio Titulo:</label>
			<input type="text" name="portifolio_titulo" value="<?php echo $site['portifolio_titulo']; ?>" />
		</div><!--form-group-->

		<h2>Sessão Contato</h2>
		<div class="form-group">
			<label>Contato Titulo:</label>
			<input type="text" name="contato_titulo" value="<?php echo $site['contato_titulo']; ?>" />
		</div><!--form-group-->
	
		<input type="submit" name="att" value="Atualizar!" />

	</form>
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'textarea'});</script>
</div><!--box-content-->