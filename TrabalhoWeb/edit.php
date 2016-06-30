<?php
	require_once 'init.php';
	include_once 'clientes.class.php';
	
	
	//Pegando os dados do formulário
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	$dataCadastro = isset($_POST['dataCad']) ? $_POST['dataCad'] : null;
	if(empty($name) || empty($email)){
		echo "Campos devem ser preenchidos!!!";
		exit;
	}
	
	$cliente = new Clientes($name, $dataCadastro, $email);
	$PDO = db_connect();
	$sql = "UPDATE clientes SET nomeCliente = :name, dataCadastro = :dataCadastro, email = :email WHERE idClientes = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $cliente->getNome());
	$stmt->bindParam(':dataCadastro', $cliente->getDataCadastro());
	$stmt->bindParam(':email', $cliente->getEmail());
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	
	if($stmt->execute()){
		header('Location: clientes.php');
	}else{
		echo "Erro ao alterar";
		print_r($stmt->errorInfo());
	}
?>
