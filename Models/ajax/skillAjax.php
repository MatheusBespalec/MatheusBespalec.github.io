<?php 

	//DB
	define('HOST','localhost');
	define('DB','portifolio');
	define('USER','root');
	define('PASS','');

	include('../MySql.php');

	if (isset($_POST['nova_skill'])) {
		$categoria = $_POST['categoria_id'];
		$nome = $_POST['skill_nome'];
		$icon = $_POST['skill_icon'];
		$cor = $_POST['icon_cor'];

		if(\Models\MySql::insert('tb_site.skills',[$categoria,$nome,$icon,$cor])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Skill cadastrada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao cadastrar skill!';
		}

		die(json_encode($data));
	}

	if (isset($_POST['atualizar_skill'])) {
		$id = $_POST['skill_id'];
		$nome = $_POST['skill_nome'];
		$categoria = $_POST['categoria_id'];
		$icon = $_POST['skill_icon'];
		$cor = $_POST['icon_cor'];
		
		if(\Models\MySql::update('tb_site.skills',[
			'nome'=>$nome,
			'categoria_id'=>$categoria,
			'icone'=>$icon,
			'cor'=>$cor
		],"WHERE id = ?",[$id])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Skill atualizada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao atualizar skill!';
		}

		die(json_encode($data));
	}


?>