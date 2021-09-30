<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

	if (isset($_POST['atualizar_categoria'])) {
		$nome = $_POST['nome_categoria'];
		$id = $_POST['id_categoria'];

		\Models\MySql::update('tb_site.categoria_skill',['nome'=>$nome],"WHERE id = ?",[$id]);
	}

	if (isset($_POST['atualizar_skill'])) {
		$id = $_POST['skill_id'];
		$nome = $_POST['skill_nome'];
		$categoria = $_POST['categoria_id'];
		
		\Models\MySql::update('tb_site.skills',['nome'=>$nome,'categoria_id'=>$categoria],"WHERE id = ?",[$id]);
	}

?>
<h1>Gerenciar Skills</h1>

<div class="box-content">

	<h2>Skills:</h2>
	<div class="wraper-boxes">
	<?php 
		$skills = \Models\MySql::conect()->prepare("SELECT 
			`tb_site.skills`.`id` AS `skill_id`,
			`tb_site.skills`.`nome` AS `skill_nome`, 
			`tb_site.skills`.`categoria_id`,
			`tb_site.categoria_skill`.`nome` AS `categoria_nome`

			FROM `tb_site.skills` 
			INNER JOIN `tb_site.categoria_skill` ON `tb_site.skills`.`categoria_id` = `tb_site.categoria_skill`.`id`
			ORDER BY `tb_site.skills`.`categoria_id`");

		$skills->execute();
		$skills = $skills->fetchAll(PDO::FETCH_ASSOC);
		foreach($skills as $key => $value){
	?>
			<div class="w30 box">
				<form method="post">
					<div class="form-group">
						<label>Categoria:</label>
						<select name="categoria_id">
							<?php 
								$categorias = \Models\MySql::selectAll('tb_site.categoria_skill');
								foreach ($categorias as $key => $valueCategoria) {
							?>
								<option
									value="<?php echo $valueCategoria['id']; ?>" 
									<?php echo ($valueCategoria['id'] == $value['categoria_id']) ? 'selected' : ''; ?>>
									<?php echo $valueCategoria['nome']; ?>
								</option>
							<?php 
								}
							?>
						</select>
					</div><!--form-group-->

					<div class="form-group">
						<label>Nome da Skill:</label>
						<input type="text" name="skill_nome" value="<?php echo $value['skill_nome'] ?>" />
					</div><!--form-group-->
					
					<input type="hidden" name="skill_id" value="<?php echo $value['skill_id'] ?>" />
					<input type="submit" name="atualizar_skill" value="Atualizar Skill" />
				</form>
			</div><!--w30-->
	<?php 
		}
	?>
	</div><!--wraper-boxes-->
</div><!--box-content-->

<div class="box-content">
	<h2>Adicionar nova Skill:</h2>

	<div class="box">
		<form method="post">
			<div class="form-group">
				<label>Categoria:</label>
				<select>
					<?php 
						$categorias = \Models\MySql::selectAll('tb_site.categoria_skill');
						foreach ($categorias as $key => $valueCategoria) {
					?>
						<option
							value="<?php echo $valueCategoria['id']; ?>" 
							<?php echo ($valueCategoria['id'] == $value['categoria_id']) ? 'selected' : ''; ?>>
							<?php echo $valueCategoria['nome']; ?>
						</option>
					<?php 
						}
					?>
				</select>
			</div><!--form-group-->
			<div class="form-group">
				<label>Nome da Skill:</label>
				<input type="text" name="nome_categoria" />
			</div><!--form-group-->
			<input type="submit" name="atualizar_categoria" value="Adicionar Skill" />
		</form>
	</div><!--box-->
</div><!--box-content-->

<div class="box-content">

	<h2>Categorias das Skills:</h2>
	<div class="wraper-boxes">
	<?php 
		foreach($categorias as $key => $value){
	?>
			<div class="w30 box">
				<form method="post">
					<div class="form-group">
						<label>Nome da Categoria:</label>
						<input type="text" name="nome_categoria" value="<?php echo $value['nome']; ?>" />
						<input type="hidden" name="id_categoria" value="<?php echo $value['id']; ?>" />
					</div><!--form-group-->
					<input type="submit" name="atualizar_categoria" value="Atualizar Nome" />
				</form>
			</div><!--w30-->
	<?php 
		}
	?>
	</div><!--wraper-boxes-->
</div><!--box-content-->

<div class="box-content">
	<h2>Adicionar nova Categoria:</h2>

	<div class="box">
		<form method="post">
			<div class="form-group">
				<label>Nova Categoria:</label>
				<input type="text" name="nome_categoria" placeholder="Nome da nova categoria..." />
			</div><!--form-group-->
			<input type="submit" name="atualizar_categoria" value="Adicionar Categoria" />
		</form>
	</div><!--box-->
</div><!--box-content-->