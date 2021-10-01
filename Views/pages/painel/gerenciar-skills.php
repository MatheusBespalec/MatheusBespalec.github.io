<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

?>
<h1>Gerenciar Skills</h1>

<div class="box-content">
	<div class="wraper-alert"></div><!--wraper-alert-->
	<h2>Skills:</h2>
	<div class="wraper-boxes">
	<?php 
		$skills = \Models\MySql::conect()->prepare("SELECT 
			`tb_site.skills`.`id` AS `skill_id`,
			`tb_site.skills`.`nome` AS `skill_nome`, 
			`tb_site.skills`.`categoria_id`,
			`tb_site.skills`.`icone`,
			`tb_site.skills`.`cor`,
			`tb_site.categoria_skill`.`nome` AS `categoria_nome`

			FROM `tb_site.skills` 
			INNER JOIN `tb_site.categoria_skill` ON `tb_site.skills`.`categoria_id` = `tb_site.categoria_skill`.`id`
			ORDER BY `tb_site.skills`.`categoria_id`");

		$skills->execute();
		$skills = $skills->fetchAll(PDO::FETCH_ASSOC);
		foreach($skills as $key => $value){
	?>
			<div class="w30 box">
				<form method="post" class="ajax" action="<?php echo INCLUDE_PATH; ?>Models/ajax/skillAjax.php">
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

					<div class="form-group">
						<label>Icone:</label>
						<input type="text" name="skill_icon" value="<?php echo $value['icone'] ?>" />
					</div><!--form-group-->

					<div class="form-group">
						<label>Cor do Icone:</label>
						<input type="text" name="icon_cor" value="<?php echo $value['cor'] ?>" />
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
	<div class="wraper-alert"></div><!--wraper-alert-->
	<h2>Adicionar nova Skill:</h2>

	<div class="box">
		<form method="post" class="ajax" action="<?php echo INCLUDE_PATH; ?>Models/ajax/skillAjax.php">
			<div class="form-group">
				<label>Categoria:</label>
				<select name="categoria_id">
					<?php 
						$categorias = \Models\MySql::selectAll('tb_site.categoria_skill');
						foreach ($categorias as $key => $valueCategoria) {
					?>
						<option
							value="<?php echo $valueCategoria['id']; ?>">
							<?php echo $valueCategoria['nome']; ?>
						</option>
					<?php 
						}
					?>
				</select>
			</div><!--form-group-->
			<div class="form-group">
				<label>Nome da Skill:</label>
				<input type="text" name="skill_nome" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Icone da Skill:</label>
				<input type="text" name="skill_icon" />
			</div><!--form-group-->

			<div class="form-group">
				<label>Cor do Icone:</label>
				<input type="text" name="icon_cor" />
			</div><!--form-group-->
			<input type="submit" name="nova_skill" value="Adicionar Skill" />
		</form>
	</div><!--box-->
</div><!--box-content-->

<div class="box-content">
	<div class="wraper-alert"></div><!--wraper-alert-->
	<h2>Categorias das Skills:</h2>
	<div class="wraper-boxes">
	<?php 
		foreach($categorias as $key => $value){
	?>
			<div class="w30 box">
				<form method="post" class="ajax" action="<?php echo INCLUDE_PATH; ?>Models/ajax/categoriaAjax.php">
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
	<div class="wraper-alert"></div><!--wraper-alert-->
	<h2>Adicionar nova Categoria:</h2>

	<div class="box">
		<form method="post" class="ajax" action="<?php echo INCLUDE_PATH; ?>Models/ajax/categoriaAjax.php">
			<div class="form-group">
				<label>Nova Categoria:</label>
				<input type="text" name="nome_categoria" placeholder="Nome da nova categoria..." />
			</div><!--form-group-->
			<input type="submit" name="nova_categoria" value="Adicionar Categoria" />
		</form>
	</div><!--box-->
</div><!--box-content-->