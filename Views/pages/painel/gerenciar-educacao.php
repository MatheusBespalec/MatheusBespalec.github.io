<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

	if(isset($_POST['atualizar_formacao'])){
		$nome = $_POST['educacao_nome'];
		$instituicao = $_POST['educacao_instituicao'];
		$link = $_POST['educacao_link'];
		$id = $_POST['educacao_id'];

		\Models\MySql::update('tb_site.educacao',[
			'nome'=>$nome,
			'instituicao'=>$instituicao,
			'link'=>$link
		],"WHERE id = ?",[$id]);
	}

	if(isset($_GET['deletarFormacao'])){
		Models\MySql::delete('tb_site.educacao','WHERE id = '.$_GET['deletarFormacao']);
		header('location: http://localhost/site_dinamico/admin/painel/gerenciar/educacao');
		die();
	}

?>
<h1>Gerenciar Educação</h1>

<div class="box-content">

	<h2>Formações:</h2>
	<div class="wraper-boxes">
	<?php 
		$educacao = \Models\MySql::selectAll('tb_site.educacao');
		foreach($educacao as $key => $value){
	?>
			<div class="w50 box">
				<form method="post">
					<div class="form-group">
						<label>Titulo da Formação:</label>
						<input type="text" name="educacao_nome" value="<?php echo $value['nome'] ?>" />
					</div><!--form-group-->

					<div class="form-group">
						<label>Nome da Instituição:</label>
						<input type="text" name="educacao_instituicao" value="<?php echo $value['instituicao'] ?>" />
					</div><!--form-group-->

					<div class="form-group">
						<label>Link da Instituição:</label>
						<input type="text" name="educacao_link" value="<?php echo $value['link'] ?>" />
					</div><!--form-group-->
					
					<input type="hidden" name="educacao_id" value="<?php echo $value['id'] ?>" />
					<input type="submit" name="atualizar_formacao" value="Atualizar Formação" />
				</form>
				<br>
				<a class="btn delete" href="?deletarFormacao=<?php echo $value['id'] ?>">Deletar</a>
			</div><!--w30-->
	<?php 
		}
	?>
	</div><!--wraper-boxes-->
</div><!--box-content-->

<div class="box-content">
	<h2>Adicionar nova Formação:</h2>
	<div class="wraper-alert"></div><!--wraper-alert-->
	
	<form method="post" class="ajax">
		<div class="form-group">
			<label>Titulo da Formação:</label>
			<input type="text" name="nome" />
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome da Instituição:</label>
			<input type="text" name="instituicao" />
		</div><!--form-group-->

		<div class="form-group">
			<label>Link da Instituição:</label>
			<input type="text" name="link" />
		</div><!--form-group-->
		<input type="hidden" name="identificador" value="cadastrar_educacao" />
		
		<input type="submit" name="action" value="Adicionar Formação" />
	</form>
</div><!--box-content-->