<?php 
include "conexao/conexao.php";
$acao = sqlinj($_REQUEST[acao]);
if(isset($acao) && $acao == 'cadastrar'){
	    echo '<script> alert("entrou no cadastrar");</script>';
		$tipopessoa 	= sqlinj(addslashes($_POST['tipopessoa']));
		$nome 			= sqlinj(addslashes($_POST['nome']));
		$sobrenome 		= sqlinj(addslashes($_POST['sobrenome']));
		$cpfcnpj 		= validaCPF(sqlinj(addslashes($_POST['cpfcnpj'])));
		$nascimento 	= sqlinj(addslashes($_POST['nascimento']));
		$email 			= sqlinj(addslashes($_POST['email']));
		$sexo 			= sqlinj(addslashes($_POST['sexo']));
		$senha 			= sqlinj(addslashes($_POST['senha']));
		md5($senha1 		= sqlinj(addslashes($_POST['senha'])));
		$senha2		 	= sqlinj(addslashes($_POST['senha2']));
		$cep			= sqlinj(addslashes($_POST['cep']));
		$endereco 		= sqlinj(addslashes($_POST['endereco']));
		$numero 		= sqlinj(addslashes($_POST['numero']));
		$complemento 	= sqlinj(addslashes($_POST['complemento']));
		$bairro 		= sqlinj(addslashes($_POST['bairro']));
		$cidade 		= sqlinj(addslashes($_POST['cidade']));
		$estado			= sqlinj(addslashes($_POST['estado']));
		$ddd1 			= sqlinj(addslashes($_POST['ddd1']));
		$ddd2 			= sqlinj(addslashes($_POST['ddd2']));
		$login			= sqlinj(addslashes($_POST['login']));
		$telefone1 		= sqlinj(addslashes($_POST['telefone1']));
		$telefone2 		= sqlinj(addslashes($_POST['telefone2']));
		$ativo 		= 'S';
		$newslatter	 			= sqlinj($_POST['newslatter']);
		
		//inverte a data para o formato sql - para ser salvo no banco
		$dataNova = implode('-',array_reverse(explode('/',$nascimento)));

		$data = date("Y-m-d G:i:s");
		
		
		
		
				//faz uma consulta no Bd para verficar se o cliente(pelo email) já existe
				$verifica = mysql_query("SELECT * FROM tb_cliente WHERE email = '$email' or login= '$login'") or die(mysql_error());
		
				//conta no banco de dados qts registro existe
				$contar = mysql_num_rows($verifica);
				if($contar >= '1'){
					echo '<script> alert("Cliente já cadastrado em nossa loja, clique em recuperar senha!")</script>';
					echo '<script> history.back()</script>';
				}else{
		
					$sql = "insert into tb_cliente(login, imagem, nome, sobrenome, nascimento, email, sexo, senha, senha_md5, cep, endereco, numero, complemento, bairro, id_cidade, id_estado, ddd1, ddd2, telefone1, telefone2, ativo,newslatter) values ('$login','$arquivo','$nome','$sobrenome', '$dataNova', '$email', '$sexo', '$senha', '$senha1','$cep','$endereco', '$numero','$complemento','$bairro', '$cidade', '$estado', '$ddd1','$ddd2','$telefone1','$telefone2','$ativo','$newslatter')";
					echo '<script> alert("inseriu no banco de dados");</script>';
					$result = mysql_query($sql) or die(mysql_error());
					if($result > 0){
						echo "<script>alert('Cadastrado realizado com sucesso! Efetue Login !');document.location='index.php?pagina=form_login&acao=login'</script>";
		 
					
				}}
}


?>