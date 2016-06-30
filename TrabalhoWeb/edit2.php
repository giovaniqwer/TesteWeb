<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';
	
	
	//Pegando os dados do formulário
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	$dataFundacao = isset($_POST['dataFund']) ? $_POST['dataFund'] : null;
	if(empty($name) || empty($email)){
		echo "Campos devem ser preenchidos!!!";
		exit;
	}
	
	$fornecedor = new fornecedores($name, $email, $dataFundacao);
	$PDO = db_connect();
	$sql = "UPDATE fornecedores SET nomeFornecedor = :name, dataFundacao = :dataFundacao, email = :email WHERE idFornecedor = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $fornecedor->getNome());
	$stmt->bindParam(':dataFundacao', $fornecedor->getDataFundacao());
	$stmt->bindParam(':email', $fornecedor->getEmail());
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	
	if($stmt->execute()){
		header('Location: fornecedores.php');
	}else{
		echo "Erro ao alterar";
		print_r($stmt->errorInfo());
	}
?>
