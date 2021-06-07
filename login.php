<?php
session_start();
?>


<?php
//funcao para prevenir contra sql_injection
 function antisql($string) {
	$string = get_magic_quotes_gpc() ? stripslashes($string) : $string ;
	$string = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($string) : mysql_escape_string($string) ;
 return $string ;
 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

		$txt_login = sqlinj(trim( $_REQUEST['login'] ));
		$txt_senha = sqlinj(trim( $_REQUEST['senha'] ));
		
		
		if(empty($txt_login) or empty($txt_senha))
		{
			echo "<script> alert('Login/Senha obrigatorios')</script>";
			echo '<script>history.back()</script>';
			exit;
		}
		
		
		//busca os dados do cliente, estado e cidade em suas tabelas
		
		$sql = "SELECT * FROM tb_cidades c, tb_estados e, tb_cliente cli WHERE c.estado = e.id AND  cli.id_cidade = c.id AND cli.login = '$txt_login' AND cli.senha = '$txt_senha'";
		$resultado = mysql_query($sql);
		$linha = mysql_fetch_array($resultado);
		
		if(mysql_num_rows($resultado) > 0)
		{
		if($linha[ativo] == "S"){
			$cliente[ID] 		= $linha[id_cliente];
			$cliente[NOME]	 	= $linha[nome];
			$cliente[CEP]	 	= $linha[cep];
			$cliente[ENDERECO]	= $linha[endereco];
			$cliente[NUMERO]	= $linha[numero];
			$cliente[BAIRRO]	= $linha[bairro];
			$cliente[CIDADE] 	= $linha[cidade];
			$cliente[UF]	 	= $linha[uf];
			$cliente[DDD]		= $linha[ddd1];
			$cliente[TELEFONE]	= $linha[telefone1];
			$cliente[EMAIL]	 	= $linha[email];
			
	
			$_SESSION[cliente] = $cliente;
				print "<script> alert('Bem Vindo ".$cliente[NOME]."')</script>";
				print "<script type = 'text/javascript'> location.href ='index.php?pagina=baladas_lista' </script>";
		}else{print "<script> alert('Seu login foi desativado pelo administrador')</script>";
				echo '<script>history.back()</script>';
				}} else{
				print "<script> alert('Login/Senha invalidos')</script>";
				echo '<script>history.back()</script>';
			}

?>
</body>
</html>
