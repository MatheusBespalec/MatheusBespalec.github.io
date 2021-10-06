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

<h1><a href="<?php echo INCLUDE_PATH_PAINEL; ?>gerenciar/skills">Gerenciar Skills</a> > Editar Skill</h1>

<div class="box-content">
	<?php

		if (isset($_POST['atualizar_skill'])) {
			$nome      = $_POST['nome'];
			$categoria = $_POST['categoria'];
			$cor       = $_POST['cor'];
			$icone     = $_POST['icone'];

			if(Models\MySql::update('tb_site.skills',[
				'nome'=>$nome,
				'categoria_id'=>$categoria,
				'icone'=>$icone,
				'cor'=>$cor],
			'WHERE id = ?',[$id])){
				Models\Painel::alert('sucesso','Skill '.$nome.' atualizado com sucesso!');
			}else{
				Models\Painel::alert('erro','Erro ao atualizar skill '.$nome.'!');
			}
		}

		$skill = Models\MySql::select('tb_site.skills','WHERE id = ?',[$id]);
		
	?>

	<h2>Skill <?php echo $skill['nome']; ?>:</h2>

	<div class="box">
		<form method="post">
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" value="<?php echo $skill['nome']; ?>" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Categopria:</label>
				<select name="categoria">
					<?php 
						$categorias = Models\MySql::selectAll('tb_site.categoria_skill');
						foreach($categorias as $key => $categoriaValue){
					?>
						<option 
							value="<?php echo $categoriaValue['id']; ?>" 
							<?php echo ($categoriaValue['id'] == $skill['categoria_id']) ? 'selected' : ''; ?>>
							<?php echo $categoriaValue['nome']; ?>
						</option>
					<?php 
						}
					?>
				</select>
			</div><!--form-group-->

			<div class="form-group">
				<label>Icone:</label>
				<input type="text" name="icone" value="<?php echo $skill['icone']; ?>" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Cor do Icone:</label>
				<input type="text" name="cor" value="<?php echo $skill['cor']; ?>" />
			</div><!--form-group-->
			
			<input type="submit" name="atualizar_skill" value="Atualizar Skill" />
		</form>
	</div><!--w30-->
</div><!--box-content-->