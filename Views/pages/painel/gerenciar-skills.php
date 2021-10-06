<?php 

	if(!isset($_SESSION['logado'])){
		session_destroy();
		header('location: http://localhost/site_dinamico/admin');
		die();
	}

	// Deletar
	if(isset($_GET['deletarCategoria'])){
		Models\MySql::delete('tb_site.categoria_skill','WHERE id = '.$_GET['deletarCategoria']);
		header('location: http://localhost/site_dinamico/admin/painel/gerenciar/skills');
		die();
	}else if(isset($_GET['deletarSkill'])){
		Models\MySql::delete('tb_site.skills','WHERE id = '.$_GET['deletarSkill']);
		header('location: http://localhost/site_dinamico/admin/painel/gerenciar/skills');
		die();
	}

?>
<h1>Gerenciar Skills</h1>

<div class="box-content">
	<h2>Skills:</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td>Icone</td>
				<td>Skill</td>
				<td>Categoria</td>
				<td>#</td>
				<td>#</td>
			</tr>
		<?php 
			$skills = \Models\MySql::conect()->prepare("SELECT 
				`tb_site.skills`.`id` AS `skill_id`,
				`tb_site.skills`.`nome` AS `skill_nome`, 
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

		<tr>
			<td><i class="<?php echo $value['icone']; ?>" style="color: <?php echo $value['cor']; ?>;" ></i></td>
			<td><?php echo $value['skill_nome']; ?></td>
			<td><?php echo $value['categoria_nome']; ?></td>
			<td><a class="btn info" href="<?php echo INCLUDE_PATH_PAINEL.'editar/skill?id='.$value['skill_id']; ?>">Editar</a></td>
			<td><a class="btn delete" href="?deletarSkill=<?php echo $value['skill_id'] ?>">Deletar</a></td>
		</tr>

		<?php 
			}
		?>
		</table>
	</div><!--wraper-table-->
</div><!--box-content-->

<div class="box-content">
	<h2>Adicionar nova Skill:</h2>
	<div class="wraper-alert"></div><!--wraper-alert-->
	<form method="post" class="ajax">
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
		<input type="hidden" name="identificador" value="nova_skill" />

		<input type="submit" name="action" value="Adicionar Skill" />
	</form>
</div><!--box-content-->

<div class="box-content">
	<div class="wraper-alert"></div><!--wraper-alert-->
	<h2>Categorias das Skills:</h2>
	<div class="wraper-boxes">
	<?php 
		foreach($categorias as $key => $value){
	?>
			<div class="w30 box">
				<form method="post" class="ajax">
					<div class="form-group">
						<label>Nome da Categoria:</label>
						<input type="text" name="nome_categoria" value="<?php echo $value['nome']; ?>" />
						<input type="hidden" name="id_categoria" value="<?php echo $value['id']; ?>" />
					</div><!--form-group-->
					<input type="hidden" name="identificador" value="atualizar_categoria" />
					<input type="submit" name="action" value="Atualizar" />
				</form>
				<br>
				<a class="btn delete" href="?deletarCategoria=<?php echo $value['id'] ?>">Deletar</a>
			</div><!--w30-->
	<?php 
		}
	?>
	</div><!--wraper-boxes-->
</div><!--box-content-->

<div class="box-content">
	<h2>Adicionar nova Categoria:</h2>

	<div class="wraper-alert"></div><!--wraper-alert-->

	<form method="post" class="ajax">
		<div class="form-group">
			<label>Nova Categoria:</label>
			<input type="text" name="nome_categoria" placeholder="Nome da nova categoria..." />
		</div><!--form-group-->
		<!-- Indentificador de Formilário -->
		<input type="hidden" name="identificador" value="nova_categoria" />

		<input type="submit" name="action" value="Adicionar Categoria" />
	</form>
</div><!--box-content-->