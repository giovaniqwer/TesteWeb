<div class="conteudo">
	
	<!---------------PHP--------------------->
	<?php
		require_once 'init.php';
	?>
	<!------------FIM DO PHP----------------->
	<h1>Cadastro fornecedores</h1>
	<form method="post" onSubmit="return validacliente()" name="formCadastroFornecedores" action="add2.php" enctype="multipart/form-data">
	<table width="50%" align="center">
		<tr>
			<th width="18%"> Nome do fornecedor: </th>
			<td width="82%"><input type="text" name="txtNome" id="txtNome"></td>
		</tr>
		<tr>
			<th> Email: </th>
			<td ><input type="text" name="txtEmail" id="txtEmail"></td>
		</tr>
		<tr>
			<th> Data de fundação: </th>
			<td ><input type="text" class="calendariofundacao" name="dataFund"></td>
		</tr>
		<tr>
			<td><input type="submit" name="btnEnviar2" value="Cadastrar" /></td>
			<td><input type="reset" name="btnApagar2" value="Apagar" /></td>
		</tr>
	</table>
	</form>
	<br><br>
</div>
