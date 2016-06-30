<?php
	require 'init.php';
	$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
	if(empty($id)){
		echo "Id para altração não definido";
		exit;
	}
	$PDO = db_connect();
	$sql = "SELECT nomeCliente, dataCadastro, email FROM clientes WHERE idClientes = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if(!is_array($cliente)){
		echo "Nenhum cliente encontrado!!!";
		exit;
	}
	
	$dataOK = dateConvert($cliente['dataCadastro']);
?>

<!-- Trabalho feito por Bruna Tobias e Giovani Junior -->
<!DOCTYPE html>
<html lang=pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clientes e Fornecedores</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Javascript -->
        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/datepicker-pt-BR.js"></script>
        <script src="assets/js/jquery.maskedinput.js"></script>
        <script src="assets/js/ajax.js"></script>
        <script>
            $(function(){
			$("body").on("click", ".calendario", function(){
			if (!$(this).hasClass("hasDatepicker"))
			{
				$(this).datepicker({
					showButtonPanel: true,
					changeMonth: true,
					changeYear: true,
					maxDate: "today",
					minDate: new Date('01/01/2000'),
					showOn:"button",
					buttonImage:"assets/img/calendario.png",
					buttonImageOnly:true
				});
				$(this).datepicker("show");
			}	
			});
		});
		$(function(){
			$("body").on("click", ".calendariofundacao", function(){
			if (!$(this).hasClass("hasDatepicker"))
			{
				$(this).datepicker({
					showButtonPanel: true,
					changeMonth: true,
					changeYear: true,
					maxDate: "today",
					minDate: new Date('01/01/1950'),
					showOn:"button",
					buttonImage:"assets/img/calendario.png",
					buttonImageOnly:true
				});
				$(this).datepicker("show");
			}	
			});
		});
        </script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        
        <!-- Top menu -->
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Andia - a super cool design agency...</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="menutopo">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="index.html"><i class="fa fa-home"></i><br>Home</a>
							</li>
							<li>
								<a href="clientes.php"><i class="fa fa-user"></i><br>Clientes</a>
							</li>
							<li>
								<a href="fornecedores.php"><i class="fa fa-tasks"></i><br>Fornecedores</a>
							</li>
							<li>
								<a href="sobre.html"><i class="fa fa-user"></i><br>Sobre</a>
							</li>
						</ul>
				</div>
			</div>
		</nav>
		
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="conteudo">
	<body>
		<form method="post" name="formAltera" action="edit.php" enctype="multipart/form-data">
			<h1>Edição de dados - Cliente</h1>
			<table width="50%" align="center">
				<tr>
					<th width="18%"> Nome do cliente: </th>
					<td width="82%"><input type="text" name="txtNome" value="<?php echo $cliente['nomeCliente']?>"></td>
				</tr>
				<tr>
					<th> Email: </th>
					<td><input type="text" name="txtEmail" value="<?php echo $cliente['email']?>"></td>
				</tr>
				<tr>
					<th> Data do cadastro: </th>
					<td><input type="text" name="dataCad" class="calendario" value="<?php echo $dataOK?>"/></td>
				</tr>
				<tr>
					<hidden><td><input type="hidden" name="id" value="<?php echo $id?>"></td></hidden>
					<td><input type="submit" name="btnEnviar" value="Alterar" /></td>
					<td><input type="reset" name="btnApagar" value="Limpar" /></td>
				</tr>
			</table>
		</form>
	
	</body>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="rodape">
					<p>Copyright 2016 Bruna Tobias e Giovani Junior - Todos os direitos reservados. Template by <a href="http://azmind.com">Azmind</a>.</p>
				</div>
            </div>
        </footer>
    </body>

</html>

