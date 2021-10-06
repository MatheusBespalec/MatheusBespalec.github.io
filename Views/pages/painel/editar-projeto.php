<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

	if(!isset($_GET['id'])){
		header('location: http://localhost/site_dinamico/admin/painel/gerenciar/projeto');
		die();
	}else{
		$id = $_GET['id'];
	}

?>	

<h1><a href="<?php echo INCLUDE_PATH_PAINEL; ?>gerenciar/projetos">Gerenciar Projetos</a> > Editar Projeto</h1>

<div class="box-content">
	<?php

		if (isset($_POST['atualizar_projeto'])) {
			$titulo = $_POST['titulo'];
			$capa   = $_POST['capa'];
			$github = $_POST['github'];
			$link   = $_POST['link'];

			if(Models\MySql::update('tb_site.projetos',[
				'titulo'=>$titulo,
				'imagem_capa'=>$capa,
				'github'=>$github,
				'link'=>$link],
			'WHERE id = ?',[$id])){
				Models\Painel::alert('sucesso',$titulo.' atualizado com sucesso!');
			}else{
				Models\Painel::alert('erro','erro ao atualizar '.$titulo.'!');
			}
		}

		$projeto = Models\MySql::select('tb_site.projetos','WHERE id = ?',[$id]);
		
	?>

	<h2>Projeto <?php echo $projeto['titulo']; ?>:</h2>

	<div class="box">
		<form method="post">
			<div class="form-group">
				<label>Titulo do Projeto:</label>
				<input type="text" name="titulo" value="<?php echo $projeto['titulo']; ?>" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Capa do Projeto</label>
				<input type="text" name="capa" value="<?php echo $projeto['imagem_capa']; ?>" />
			</div><!--form-group-->

			<div class="form-group">
				<label>GitHub:</label>
				<input type="text" name="github" value="<?php echo $projeto['github']; ?>" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Link:</label>
				<input type="text" name="link" value="<?php echo $projeto['link']; ?>" />
			</div><!--form-group-->
			
			<input type="submit" name="atualizar_projeto" value="Atualizar Projeto" />
		</form>
	</div><!--w30-->
</div><!--box-content-->