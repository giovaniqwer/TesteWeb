<?php
	require_once 'init.php';
	include_once 'clientes.class.php';
	
	$dadosok = true;
	
	//Dados do formulário
	$name = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	$dataCadastro = isset($_POST['dataCad']) ? $_POST['dataCad'] : null;
	
	if(empty($name) || empty($email)){
		echo "Campos devem ser preenchidos!!!";
		echo $dataCadastro;
		exit;
	}
	
	//Instanciando
	$cliente = new Clientes($name, $dataCadastro, $email);
	
	//Inserindo
	$PDO = db_connect();
	$sql = "INSERT INTO clientes(nomeCliente, email, dataCadastro) VALUES (:name, :email, :dataCadastro)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name', $cliente->getNome());
	$stmt->bindParam(':email', $cliente->getEmail());
	$stmt->bindParam(':dataCadastro', $cliente->getDataCadastro());
	
	if($stmt->execute()){
			header('Location: clientes.php');
	}else{
		echo "Erro ao cadastrar!!";
		print_r($stmt->errorInfo());
	}
	
?>
