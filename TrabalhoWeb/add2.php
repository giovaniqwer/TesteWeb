<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';
	
	$dadosok = true;
	
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	$dataFundacao = isset($_POST['dataFund']) ? $_POST['dataFund'] : null;
	
	if(empty($name) || empty($email)){
		echo "Campos devem ser preenchidos!!";
		exit;
	}
	
	$fornecedor = new Fornecedores($name, $email, $dataFundacao);
	
	$PDO = db_connect();
	$sql = "INSERT INTO fornecedores(nomeFornecedor, email, dataFundacao) VALUES (:name, :email, :dataFundacao)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $fornecedor->getNome());
	$stmt->bindParam(':email', $fornecedor->getEmail());
	$stmt->bindParam(':dataFundacao', $fornecedor->getDataFundacao());

	
	if($stmt->execute()){
		header('Location: fornecedores.php');
	}else{
		echo "Erro ao cadastrar!!";
		print_r($stmt->errorInfo());
	}
	
?>
