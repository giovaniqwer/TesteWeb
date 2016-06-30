$(document).ready(function(e){
	$("#menutopo a").click(function(e){	
		e.preventDefault();
		var href = $(this).attr('href');
		$(".conteudo").load(href + " .conteudo");
 	});
});

function chamaajax(botao) {
	//AJAX PARA AS PÁGINAS CLIENTE E FORNECEDORES
	var href = $(botao).attr('href');
	$(".conteudo").load(href + " .conteudo");
}

function validacliente(){
	var situacao = true;
	if(document.getElementById('txtNome').value == "" || (document.getElementById('txtNome').value == null)){
			alert("O campo nome deve ser preenchido!!!");
			situacao = false;
	}else if(document.getElementById('txtEmail').value == "" || (document.getElementById('txtEmail').value == null)){
			alert("O campo email deve ser preenchido!!!");
			situacao = false;
	}
	return situacao;
}

