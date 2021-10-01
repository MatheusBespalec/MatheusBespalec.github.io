<?php 
	
	define('HOST','localhost');
	define('DB','portifolio');
	define('USER','root');
	define('PASS','');
	
	include('../MySql.php');

	if (isset($_POST['nova_categoria'])) {
		$nome = $_POST['nome_categoria'];

		if(\Models\MySql::insert('tb_site.categoria_skill',[$nome])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Categoria cadastrada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao cadastrar categoria!';
		}

		die(json_encode($data));
	}

	if (isset($_POST['atualizar_categoria'])) {
		$nome = $_POST['nome_categoria'];
		$id = $_POST['id_categoria'];

		if(\Models\MySql::update('tb_site.categoria_skill',['nome'=>$nome],"WHERE id = ?",[$id])){
			$data['tipo'] = 'sucesso';
			$data['mensagem'] = 'Categoria atualizada com sucesso!';
		}else{
			$data['tipo'] = 'erro';
			$data['mensagem'] = 'Erro ao atualizar categoria!';
		}
		die(json_encode($data));
	}

?>