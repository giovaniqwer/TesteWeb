<?php
	require_once 'init.php';
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	if(empty($id)){
		echo "Id não informado";
		exit;
	}
	
	$PDO = db_connect();
	$sql = "DELETE FROM fornecedores WHERE idFornecedor = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	if($stmt->execute()){
		header('Location: fornecedores.php');
	}else{
		echo "Erro ao excluir";
		print_r($stmt->errorInfo());
	}
?>
