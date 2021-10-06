<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

	if(isset($_GET['deletarProjeto'])){
		$projeto = Models\MySql::select('tb_site.projetos','WHERE id = '.$_GET['deletarProjeto']);

		Models\Files::deleteFile($projeto['imagem_capa']);

		Models\MySql::delete('tb_site.projetos','WHERE id = '.$_GET['deletarProjeto']);
		header('location: http://localhost/site_dinamico/admin/painel/gerenciar/projetos');
		die();
	}

?>
<h1>Gerenciar Projetos</h1>

<div class="box-content">

	<h2>Projetos:</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>Imagem</td>
			<td>Titulo</td>
			<td>#</td>
			<td>#</td>
		</tr>
	<?php 
		$projetos = \Models\MySql::selectAll('tb_site.projetos');
		foreach($projetos as $key => $value){
	?>
		<tr>
			<td><img src="<?php echo INCLUDE_PATH_FULL.'/images/portifolio/'.$value['imagem_capa']; ?>" /></td>
			<td><?php echo $value['titulo'] ?></td>
			<td>
				<a class="btn info" href="<?php echo INCLUDE_PATH_PAINEL; ?>editar/projeto?id=<?php echo $value['id']?>">Informações</a>
			</td>
			<td>
				<a class="btn delete" href="?deletarProjeto=<?php echo $value['id'] ?>">Deletar</a>
			</td>
		</tr>
	<?php 
		}
	?>
	</table>
	</div><!--wraper-table-->
</div><!--box-content-->

<div class="box-content">
	<h2>Cadastrar novo Projeto:</h2>

	<div class="box">
		<form method="post" enctype="multipart/form-data" class="ajax">
			<div class="form-group">
				<label>Titulo do Projeto:</label>
				<input type="text" name="titulo" required />
			</div><!--form-group-->

			<div class="form-group">
				<label>Capa do Projeto</label>
				<input type="file" name="capa" required />
			</div><!--form-group-->

			<div class="form-group">
				<label>GitHub:</label>
				<input type="text" name="github" required />
			</div><!--form-group-->

			<div class="form-group">
				<label>Link:</label>
				<input type="text" name="link" />
			</div><!--form-group-->
			<input type="hidden" name="identificador" value="cadastrar_projeto">
			
			<input type="submit" name="novo_projeto" value="Cadastrar Projeto" />
		</form>
	</div><!--w30-->
</div><!--box-content-->