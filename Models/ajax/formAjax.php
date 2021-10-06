<?php 
	
	include('../../config.php');

	use \Models\MySql;
	use \Models\Files;

	//CATEGORIAS

	if ($_POST['identificador'] == 'nova_categoria') {
		$nome = $_POST['nome_categoria'];

		if(MySql::insert('tb_site.categoria_skill',[$nome])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Categoria cadastrada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao cadastrar categoria!';
		}
	}

	if ($_POST['identificador'] == 'atualizar_categoria') {
		$nome = $_POST['nome_categoria'];
		$id   = $_POST['id_categoria'];

		if(MySql::update('tb_site.categoria_skill',['nome'=>$nome],"WHERE id = ?",[$id])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Categoria atualizada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao atualizar categoria!';
		}
	}

	//SKILLS

	if ($_POST['identificador'] == 'nova_skill') {
		$categoria = $_POST['categoria_id'];
		$nome      = $_POST['skill_nome'];
		$icon      = $_POST['skill_icon'];
		$cor       = $_POST['icon_cor'];

		if(MySql::insert('tb_site.skills',[$categoria,$nome,$icon,$cor])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Skill cadastrada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao cadastrar skill!';
		}
	}

	//EDUCAÇÃO

	if ($_POST['identificador'] == 'cadastrar_educacao') {
		$nome        = $_POST['nome'];
		$instituicao = $_POST['instituicao'];
		$link        = $_POST['link'];

		if(MySql::insert('tb_site.educacao',[$nome,$instituicao,$link])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Formação cadastrada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao cadastrar formação!';
		}
	}

	// PROJETO

	if ($_POST['identificador'] == 'cadastrar_projeto') {
		$titulo = $_POST['titulo'];
		$capa   = $_FILES['capa'];
		$github = $_POST['github'];
		$link   = $_POST['link'];

		if(Files::validImage($capa)){
			$imagem = Files::uploadImage($capa);
			if(MySql::insert('tb_site.projetos',[$titulo,$imagem,$github,$link])){
				$data['tipo'] = 'sucesso';
				$data['mensagem'] = 'Projeto '.$titulo.' cadastrado com sucesso!';
			}
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Imagem invalida!';
		}	
	}

	die(json_encode($data));

?>