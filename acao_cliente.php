<?php
include "conexao/conexao.php";
include "valida_login.php";
include "../adm/functions.php";
include "../adm/funcoes/fazdecimal.php";

//error_reporting(0);
$acao = sqlinj($_REQUEST[acao]);
if($acao=="add_voto"){
	$id_pergunta_enquete = addslashes($_POST['id_pergunta_enquete']);
	$enquete = addslashes($_POST['enquete']);
	
	$sql = mysql_query("update tb_resposta_enquete set voto=voto+1 where id_pergunta_enquete = '$id_pergunta_enquete' and id_resposta_enquete = '$enquete'");
	
	if($sql==true){
		echo "<script>alert('Voto Cadastrado com Sucesso!');history.back(-1)</script>"; 
	}else{
		echo "<script>alert('Falha ao Votar!');history.back(-1)</script>";
		}	
	
}
if($acao=="add_cliente"){
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	
	$sql = "insert into tb_cliente (id_cliente_amigo) values ('$id_cliente')";
		$result = mysql_query($sql) or die (mysql_error());
	
	if($sql==true){
		echo "<script>alert('Cadastrado com Sucesso!');history.back(-1)</script>"; 
	}else{
		echo "<script>alert('Falha ao Votar!');history.back(-1)</script>";
		}	
	
}

//Adicionar dj
if($acao=="cadastrar_dj"){
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_login				= sqlinj($_POST['id_login']);
	$dj 				= sqlinj($_POST['dj']);
	$fone				= sqlinj($_POST['fone']);
	$email 				= sqlinj($_POST['email']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 			= sqlinj($_POST['estado']);
	$id_cidade 			= sqlinj($_POST['cidade']);
	//$data = sqlinj($_POST['data']);
	//$datafim = sqlinj($_POST['datafim']);
	//$horainicio = sqlinj($_POST['hora_inicio_festa']);
	//$horafim = sqlinj($_POST['hora_fim_festa']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	//$vip 				= sqlinj($_POST['vip']);
	//$fixa 				= sqlinj($_POST['fixa']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 		= sqlinj($_POST['cep']);
	$endereco	 		= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 	= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 	    = sqlinj($_POST['valor']);
	
	echo '<script> alert("nome dj'.$dj.'");</script>';
	echo '<script> alert("'.$destaque.'");</script>';
	echo '<script> alert("'.$detalhe.'");</script>';
	
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o festa'); history.back(-1)</script>";	
	}else{
	
		$foto1= upload_arquivo($_FILES['imagem'], 'dj/');
			echo '<script> alert("'.$foto1.'");</script>';
		include( 'm2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "dj/".$foto1 );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("dj/t/".$foto1,80);
		}
		$sql = "insert into tb_dj (id_subcategoria, id_estado, id_cidade , imagem, detalhe,tags,id_cliente,fone,email,dj) values ( '$id_subcategoria','$id_estado' ,'$id_cidade','$foto1','$detalhe','$tags','$id_cliente','$fone','$email','$dj')";
		$result = mysql_query($sql) or die (mysql_error());
		//include( 'm2brimagem.class.php' );
		if($result==true){	
		$id_dj = mysql_insert_id();
$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_dj) values ('$link1','$link2','$link3','$id_dj')");
		}
		$video = sqlinj($_POST['video']);
		if(!empty($video)){
		$sql_video_festa = mysql_query("insert into tb_video (link,id_dj) values ('$video','$id_dj')");
		}
			echo "<script>alert('Cadastrado com Sucesso!');document.location='cadastro_dj.php'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
	}
}

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
		
		if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o cliente'); history.back(-1)</script>";	
		}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'cliente/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "cliente/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("cliente/t/".$arquivo,80);
		}
		}
		//VALIDACAO DOS CAMPOS DO FORMULARIO UTILIZANDO ARQUIVO DE CLASSE
		require("Validacao.class.php");
		$val = new Validacao();
		$val->set($nome,'Nome')->obrigatorio();
		$val->set($email,'Email')->email();
		$val->set($sexo,'Sexo')->obrigatorio();
		$val->set($senha,'Senha')->obrigatorio();
		$val->set($nascimento,'Nascimento')->data();
		
		
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
						echo "<script>alert('Cadastrado realizado com sucesso! Efetue Login !');document.location='index.php?pagina=form_login'</script>";
		 
					
				}}
}

if(sqlinj(isset($_REQUEST[acao])) && sqlinj($_REQUEST[acao]) == 'editar'){
	
		$tipopessoa 	= sqlinj(addslashes($_POST['tipopessoa']));
		$nome 			= sqlinj(addslashes($_POST['nome']));
		$sobrenome 		= sqlinj(addslashes($_POST['sobrenome']));
		$cpfcnpj 		= sqlinj(addslashes($_POST['cpfcnpj']));
		$nascimento 	= sqlinj(addslashes($_POST['nascimento']));
		$email 			= sqlinj(addslashes($_POST['email']));
		$sexo 			= sqlinj(addslashes($_POST['sexo']));
		$senha 			= sqlinj(addslashes($_POST['senha']));
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
		$telefone1 		= sqlinj(addslashes($_POST['telefone1']));
		$telefone2 		= sqlinj(addslashes($_POST['telefone2']));
			$login 		= sqlinj(addslashes($_POST['login']));
			$newslatter	 			= sqlinj($_POST['newslatter']);
			
		//inverte a data para o formato sql - para ser salvo no banco
		$dataNova = implode('-',array_reverse(explode('/',$nascimento)));

		$data = date("Y-m-d G:i:s");
					
		//VALIDACAO DOS CAMPOS DO FORMULARIO UTILIZANDO ARQUIVO DE CLASSE
		require("Validacao.class.php");
		$val = new Validacao();
		$val->set($nome,'Nome')->obrigatorio();
		$val->set($email,'Email')->email();
		$val->set($sexo,'Sexo')->obrigatorio();
		$val->set($senha,'Senha')->obrigatorio();
		//faz uma consulta no Bd para verficar se o cliente(pelo email) já existe
				$verifica = mysql_query("SELECT * FROM tb_cliente WHERE email = '$email' or login= '$login'") or die(mysql_error());
		
				//conta no banco de dados qts registro existe
				$contar = mysql_num_rows($verifica);
				if($contar >= '1'){
					echo '<script> alert("Login ou senha já cadastrados em nossa loja, clique em recuperar senha!")</script>';
					echo '<script> history.back()</script>';
				}else{
			$id_cliente = $_REQUEST['id_cliente'];
		
					$sql = "update tb_cliente set login='$login', nome='$nome', sobrenome='$sobrenome', nascimento='$nascimento', email='$email', sexo='$sexo', senha='$senha', cep='$cep', endereco='$endereco', numero='$numero', complemento='$complemento', bairro='$bairro', id_cidade='$cidade', id_estado='$estado', ddd1='$ddd1', ddd2='$ddd2', telefone1='$telefone1', telefone2='$telefone2', newslatter='$newslatter', ativo='S' where id_cliente=".$id_cliente;
					
					$result = mysql_query($sql) or die(mysql_error());
					if(!empty($result)){
						session_start();
						echo '<script> alert("Cadastro atualizado com sucesso!")</script>';
						print "<script type = 'text/javascript'> location.href = 'index.php?pagina=form_cadastro_user1&acao=ver&id_cliente=".$_SESSION[cliente][ID]."' </script>";
					
				
		}else{
			echo '<script> alert("Verificar campos obrigatorios!")</script>';
			echo '<script> history.back()</script>';
		}
}
}


if(sqlinj(isset($_REQUEST[acao])) && sqlinj($_REQUEST[acao]) == 'add_comentario'){
		function getTime($timePage = 'http://pcdsh01.on.br/HoraLegalBrasileira.asp')
{
   $page = fopen($timePage, 'r');
  preg_match('/[0-2][0-9]:[0-5][0-9]:[0-5][0-9]/', fread($page, 4000), $result);
  return $result[0];
}

	$id_festa = sqlinj($_REQUEST['id_festa']);
	
	$id_cobertura = sqlinj($_REQUEST['id_cobertura']);
	
	$comentario = sqlinj($_REQUEST['comentario']);
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$nome = sqlinj($_REQUEST['nome']);
	$data = date('d/m/Y');
	$hora = getTime();
	
	
	

	
	 
	 $sql_inserir = mysql_query("insert into tb_comentario(id_festa,id_cobertura,id_cliente_comentario,nome,texto,data,hora,ativo) values ('$id_festa','$id_cobertura','$id_cliente','$nome','$comentario','$data','$hora','0')");
	 if($sql_inserir == true){
		 echo "<script>alert('Comentário inserido com sucesso');document.location='index.php?pagina=form_login'</script>";
		 
		 }else{   echo "<script>alert('Falha ao cadastrar!');history.back(-1)</script>";    }


	
	
	
	
	
}
if(isset($_REQUEST[acao]) && $_REQUEST[acao] == 'del_comentario'){

	$id_comentario = sqlinj(addslashes($_REQUEST['id_comentario']));
	$id_festa = sqlinj(addslashes($_REQUEST['id_festa']));
	session_start();
	$id_usuario = $_SESSION[cliente][ID];
	$sql = "delete from tb_comentario where id_comentario = ".$id_comentario;
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='visualiza_comentarios.php?id_festa=".$id_festa."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}

if(sqlinj(isset($_REQUEST[acao])) && sqlinj($_REQUEST[acao]) == 'alt_comentario'){
	
	function getTime($timePage = 'http://pcdsh01.on.br/HoraLegalBrasileira.asp')
{
   $page = fopen($timePage, 'r');
  preg_match('/[0-2][0-9]:[0-5][0-9]:[0-5][0-9]/', fread($page, 4000), $result);
  return $result[0];
}
	$comentario = sqlinj($_REQUEST['comentario']);
	$id_comentario = sqlinj($_REQUEST['id_comentario']);
	$data = date('d/m/Y');
	$hora = getTime();
	 $sql_inserir = mysql_query("update tb_comentario set texto = '$comentario' ,data = '$data',hora = '$hora' where id_comentario = ".$id_comentario."") or die(mysql_error());
	
	 if($sql_inserir==true){
		 echo "<script>alert('Comentário alterado com sucesso');document.location='cad_comentario1.php?acao=editar&id_comentario=".$id_comentario."'</script>";
		 }else{   echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";    }
}

//#########################################################################################################
if($acao=="cadastrar_patrocinador"){
$id_cliente = sqlinj($_POST['id_cliente']);
$id_festa = sqlinj($_POST['id_festa']);
$patrocinador = sqlinj($_POST['patrocinador']);
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor Inserir Uma foto'); history.back(-1)</script>";
		}else{
				$arquivo = upload_arquivo($_FILES['imagem'],'patrocinador/');
				//$data_cadastro = date("Y-m-d G:i:s");
				//$descricao = sqlinj($_POST['descricao']);
				$sql = "insert into tb_patrocinador(imagem, id_festa,id_cliente, patrocinador) values ('$arquivo','$id_festa','$id_cliente','$patrocinador')";
				$result = mysql_query($sql) or die (mysql_error());
				if($result==true){
							include( 'm2brimagem.class.php' );
						$oImg = new m2brimagem();
						// valida via m2brimagem
							$oImg->carrega( "patrocinador/".$arquivo );
							$valida = $oImg->valida();
							if ($valida == 'OK') {
								$oImg->redimensiona('190','100','');
								$oImg->grava("patrocinador/t/".$arquivo,80);
							}
				   echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=baladas_lista&id_festa=".$id_festa."'</script>";
				}else{
					echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
					}						
			}
}
if($acao=="editar_patrocinador"){
	$id_patrocinador	= sqlinj($_POST['id_patrocinador']);
	$id_festa	= sqlinj($_POST['id_festa']);
	$patrocinador 			= sqlinj($_POST['patrocinador']);
	
	if(empty($_FILES['imagem']['name'])){
			$sql = "update tb_quemsomos set patrocinador='$patrocinador' where id_patrocinador='".$id_patrocinador."'";
	$result = mysql_query($sql) or die(mysql_error());
	if($result==true){			
		echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=listagem_patrocinadores&id_festa=".$id_festa."'</script>";
	}else{
		echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
	}
	}else{
	$sql_busca_imagem = mysql_query("select imagem from tb_patrocinador where id_patrocinador=".$id_patrocinador."");
	$dados_busca_imagem = mysql_fetch_array($sql_busca_imagem);
	$imagem = $dados_busca_imagem['imagem'];
	if(file_exists("patrocinador/".$imagem)){
		unlink("patrocinador/".$imagem);
		unlink("patrocinador/t/".$imagem);
	}	
		$foto1= upload_arquivo($_FILES['imagem'], 'patrocinador/');
		
			include( 'm2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "patrocinador/".$foto1 );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('190','100','');
			$oImg->grava("patrocinador/t/".$foto1,80);
		}
	
	$sql = "update tb_patrocinador set patrocinador='$patrocinador', imagem='$foto1' where id_patrocinador='".$id_patrocinador."'";
	$result = mysql_query($sql) or die(mysql_error());
	if($result==true){			
		echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=listagem_patrocinadores&id_festa=".$id_festa."'</script>";
	}else{
		echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
	}
	}
	
}
//Adicionar Festa
if($acao=="cadastrar_festa"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$festa 			= sqlinj($_POST['festa']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_festa']);
	$hora_fim = sqlinj($_POST['hora_fim_festa']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_festa = $data;
					$data_explode_festa = explode("/", $data_festa);	
					$data_festa_parte1 = $data_explode_festa[0];
					$data_festa_parte2 = $data_explode_festa[1];
					$data_festa_parte3 = $data_explode_festa[2];
					$data_festa_por_ano = "".$data_festa_parte3."/".$data_festa_parte2."/".$data_festa_parte1."";
					echo '<script> alert("encontrou id da festa'.$data_festa_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o festa'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'festa/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "festa/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("festa/t/".$arquivo,80);
		}

		$sql = "insert into tb_festa (id_cliente,festa,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$festa','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_festa_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_festa=mysql_insert_id(); 
		echo '<script> alert("'.$id_festa.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_festa) values ('$link1','$link2','$link3','$id_festa')");
		}
		if(!empty($video)){
		$sql_video_festa = mysql_query("insert into tb_video (link,id_festa) values ('$video','$id_festa')");
		}
	
$sqlfesta = mysql_query("select * from tb_festa where cep = '$cep'");
$linhasfesta = mysql_num_rows($sqlfesta);
$dadosfesta = mysql_fetch_array($sqlfesta);

$idfestabusca = $dadosfesta['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "dasdasdasd";
	$assunto = "dasdasdasd dasfassafasfafas";
	}
	
	
	
	$de = ('Baladitas - Festas e Eventos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
//$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}


	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=baladas_detalhes&id_festa=".$id_festa."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_festa
if($acao=="editar_festa"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_festa = sqlinj($_REQUEST['id_festa']);
	$festa 			= sqlinj($_POST['festa']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_festa']);
	$hora_fim = sqlinj($_POST['hora_fim_festa']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_festa = $data;
					$data_explode_festa = explode("/", $data_festa);	
					$data_festa_parte1 = $data_explode_festa[0];
					$data_festa_parte2 = $data_explode_festa[1];
					$data_festa_parte3 = $data_explode_festa[2];
					$data_festa_por_ano = "".$data_festa_parte3."/".$data_festa_parte2."/".$data_festa_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($festa)){
		echo "<script>alert('Informe um nome para o festa!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_festa set id_cliente='$id_cliente',festa='$festa',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_festa_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_festa=".$id_festa;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_festa where id_festa='$id_festa'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("festa/".$dadosf1['imagem'])){
				unlink("festa/".$dadosf1['imagem']);
				unlink("festa/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'festa/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "festa/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("festa/t/".$arquivo,80);
		}
			$sqlui = "update tb_festa set imagem='$arquivo' where id_festa=".$id_festa."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_festa='$id_festa'");
		}
		if(!empty($video)){
		$sql_video_festa = mysql_query("update tb_video link='$video',id_festa='$id_festa'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=baladas_detalhes&id_festa=".$_REQUEST[id_festa]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_festa"){

	$id_festa = sqlinj($_GET['id_festa']);
	//excluindo a imagem da pasta antes de excluir o festa
	$sql1 = "select * from tb_festa where id_festa=".$id_festa;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o festa
	$sql1 = "select imagem from tb_festa where id_festa=".$id_festa;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_festa=".$id_festa;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_festa=".$id_festa;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_festa=".$id_festa;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_festa=".$id_festa;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_festa where id_festa=".$id_festa;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("festa/".$dados1['imagem'])){
		unlink("festa/".$dados1['imagem']);
		unlink("festa/t/".$dados1['imagem']);
	}
	if(file_exists("festa/".$dados1['imagem2'])){
		unlink("festa/".$dados1['imagem2']);
		unlink("festa/t/".$dados1['imagem2']);
	}	
	if(file_exists("festa/".$dados1['imagem3'])){
		unlink("festa/".$dados1['imagem3']);
		unlink("festa/t/".$dados1['imagem3']);
	}	
	if(file_exists("festa/".$dados1['imagem4'])){
		unlink("festa/".$dados1['imagem4']);
		unlink("festa/t/".$dados1['imagem4']);
	}	
	if(file_exists("festa/".$dados1['imagem5'])){
		unlink("festa/".$dados1['imagem5']);
		unlink("festa/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_festa = ".$id_festa."");
	$sql = mysql_query("delete from tb_bannercentro where id_festa = ".$id_festa."");
	$sql = mysql_query("delete from tb_festa where id_festa = ".$id_festa."");
	$sql = mysql_query("delete from tb_patrocinador where id_festa = ".$id_festa."");
	$sql = mysql_query("delete from tb_cobertura where id_festa = ".$id_festa."");
	//deletar as fotos da festa
	//deletar coberturas desta festa
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='minhas_baladas_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}

//##############################################################################################################



//Adicionar artistico
if($acao=="cadastrar_artistico"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$artistico 			= sqlinj($_POST['artistico']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_artistico']);
	$hora_fim = sqlinj($_POST['hora_fim_artistico']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_artistico = $data;
					$data_explode_artistico = explode("/", $data_artistico);	
					$data_artistico_parte1 = $data_explode_artistico[0];
					$data_artistico_parte2 = $data_explode_artistico[1];
					$data_artistico_parte3 = $data_explode_artistico[2];
					$data_artistico_por_ano = "".$data_artistico_parte3."/".$data_artistico_parte2."/".$data_artistico_parte1."";
					echo '<script> alert("encontrou id da artistico'.$data_artistico_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o artistico'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'artistico/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "artistico/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("artistico/t/".$arquivo,80);
		}

		$sql = "insert into tb_artistico (id_cliente,artistico,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$artistico','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_artistico_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_artistico=mysql_insert_id(); 
		echo '<script> alert("'.$id_artistico.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_artistico) values ('$link1','$link2','$link3','$id_artistico')");
		}
		if(!empty($video)){
		$sql_video_artistico = mysql_query("insert into tb_video (link,id_artistico) values ('$video','$id_artistico')");
		}
	
$sqlartistico = mysql_query("select * from tb_artistico where cep = '$cep'");
$linhasartistico = mysql_num_rows($sqlartistico);
$dadosartistico = mysql_fetch_array($sqlartistico);

$idartisticobusca = $dadosartistico['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	
	
	
	$de = ('Baladitas - artisticos e Eventos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
/if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=artisticos_detalhes&id_artistico=".$id_artistico."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_artistico
if($acao=="editar_artistico"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_artistico = sqlinj($_REQUEST['id_artistico']);
	$artistico 			= sqlinj($_POST['artistico']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_artistico']);
	$hora_fim = sqlinj($_POST['hora_fim_artistico']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_artistico = $data;
					$data_explode_artistico = explode("/", $data_artistico);	
					$data_artistico_parte1 = $data_explode_artistico[0];
					$data_artistico_parte2 = $data_explode_artistico[1];
					$data_artistico_parte3 = $data_explode_artistico[2];
					$data_artistico_por_ano = "".$data_artistico_parte3."/".$data_artistico_parte2."/".$data_artistico_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($artistico)){
		echo "<script>alert('Informe um nome para o artistico!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_artistico set id_cliente='$id_cliente',artistico='$artistico',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_artistico_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_artistico=".$id_artistico;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_artistico where id_artistico='$id_artistico'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("artistico/".$dadosf1['imagem'])){
				unlink("artistico/".$dadosf1['imagem']);
				unlink("artistico/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'artistico/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "artistico/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("artistico/t/".$arquivo,80);
		}
			$sqlui = "update tb_artistico set imagem='$arquivo' where id_artistico=".$id_artistico."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_artistico='$id_artistico'");
		}
		if(!empty($video)){
		$sql_video_artistico = mysql_query("update tb_video link='$video',id_artistico='$id_artistico'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=artisticos_detalhes&id_artistico=".$_REQUEST[id_artistico]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_artistico"){

	$id_artistico = sqlinj($_GET['id_artistico']);
	//excluindo a imagem da pasta antes de excluir o artistico
	$sql1 = "select * from tb_artistico where id_artistico=".$id_artistico;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o artistico
	$sql1 = "select imagem from tb_artistico where id_artistico=".$id_artistico;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_artistico=".$id_artistico;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_artistico=".$id_artistico;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_artistico=".$id_artistico;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_artistico=".$id_artistico;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_artistico where id_artistico=".$id_artistico;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("artistico/".$dados1['imagem'])){
		unlink("artistico/".$dados1['imagem']);
		unlink("artistico/t/".$dados1['imagem']);
	}
	if(file_exists("artistico/".$dados1['imagem2'])){
		unlink("artistico/".$dados1['imagem2']);
		unlink("artistico/t/".$dados1['imagem2']);
	}	
	if(file_exists("artistico/".$dados1['imagem3'])){
		unlink("artistico/".$dados1['imagem3']);
		unlink("artistico/t/".$dados1['imagem3']);
	}	
	if(file_exists("artistico/".$dados1['imagem4'])){
		unlink("artistico/".$dados1['imagem4']);
		unlink("artistico/t/".$dados1['imagem4']);
	}	
	if(file_exists("artistico/".$dados1['imagem5'])){
		unlink("artistico/".$dados1['imagem5']);
		unlink("artistico/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_artistico = ".$id_artistico."");
	$sql = mysql_query("delete from tb_bannercentro where id_artistico = ".$id_artistico."");
	$sql = mysql_query("delete from tb_artistico where id_artistico = ".$id_artistico."");
	$sql = mysql_query("delete from tb_patrocinador where id_artistico = ".$id_artistico."");
	$sql = mysql_query("delete from tb_cobertura where id_artistico = ".$id_artistico."");
	//deletar as fotos da artistico
	//deletar coberturas desta artistico
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_artisticos_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################


//Adicionar canhoto
if($acao=="cadastrar_canhoto"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$canhoto 			= sqlinj($_POST['canhoto']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_canhoto']);
	$hora_fim = sqlinj($_POST['hora_fim_canhoto']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_canhoto = $data;
					$data_explode_canhoto = explode("/", $data_canhoto);	
					$data_canhoto_parte1 = $data_explode_canhoto[0];
					$data_canhoto_parte2 = $data_explode_canhoto[1];
					$data_canhoto_parte3 = $data_explode_canhoto[2];
					$data_canhoto_por_ano = "".$data_canhoto_parte3."/".$data_canhoto_parte2."/".$data_canhoto_parte1."";
					echo '<script> alert("encontrou id da canhoto'.$data_canhoto_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o canhoto'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'canhoto/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "canhoto/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("canhoto/t/".$arquivo,80);
		}

		$sql = "insert into tb_canhoto (id_cliente,canhoto,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$canhoto','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_canhoto_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_canhoto=mysql_insert_id(); 
		echo '<script> alert("'.$id_canhoto.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_canhoto) values ('$link1','$link2','$link3','$id_canhoto')");
		}
		if(!empty($video)){
		$sql_video_canhoto = mysql_query("insert into tb_video (link,id_canhoto) values ('$video','$id_canhoto')");
		}
	
$sqlcanhoto = mysql_query("select * from tb_canhoto where cep = '$cep'");
$linhascanhoto = mysql_num_rows($sqlcanhoto);
$dadoscanhoto = mysql_fetch_array($sqlcanhoto);

$idcanhotobusca = $dadoscanhoto['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - canhotos e Eventos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=canhotos_detalhes&id_canhoto=".$id_canhoto."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_canhoto
if($acao=="editar_canhoto"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_canhoto = sqlinj($_REQUEST['id_canhoto']);
	$canhoto 			= sqlinj($_POST['canhoto']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_canhoto']);
	$hora_fim = sqlinj($_POST['hora_fim_canhoto']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_canhoto = $data;
					$data_explode_canhoto = explode("/", $data_canhoto);	
					$data_canhoto_parte1 = $data_explode_canhoto[0];
					$data_canhoto_parte2 = $data_explode_canhoto[1];
					$data_canhoto_parte3 = $data_explode_canhoto[2];
					$data_canhoto_por_ano = "".$data_canhoto_parte3."/".$data_canhoto_parte2."/".$data_canhoto_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($canhoto)){
		echo "<script>alert('Informe um nome para o canhoto!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_canhoto set id_cliente='$id_cliente',canhoto='$canhoto',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_canhoto_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_canhoto=".$id_canhoto;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_canhoto where id_canhoto='$id_canhoto'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("canhoto/".$dadosf1['imagem'])){
				unlink("canhoto/".$dadosf1['imagem']);
				unlink("canhoto/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'canhoto/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "canhoto/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("canhoto/t/".$arquivo,80);
		}
			$sqlui = "update tb_canhoto set imagem='$arquivo' where id_canhoto=".$id_canhoto."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_canhoto='$id_canhoto'");
		}
		if(!empty($video)){
		$sql_video_canhoto = mysql_query("update tb_video link='$video',id_canhoto='$id_canhoto'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=canhotos_detalhes&id_canhoto=".$_REQUEST[id_canhoto]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_canhoto"){

	$id_canhoto = sqlinj($_GET['id_canhoto']);
	//excluindo a imagem da pasta antes de excluir o canhoto
	$sql1 = "select * from tb_canhoto where id_canhoto=".$id_canhoto;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o canhoto
	$sql1 = "select imagem from tb_canhoto where id_canhoto=".$id_canhoto;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_canhoto=".$id_canhoto;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_canhoto=".$id_canhoto;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_canhoto=".$id_canhoto;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_canhoto=".$id_canhoto;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_canhoto where id_canhoto=".$id_canhoto;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("canhoto/".$dados1['imagem'])){
		unlink("canhoto/".$dados1['imagem']);
		unlink("canhoto/t/".$dados1['imagem']);
	}
	if(file_exists("canhoto/".$dados1['imagem2'])){
		unlink("canhoto/".$dados1['imagem2']);
		unlink("canhoto/t/".$dados1['imagem2']);
	}	
	if(file_exists("canhoto/".$dados1['imagem3'])){
		unlink("canhoto/".$dados1['imagem3']);
		unlink("canhoto/t/".$dados1['imagem3']);
	}	
	if(file_exists("canhoto/".$dados1['imagem4'])){
		unlink("canhoto/".$dados1['imagem4']);
		unlink("canhoto/t/".$dados1['imagem4']);
	}	
	if(file_exists("canhoto/".$dados1['imagem5'])){
		unlink("canhoto/".$dados1['imagem5']);
		unlink("canhoto/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_canhoto = ".$id_canhoto."");
	$sql = mysql_query("delete from tb_bannercentro where id_canhoto = ".$id_canhoto."");
	$sql = mysql_query("delete from tb_canhoto where id_canhoto = ".$id_canhoto."");
	$sql = mysql_query("delete from tb_patrocinador where id_canhoto = ".$id_canhoto."");
	$sql = mysql_query("delete from tb_cobertura where id_canhoto = ".$id_canhoto."");
	//deletar as fotos da canhoto
	//deletar coberturas desta canhoto
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_canhotos_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 
 //Adicionar portifolio
if($acao=="cadastrar_portifolio"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$portifolio 			= sqlinj($_POST['portifolio']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_portifolio']);
	$hora_fim = sqlinj($_POST['hora_fim_portifolio']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_portifolio = $data;
					$data_explode_portifolio = explode("/", $data_portifolio);	
					$data_portifolio_parte1 = $data_explode_portifolio[0];
					$data_portifolio_parte2 = $data_explode_portifolio[1];
					$data_portifolio_parte3 = $data_explode_portifolio[2];
					$data_portifolio_por_ano = "".$data_portifolio_parte3."/".$data_portifolio_parte2."/".$data_portifolio_parte1."";
					echo '<script> alert("encontrou id da portifolio'.$data_portifolio_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o portifolio'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'portifolio/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "portifolio/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("portifolio/t/".$arquivo,80);
		}

		$sql = "insert into tb_portifolio (id_cliente,portifolio,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$portifolio','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_portifolio_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_portifolio=mysql_insert_id(); 
		echo '<script> alert("'.$id_portifolio.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_portifolio) values ('$link1','$link2','$link3','$id_portifolio')");
		}
		if(!empty($video)){
		$sql_video_portifolio = mysql_query("insert into tb_video (link,id_portifolio) values ('$video','$id_portifolio')");
		}
	
$sqlportifolio = mysql_query("select * from tb_portifolio where cep = '$cep'");
$linhasportifolio = mysql_num_rows($sqlportifolio);
$dadosportifolio = mysql_fetch_array($sqlportifolio);

$idportifoliobusca = $dadosportifolio['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - portifolios e Eventos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=portifolios_detalhes&id_portifolio=".$id_portifolio."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_portifolio
if($acao=="editar_portifolio"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_portifolio = sqlinj($_REQUEST['id_portifolio']);
	$portifolio 			= sqlinj($_POST['portifolio']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_portifolio']);
	$hora_fim = sqlinj($_POST['hora_fim_portifolio']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_portifolio = $data;
					$data_explode_portifolio = explode("/", $data_portifolio);	
					$data_portifolio_parte1 = $data_explode_portifolio[0];
					$data_portifolio_parte2 = $data_explode_portifolio[1];
					$data_portifolio_parte3 = $data_explode_portifolio[2];
					$data_portifolio_por_ano = "".$data_portifolio_parte3."/".$data_portifolio_parte2."/".$data_portifolio_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($portifolio)){
		echo "<script>alert('Informe um nome para o portifolio!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_portifolio set id_cliente='$id_cliente',portifolio='$portifolio',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_portifolio_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_portifolio=".$id_portifolio;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_portifolio where id_portifolio='$id_portifolio'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("portifolio/".$dadosf1['imagem'])){
				unlink("portifolio/".$dadosf1['imagem']);
				unlink("portifolio/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'portifolio/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "portifolio/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("portifolio/t/".$arquivo,80);
		}
			$sqlui = "update tb_portifolio set imagem='$arquivo' where id_portifolio=".$id_portifolio."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_portifolio='$id_portifolio'");
		}
		if(!empty($video)){
		$sql_video_portifolio = mysql_query("update tb_video link='$video',id_portifolio='$id_portifolio'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=portifolios_detalhes&id_portifolio=".$_REQUEST[id_portifolio]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_portifolio"){

	$id_portifolio = sqlinj($_GET['id_portifolio']);
	//excluindo a imagem da pasta antes de excluir o portifolio
	$sql1 = "select * from tb_portifolio where id_portifolio=".$id_portifolio;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o portifolio
	$sql1 = "select imagem from tb_portifolio where id_portifolio=".$id_portifolio;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_portifolio=".$id_portifolio;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_portifolio=".$id_portifolio;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_portifolio=".$id_portifolio;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_portifolio=".$id_portifolio;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_portifolio where id_portifolio=".$id_portifolio;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("portifolio/".$dados1['imagem'])){
		unlink("portifolio/".$dados1['imagem']);
		unlink("portifolio/t/".$dados1['imagem']);
	}
	if(file_exists("portifolio/".$dados1['imagem2'])){
		unlink("portifolio/".$dados1['imagem2']);
		unlink("portifolio/t/".$dados1['imagem2']);
	}	
	if(file_exists("portifolio/".$dados1['imagem3'])){
		unlink("portifolio/".$dados1['imagem3']);
		unlink("portifolio/t/".$dados1['imagem3']);
	}	
	if(file_exists("portifolio/".$dados1['imagem4'])){
		unlink("portifolio/".$dados1['imagem4']);
		unlink("portifolio/t/".$dados1['imagem4']);
	}	
	if(file_exists("portifolio/".$dados1['imagem5'])){
		unlink("portifolio/".$dados1['imagem5']);
		unlink("portifolio/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_portifolio = ".$id_portifolio."");
	$sql = mysql_query("delete from tb_bannercentro where id_portifolio = ".$id_portifolio."");
	$sql = mysql_query("delete from tb_portifolio where id_portifolio = ".$id_portifolio."");
	$sql = mysql_query("delete from tb_patrocinador where id_portifolio = ".$id_portifolio."");
	$sql = mysql_query("delete from tb_cobertura where id_portifolio = ".$id_portifolio."");
	//deletar as fotos da portifolio
	//deletar coberturas desta portifolio
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_portifolios_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################

 //Adicionar grafica
if($acao=="cadastrar_grafica"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$grafica 			= sqlinj($_POST['grafica']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_grafica']);
	$hora_fim = sqlinj($_POST['hora_fim_grafica']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_grafica = $data;
					$data_explode_grafica = explode("/", $data_grafica);	
					$data_grafica_parte1 = $data_explode_grafica[0];
					$data_grafica_parte2 = $data_explode_grafica[1];
					$data_grafica_parte3 = $data_explode_grafica[2];
					$data_grafica_por_ano = "".$data_grafica_parte3."/".$data_grafica_parte2."/".$data_grafica_parte1."";
					echo '<script> alert("encontrou id da grafica'.$data_grafica_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o grafica'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'grafica/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "grafica/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("grafica/t/".$arquivo,80);
		}

		$sql = "insert into tb_grafica (id_cliente,grafica,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$grafica','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_grafica_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_grafica=mysql_insert_id(); 
		echo '<script> alert("'.$id_grafica.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_grafica) values ('$link1','$link2','$link3','$id_grafica')");
		}
		if(!empty($video)){
		$sql_video_grafica = mysql_query("insert into tb_video (link,id_grafica) values ('$video','$id_grafica')");
		}
	
$sqlgrafica = mysql_query("select * from tb_grafica where cep = '$cep'");
$linhasgrafica = mysql_num_rows($sqlgrafica);
$dadosgrafica = mysql_fetch_array($sqlgrafica);

$idgraficabusca = $dadosgrafica['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - graficas em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=graficas_detalhes&id_grafica=".$id_grafica."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_grafica
if($acao=="editar_grafica"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_grafica = sqlinj($_REQUEST['id_grafica']);
	$grafica 			= sqlinj($_POST['grafica']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_grafica']);
	$hora_fim = sqlinj($_POST['hora_fim_grafica']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_grafica = $data;
					$data_explode_grafica = explode("/", $data_grafica);	
					$data_grafica_parte1 = $data_explode_grafica[0];
					$data_grafica_parte2 = $data_explode_grafica[1];
					$data_grafica_parte3 = $data_explode_grafica[2];
					$data_grafica_por_ano = "".$data_grafica_parte3."/".$data_grafica_parte2."/".$data_grafica_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($grafica)){
		echo "<script>alert('Informe um nome para o grafica!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_grafica set id_cliente='$id_cliente',grafica='$grafica',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_grafica_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_grafica=".$id_grafica;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_grafica where id_grafica='$id_grafica'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("grafica/".$dadosf1['imagem'])){
				unlink("grafica/".$dadosf1['imagem']);
				unlink("grafica/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'grafica/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "grafica/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("grafica/t/".$arquivo,80);
		}
			$sqlui = "update tb_grafica set imagem='$arquivo' where id_grafica=".$id_grafica."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_grafica='$id_grafica'");
		}
		if(!empty($video)){
		$sql_video_grafica = mysql_query("update tb_video link='$video',id_grafica='$id_grafica'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=graficas_detalhes&id_grafica=".$_REQUEST[id_grafica]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_grafica"){

	$id_grafica = sqlinj($_GET['id_grafica']);
	//excluindo a imagem da pasta antes de excluir o grafica
	$sql1 = "select * from tb_grafica where id_grafica=".$id_grafica;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o grafica
	$sql1 = "select imagem from tb_grafica where id_grafica=".$id_grafica;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_grafica=".$id_grafica;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_grafica=".$id_grafica;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_grafica=".$id_grafica;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_grafica=".$id_grafica;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_grafica where id_grafica=".$id_grafica;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("grafica/".$dados1['imagem'])){
		unlink("grafica/".$dados1['imagem']);
		unlink("grafica/t/".$dados1['imagem']);
	}
	if(file_exists("grafica/".$dados1['imagem2'])){
		unlink("grafica/".$dados1['imagem2']);
		unlink("grafica/t/".$dados1['imagem2']);
	}	
	if(file_exists("grafica/".$dados1['imagem3'])){
		unlink("grafica/".$dados1['imagem3']);
		unlink("grafica/t/".$dados1['imagem3']);
	}	
	if(file_exists("grafica/".$dados1['imagem4'])){
		unlink("grafica/".$dados1['imagem4']);
		unlink("grafica/t/".$dados1['imagem4']);
	}	
	if(file_exists("grafica/".$dados1['imagem5'])){
		unlink("grafica/".$dados1['imagem5']);
		unlink("grafica/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_grafica = ".$id_grafica."");
	$sql = mysql_query("delete from tb_bannercentro where id_grafica = ".$id_grafica."");
	$sql = mysql_query("delete from tb_grafica where id_grafica = ".$id_grafica."");
	$sql = mysql_query("delete from tb_patrocinador where id_grafica = ".$id_grafica."");
	$sql = mysql_query("delete from tb_cobertura where id_grafica = ".$id_grafica."");
	//deletar as fotos da grafica
	//deletar coberturas desta grafica
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='minhas_graficas_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 //Adicionar medico
if($acao=="cadastrar_medico"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$medico 			= sqlinj($_POST['medico']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_medico']);
	$hora_fim = sqlinj($_POST['hora_fim_medico']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_medico = $data;
					$data_explode_medico = explode("/", $data_medico);	
					$data_medico_parte1 = $data_explode_medico[0];
					$data_medico_parte2 = $data_explode_medico[1];
					$data_medico_parte3 = $data_explode_medico[2];
					$data_medico_por_ano = "".$data_medico_parte3."/".$data_medico_parte2."/".$data_medico_parte1."";
					echo '<script> alert("encontrou id da medico'.$data_medico_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o medico'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'medico/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "medico/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("medico/t/".$arquivo,80);
		}

		$sql = "insert into tb_medico (id_cliente,medico,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$medico','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_medico_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_medico=mysql_insert_id(); 
		echo '<script> alert("'.$id_medico.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_medico) values ('$link1','$link2','$link3','$id_medico')");
		}
		if(!empty($video)){
		$sql_video_medico = mysql_query("insert into tb_video (link,id_medico) values ('$video','$id_medico')");
		}
	
$sqlmedico = mysql_query("select * from tb_medico where cep = '$cep'");
$linhasmedico = mysql_num_rows($sqlmedico);
$dadosmedico = mysql_fetch_array($sqlmedico);

$idmedicobusca = $dadosmedico['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - medicos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=medicos_detalhes&id_medico=".$id_medico."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_medico
if($acao=="editar_medico"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_medico = sqlinj($_REQUEST['id_medico']);
	$medico 			= sqlinj($_POST['medico']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_medico']);
	$hora_fim = sqlinj($_POST['hora_fim_medico']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_medico = $data;
					$data_explode_medico = explode("/", $data_medico);	
					$data_medico_parte1 = $data_explode_medico[0];
					$data_medico_parte2 = $data_explode_medico[1];
					$data_medico_parte3 = $data_explode_medico[2];
					$data_medico_por_ano = "".$data_medico_parte3."/".$data_medico_parte2."/".$data_medico_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($medico)){
		echo "<script>alert('Informe um nome para o medico!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_medico set id_cliente='$id_cliente',medico='$medico',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_medico_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_medico=".$id_medico;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_medico where id_medico='$id_medico'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("medico/".$dadosf1['imagem'])){
				unlink("medico/".$dadosf1['imagem']);
				unlink("medico/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'medico/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "medico/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("medico/t/".$arquivo,80);
		}
			$sqlui = "update tb_medico set imagem='$arquivo' where id_medico=".$id_medico."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_medico='$id_medico'");
		}
		if(!empty($video)){
		$sql_video_medico = mysql_query("update tb_video link='$video',id_medico='$id_medico'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=medicos_detalhes&id_medico=".$_REQUEST[id_medico]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_medico"){

	$id_medico = sqlinj($_GET['id_medico']);
	//excluindo a imagem da pasta antes de excluir o medico
	$sql1 = "select * from tb_medico where id_medico=".$id_medico;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o medico
	$sql1 = "select imagem from tb_medico where id_medico=".$id_medico;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_medico=".$id_medico;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_medico=".$id_medico;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_medico=".$id_medico;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_medico=".$id_medico;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_medico where id_medico=".$id_medico;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("medico/".$dados1['imagem'])){
		unlink("medico/".$dados1['imagem']);
		unlink("medico/t/".$dados1['imagem']);
	}
	if(file_exists("medico/".$dados1['imagem2'])){
		unlink("medico/".$dados1['imagem2']);
		unlink("medico/t/".$dados1['imagem2']);
	}	
	if(file_exists("medico/".$dados1['imagem3'])){
		unlink("medico/".$dados1['imagem3']);
		unlink("medico/t/".$dados1['imagem3']);
	}	
	if(file_exists("medico/".$dados1['imagem4'])){
		unlink("medico/".$dados1['imagem4']);
		unlink("medico/t/".$dados1['imagem4']);
	}	
	if(file_exists("medico/".$dados1['imagem5'])){
		unlink("medico/".$dados1['imagem5']);
		unlink("medico/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_medico = ".$id_medico."");
	$sql = mysql_query("delete from tb_bannercentro where id_medico = ".$id_medico."");
	$sql = mysql_query("delete from tb_medico where id_medico = ".$id_medico."");
	$sql = mysql_query("delete from tb_patrocinador where id_medico = ".$id_medico."");
	$sql = mysql_query("delete from tb_cobertura where id_medico = ".$id_medico."");
	//deletar as fotos da medico
	//deletar coberturas desta medico
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='minhas_medicos_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 //Adicionar policia
if($acao=="cadastrar_policia"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$policia 			= sqlinj($_POST['policia']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_policia']);
	$hora_fim = sqlinj($_POST['hora_fim_policia']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_policia = $data;
					$data_explode_policia = explode("/", $data_policia);	
					$data_policia_parte1 = $data_explode_policia[0];
					$data_policia_parte2 = $data_explode_policia[1];
					$data_policia_parte3 = $data_explode_policia[2];
					$data_policia_por_ano = "".$data_policia_parte3."/".$data_policia_parte2."/".$data_policia_parte1."";
					echo '<script> alert("encontrou id da policia'.$data_policia_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o policia'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'policia/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "policia/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("policia/t/".$arquivo,80);
		}

		$sql = "insert into tb_policia (id_cliente,policia,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$policia','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_policia_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_policia=mysql_insert_id(); 
		echo '<script> alert("'.$id_policia.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_policia) values ('$link1','$link2','$link3','$id_policia')");
		}
		if(!empty($video)){
		$sql_video_policia = mysql_query("insert into tb_video (link,id_policia) values ('$video','$id_policia')");
		}
	
$sqlpolicia = mysql_query("select * from tb_policia where cep = '$cep'");
$linhaspolicia = mysql_num_rows($sqlpolicia);
$dadospolicia = mysql_fetch_array($sqlpolicia);

$idpoliciabusca = $dadospolicia['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - policias em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=policias_detalhes&id_policia=".$id_policia."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_policia
if($acao=="editar_policia"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_policia = sqlinj($_REQUEST['id_policia']);
	$policia 			= sqlinj($_POST['policia']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_policia']);
	$hora_fim = sqlinj($_POST['hora_fim_policia']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_policia = $data;
					$data_explode_policia = explode("/", $data_policia);	
					$data_policia_parte1 = $data_explode_policia[0];
					$data_policia_parte2 = $data_explode_policia[1];
					$data_policia_parte3 = $data_explode_policia[2];
					$data_policia_por_ano = "".$data_policia_parte3."/".$data_policia_parte2."/".$data_policia_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($policia)){
		echo "<script>alert('Informe um nome para o policia!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_policia set id_cliente='$id_cliente',policia='$policia',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_policia_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_policia=".$id_policia;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_policia where id_policia='$id_policia'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("policia/".$dadosf1['imagem'])){
				unlink("policia/".$dadosf1['imagem']);
				unlink("policia/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'policia/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "policia/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("policia/t/".$arquivo,80);
		}
			$sqlui = "update tb_policia set imagem='$arquivo' where id_policia=".$id_policia."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_policia='$id_policia'");
		}
		if(!empty($video)){
		$sql_video_policia = mysql_query("update tb_video link='$video',id_policia='$id_policia'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=policias_detalhes&id_policia=".$_REQUEST[id_policia]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_policia"){

	$id_policia = sqlinj($_GET['id_policia']);
	//excluindo a imagem da pasta antes de excluir o policia
	$sql1 = "select * from tb_policia where id_policia=".$id_policia;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o policia
	$sql1 = "select imagem from tb_policia where id_policia=".$id_policia;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_policia=".$id_policia;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_policia=".$id_policia;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_policia=".$id_policia;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_policia=".$id_policia;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_policia where id_policia=".$id_policia;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("policia/".$dados1['imagem'])){
		unlink("policia/".$dados1['imagem']);
		unlink("policia/t/".$dados1['imagem']);
	}
	if(file_exists("policia/".$dados1['imagem2'])){
		unlink("policia/".$dados1['imagem2']);
		unlink("policia/t/".$dados1['imagem2']);
	}	
	if(file_exists("policia/".$dados1['imagem3'])){
		unlink("policia/".$dados1['imagem3']);
		unlink("policia/t/".$dados1['imagem3']);
	}	
	if(file_exists("policia/".$dados1['imagem4'])){
		unlink("policia/".$dados1['imagem4']);
		unlink("policia/t/".$dados1['imagem4']);
	}	
	if(file_exists("policia/".$dados1['imagem5'])){
		unlink("policia/".$dados1['imagem5']);
		unlink("policia/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_policia = ".$id_policia."");
	$sql = mysql_query("delete from tb_bannercentro where id_policia = ".$id_policia."");
	$sql = mysql_query("delete from tb_policia where id_policia = ".$id_policia."");
	$sql = mysql_query("delete from tb_patrocinador where id_policia = ".$id_policia."");
	$sql = mysql_query("delete from tb_cobertura where id_policia = ".$id_policia."");
	//deletar as fotos da policia
	//deletar coberturas desta policia
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='minhas_policias_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 //Adicionar emprego
if($acao=="cadastrar_emprego"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$emprego 			= sqlinj($_POST['emprego']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_emprego']);
	$hora_fim = sqlinj($_POST['hora_fim_emprego']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_emprego = $data;
					$data_explode_emprego = explode("/", $data_emprego);	
					$data_emprego_parte1 = $data_explode_emprego[0];
					$data_emprego_parte2 = $data_explode_emprego[1];
					$data_emprego_parte3 = $data_explode_emprego[2];
					$data_emprego_por_ano = "".$data_emprego_parte3."/".$data_emprego_parte2."/".$data_emprego_parte1."";
					echo '<script> alert("encontrou id da emprego'.$data_emprego_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o emprego'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'emprego/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "emprego/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("emprego/t/".$arquivo,80);
		}

		$sql = "insert into tb_emprego (id_cliente,emprego,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$emprego','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_emprego_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_emprego=mysql_insert_id(); 
		echo '<script> alert("'.$id_emprego.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_emprego) values ('$link1','$link2','$link3','$id_emprego')");
		}
		if(!empty($video)){
		$sql_video_emprego = mysql_query("insert into tb_video (link,id_emprego) values ('$video','$id_emprego')");
		}
	
$sqlemprego = mysql_query("select * from tb_emprego where cep = '$cep'");
$linhasemprego = mysql_num_rows($sqlemprego);
$dadosemprego = mysql_fetch_array($sqlemprego);

$idempregobusca = $dadosemprego['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - empregos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=empregos_detalhes&id_emprego=".$id_emprego."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_emprego
if($acao=="editar_emprego"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_emprego = sqlinj($_REQUEST['id_emprego']);
	$emprego 			= sqlinj($_POST['emprego']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_emprego']);
	$hora_fim = sqlinj($_POST['hora_fim_emprego']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_emprego = $data;
					$data_explode_emprego = explode("/", $data_emprego);	
					$data_emprego_parte1 = $data_explode_emprego[0];
					$data_emprego_parte2 = $data_explode_emprego[1];
					$data_emprego_parte3 = $data_explode_emprego[2];
					$data_emprego_por_ano = "".$data_emprego_parte3."/".$data_emprego_parte2."/".$data_emprego_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($emprego)){
		echo "<script>alert('Informe um nome para o emprego!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_emprego set id_cliente='$id_cliente',emprego='$emprego',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_emprego_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_emprego=".$id_emprego;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_emprego where id_emprego='$id_emprego'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("emprego/".$dadosf1['imagem'])){
				unlink("emprego/".$dadosf1['imagem']);
				unlink("emprego/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'emprego/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "emprego/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("emprego/t/".$arquivo,80);
		}
			$sqlui = "update tb_emprego set imagem='$arquivo' where id_emprego=".$id_emprego."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_emprego='$id_emprego'");
		}
		if(!empty($video)){
		$sql_video_emprego = mysql_query("update tb_video link='$video',id_emprego='$id_emprego'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=empregos_detalhes&id_emprego=".$_REQUEST[id_emprego]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_emprego"){

	$id_emprego = sqlinj($_GET['id_emprego']);
	//excluindo a imagem da pasta antes de excluir o emprego
	$sql1 = "select * from tb_emprego where id_emprego=".$id_emprego;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o emprego
	$sql1 = "select imagem from tb_emprego where id_emprego=".$id_emprego;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_emprego=".$id_emprego;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_emprego=".$id_emprego;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_emprego=".$id_emprego;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_emprego=".$id_emprego;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_emprego where id_emprego=".$id_emprego;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("emprego/".$dados1['imagem'])){
		unlink("emprego/".$dados1['imagem']);
		unlink("emprego/t/".$dados1['imagem']);
	}
	if(file_exists("emprego/".$dados1['imagem2'])){
		unlink("emprego/".$dados1['imagem2']);
		unlink("emprego/t/".$dados1['imagem2']);
	}	
	if(file_exists("emprego/".$dados1['imagem3'])){
		unlink("emprego/".$dados1['imagem3']);
		unlink("emprego/t/".$dados1['imagem3']);
	}	
	if(file_exists("emprego/".$dados1['imagem4'])){
		unlink("emprego/".$dados1['imagem4']);
		unlink("emprego/t/".$dados1['imagem4']);
	}	
	if(file_exists("emprego/".$dados1['imagem5'])){
		unlink("emprego/".$dados1['imagem5']);
		unlink("emprego/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_emprego = ".$id_emprego."");
	$sql = mysql_query("delete from tb_bannercentro where id_emprego = ".$id_emprego."");
	$sql = mysql_query("delete from tb_emprego where id_emprego = ".$id_emprego."");
	$sql = mysql_query("delete from tb_patrocinador where id_emprego = ".$id_emprego."");
	$sql = mysql_query("delete from tb_cobertura where id_emprego = ".$id_emprego."");
	//deletar as fotos da emprego
	//deletar coberturas desta emprego
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_empregos_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 //Adicionar banco
if($acao=="cadastrar_banco"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$banco 			= sqlinj($_POST['banco']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_banco']);
	$hora_fim = sqlinj($_POST['hora_fim_banco']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_banco = $data;
					$data_explode_banco = explode("/", $data_banco);	
					$data_banco_parte1 = $data_explode_banco[0];
					$data_banco_parte2 = $data_explode_banco[1];
					$data_banco_parte3 = $data_explode_banco[2];
					$data_banco_por_ano = "".$data_banco_parte3."/".$data_banco_parte2."/".$data_banco_parte1."";
					echo '<script> alert("encontrou id da banco'.$data_banco_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o banco'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'banco/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "banco/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("banco/t/".$arquivo,80);
		}

		$sql = "insert into tb_banco (id_cliente,banco,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$banco','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_banco_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_banco=mysql_insert_id(); 
		echo '<script> alert("'.$id_banco.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_banco) values ('$link1','$link2','$link3','$id_banco')");
		}
		if(!empty($video)){
		$sql_video_banco = mysql_query("insert into tb_video (link,id_banco) values ('$video','$id_banco')");
		}
	
$sqlbanco = mysql_query("select * from tb_banco where cep = '$cep'");
$linhasbanco = mysql_num_rows($sqlbanco);
$dadosbanco = mysql_fetch_array($sqlbanco);

$idbancobusca = $dadosbanco['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - bancos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=bancos_detalhes&id_banco=".$id_banco."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_banco
if($acao=="editar_banco"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_banco = sqlinj($_REQUEST['id_banco']);
	$banco 			= sqlinj($_POST['banco']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_banco']);
	$hora_fim = sqlinj($_POST['hora_fim_banco']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_banco = $data;
					$data_explode_banco = explode("/", $data_banco);	
					$data_banco_parte1 = $data_explode_banco[0];
					$data_banco_parte2 = $data_explode_banco[1];
					$data_banco_parte3 = $data_explode_banco[2];
					$data_banco_por_ano = "".$data_banco_parte3."/".$data_banco_parte2."/".$data_banco_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($banco)){
		echo "<script>alert('Informe um nome para o banco!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_banco set id_cliente='$id_cliente',banco='$banco',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_banco_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_banco=".$id_banco;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_banco where id_banco='$id_banco'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("banco/".$dadosf1['imagem'])){
				unlink("banco/".$dadosf1['imagem']);
				unlink("banco/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'banco/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "banco/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("banco/t/".$arquivo,80);
		}
			$sqlui = "update tb_banco set imagem='$arquivo' where id_banco=".$id_banco."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_banco='$id_banco'");
		}
		if(!empty($video)){
		$sql_video_banco = mysql_query("update tb_video link='$video',id_banco='$id_banco'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=bancos_detalhes&id_banco=".$_REQUEST[id_banco]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_banco"){

	$id_banco = sqlinj($_GET['id_banco']);
	//excluindo a imagem da pasta antes de excluir o banco
	$sql1 = "select * from tb_banco where id_banco=".$id_banco;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o banco
	$sql1 = "select imagem from tb_banco where id_banco=".$id_banco;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_banco=".$id_banco;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_banco=".$id_banco;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_banco=".$id_banco;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_banco=".$id_banco;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_banco where id_banco=".$id_banco;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("banco/".$dados1['imagem'])){
		unlink("banco/".$dados1['imagem']);
		unlink("banco/t/".$dados1['imagem']);
	}
	if(file_exists("banco/".$dados1['imagem2'])){
		unlink("banco/".$dados1['imagem2']);
		unlink("banco/t/".$dados1['imagem2']);
	}	
	if(file_exists("banco/".$dados1['imagem3'])){
		unlink("banco/".$dados1['imagem3']);
		unlink("banco/t/".$dados1['imagem3']);
	}	
	if(file_exists("banco/".$dados1['imagem4'])){
		unlink("banco/".$dados1['imagem4']);
		unlink("banco/t/".$dados1['imagem4']);
	}	
	if(file_exists("banco/".$dados1['imagem5'])){
		unlink("banco/".$dados1['imagem5']);
		unlink("banco/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_banco = ".$id_banco."");
	$sql = mysql_query("delete from tb_bannercentro where id_banco = ".$id_banco."");
	$sql = mysql_query("delete from tb_banco where id_banco = ".$id_banco."");
	$sql = mysql_query("delete from tb_patrocinador where id_banco = ".$id_banco."");
	$sql = mysql_query("delete from tb_cobertura where id_banco = ".$id_banco."");
	//deletar as fotos da banco
	//deletar coberturas desta banco
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_bancos_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 //Adicionar app
if($acao=="cadastrar_app"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$app 			= sqlinj($_POST['app']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_app']);
	$hora_fim = sqlinj($_POST['hora_fim_app']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_app = $data;
					$data_explode_app = explode("/", $data_app);	
					$data_app_parte1 = $data_explode_app[0];
					$data_app_parte2 = $data_explode_app[1];
					$data_app_parte3 = $data_explode_app[2];
					$data_app_por_ano = "".$data_app_parte3."/".$data_app_parte2."/".$data_app_parte1."";
					echo '<script> alert("encontrou id da app'.$data_app_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o app'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'app/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "app/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("app/t/".$arquivo,80);
		}

		$sql = "insert into tb_app (id_cliente,app,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$app','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_app_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_app=mysql_insert_id(); 
		echo '<script> alert("'.$id_app.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_app) values ('$link1','$link2','$link3','$id_app')");
		}
		if(!empty($video)){
		$sql_video_app = mysql_query("insert into tb_video (link,id_app) values ('$video','$id_app')");
		}
	
$sqlapp = mysql_query("select * from tb_app where cep = '$cep'");
$linhasapp = mysql_num_rows($sqlapp);
$dadosapp = mysql_fetch_array($sqlapp);

$idappbusca = $dadosapp['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - apps em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=apps_detalhes&id_app=".$id_app."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_app
if($acao=="editar_app"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_app = sqlinj($_REQUEST['id_app']);
	$app 			= sqlinj($_POST['app']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_app']);
	$hora_fim = sqlinj($_POST['hora_fim_app']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_app = $data;
					$data_explode_app = explode("/", $data_app);	
					$data_app_parte1 = $data_explode_app[0];
					$data_app_parte2 = $data_explode_app[1];
					$data_app_parte3 = $data_explode_app[2];
					$data_app_por_ano = "".$data_app_parte3."/".$data_app_parte2."/".$data_app_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($app)){
		echo "<script>alert('Informe um nome para o app!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_app set id_cliente='$id_cliente',app='$app',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_app_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_app=".$id_app;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_app where id_app='$id_app'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("app/".$dadosf1['imagem'])){
				unlink("app/".$dadosf1['imagem']);
				unlink("app/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'app/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "app/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("app/t/".$arquivo,80);
		}
			$sqlui = "update tb_app set imagem='$arquivo' where id_app=".$id_app."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_app='$id_app'");
		}
		if(!empty($video)){
		$sql_video_app = mysql_query("update tb_video link='$video',id_app='$id_app'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=apps_detalhes&id_app=".$_REQUEST[id_app]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_app"){

	$id_app = sqlinj($_GET['id_app']);
	//excluindo a imagem da pasta antes de excluir o app
	$sql1 = "select * from tb_app where id_app=".$id_app;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o app
	$sql1 = "select imagem from tb_app where id_app=".$id_app;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_app=".$id_app;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_app=".$id_app;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_app=".$id_app;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_app=".$id_app;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_app where id_app=".$id_app;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("app/".$dados1['imagem'])){
		unlink("app/".$dados1['imagem']);
		unlink("app/t/".$dados1['imagem']);
	}
	if(file_exists("app/".$dados1['imagem2'])){
		unlink("app/".$dados1['imagem2']);
		unlink("app/t/".$dados1['imagem2']);
	}	
	if(file_exists("app/".$dados1['imagem3'])){
		unlink("app/".$dados1['imagem3']);
		unlink("app/t/".$dados1['imagem3']);
	}	
	if(file_exists("app/".$dados1['imagem4'])){
		unlink("app/".$dados1['imagem4']);
		unlink("app/t/".$dados1['imagem4']);
	}	
	if(file_exists("app/".$dados1['imagem5'])){
		unlink("app/".$dados1['imagem5']);
		unlink("app/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_app = ".$id_app."");
	$sql = mysql_query("delete from tb_bannercentro where id_app = ".$id_app."");
	$sql = mysql_query("delete from tb_app where id_app = ".$id_app."");
	$sql = mysql_query("delete from tb_patrocinador where id_app = ".$id_app."");
	$sql = mysql_query("delete from tb_cobertura where id_app = ".$id_app."");
	//deletar as fotos da app
	//deletar coberturas desta app
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_apps_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 //Adicionar users
if($acao=="cadastrar_users"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$users 			= sqlinj($_POST['users']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_users']);
	$hora_fim = sqlinj($_POST['hora_fim_users']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_users = $data;
					$data_explode_users = explode("/", $data_users);	
					$data_users_parte1 = $data_explode_users[0];
					$data_users_parte2 = $data_explode_users[1];
					$data_users_parte3 = $data_explode_users[2];
					$data_users_por_ano = "".$data_users_parte3."/".$data_users_parte2."/".$data_users_parte1."";
					echo '<script> alert("encontrou id da users'.$data_users_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o users'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'users/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "users/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("users/t/".$arquivo,80);
		}

		$sql = "insert into tb_users (id_cliente,users,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$users','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_users_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_users=mysql_insert_id(); 
		echo '<script> alert("'.$id_users.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_users) values ('$link1','$link2','$link3','$id_users')");
		}
		if(!empty($video)){
		$sql_video_users = mysql_query("insert into tb_video (link,id_users) values ('$video','$id_users')");
		}
	
$sqlusers = mysql_query("select * from tb_users where cep = '$cep'");
$linhasusers = mysql_num_rows($sqlusers);
$dadosusers = mysql_fetch_array($sqlusers);

$idusersbusca = $dadosusers['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - userss em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=userss_detalhes&id_users=".$id_users."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_users
if($acao=="editar_users"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_users = sqlinj($_REQUEST['id_users']);
	$users 			= sqlinj($_POST['users']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_users']);
	$hora_fim = sqlinj($_POST['hora_fim_users']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_users = $data;
					$data_explode_users = explode("/", $data_users);	
					$data_users_parte1 = $data_explode_users[0];
					$data_users_parte2 = $data_explode_users[1];
					$data_users_parte3 = $data_explode_users[2];
					$data_users_por_ano = "".$data_users_parte3."/".$data_users_parte2."/".$data_users_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($users)){
		echo "<script>alert('Informe um nome para o users!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_users set id_cliente='$id_cliente',users='$users',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_users_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_users=".$id_users;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_users where id_users='$id_users'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("users/".$dadosf1['imagem'])){
				unlink("users/".$dadosf1['imagem']);
				unlink("users/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'users/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "users/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("users/t/".$arquivo,80);
		}
			$sqlui = "update tb_users set imagem='$arquivo' where id_users=".$id_users."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_users='$id_users'");
		}
		if(!empty($video)){
		$sql_video_users = mysql_query("update tb_video link='$video',id_users='$id_users'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=userss_detalhes&id_users=".$_REQUEST[id_users]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_users"){

	$id_users = sqlinj($_GET['id_users']);
	//excluindo a imagem da pasta antes de excluir o users
	$sql1 = "select * from tb_users where id_users=".$id_users;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o users
	$sql1 = "select imagem from tb_users where id_users=".$id_users;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_users=".$id_users;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_users=".$id_users;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_users=".$id_users;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_users=".$id_users;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_users where id_users=".$id_users;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("users/".$dados1['imagem'])){
		unlink("users/".$dados1['imagem']);
		unlink("users/t/".$dados1['imagem']);
	}
	if(file_exists("users/".$dados1['imagem2'])){
		unlink("users/".$dados1['imagem2']);
		unlink("users/t/".$dados1['imagem2']);
	}	
	if(file_exists("users/".$dados1['imagem3'])){
		unlink("users/".$dados1['imagem3']);
		unlink("users/t/".$dados1['imagem3']);
	}	
	if(file_exists("users/".$dados1['imagem4'])){
		unlink("users/".$dados1['imagem4']);
		unlink("users/t/".$dados1['imagem4']);
	}	
	if(file_exists("users/".$dados1['imagem5'])){
		unlink("users/".$dados1['imagem5']);
		unlink("users/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_users = ".$id_users."");
	$sql = mysql_query("delete from tb_bannercentro where id_users = ".$id_users."");
	$sql = mysql_query("delete from tb_users where id_users = ".$id_users."");
	$sql = mysql_query("delete from tb_patrocinador where id_users = ".$id_users."");
	$sql = mysql_query("delete from tb_cobertura where id_users = ".$id_users."");
	//deletar as fotos da users
	//deletar coberturas desta users
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_userss_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################
 //Adicionar configuracoes
if($acao=="cadastrar_configuracoes"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$configuracoes 			= sqlinj($_POST['configuracoes']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_configuracoes']);
	$hora_fim = sqlinj($_POST['hora_fim_configuracoes']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_configuracoes = $data;
					$data_explode_configuracoes = explode("/", $data_configuracoes);	
					$data_configuracoes_parte1 = $data_explode_configuracoes[0];
					$data_configuracoes_parte2 = $data_explode_configuracoes[1];
					$data_configuracoes_parte3 = $data_explode_configuracoes[2];
					$data_configuracoes_por_ano = "".$data_configuracoes_parte3."/".$data_configuracoes_parte2."/".$data_configuracoes_parte1."";
					echo '<script> alert("encontrou id da configuracoes'.$data_configuracoes_por_ano.'");</script>';
					
	$link = substr ($_POST['link'],31,11);
	$link2 = substr ($_POST['link'],31,11);
	$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o configuracoes'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'configuracoes/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "configuracoes/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("configuracoes/t/".$arquivo,80);
		}

		$sql = "insert into tb_configuracoes (id_cliente,configuracoes,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$configuracoes','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$detalhe','$entrada','$tags','$data_configuracoes_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_configuracoes=mysql_insert_id(); 
		echo '<script> alert("'.$id_configuracoes.'");</script>';
		include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_configuracoes) values ('$link1','$link2','$link3','$id_configuracoes')");
		}
		if(!empty($video)){
		$sql_video_configuracoes = mysql_query("insert into tb_video (link,id_configuracoes) values ('$video','$id_configuracoes')");
		}
	
$sqlconfiguracoes = mysql_query("select * from tb_configuracoes where cep = '$cep'");
$linhasconfiguracoes = mysql_num_rows($sqlconfiguracoes);
$dadosconfiguracoes = mysql_fetch_array($sqlconfiguracoes);

$idconfiguracoesbusca = $dadosconfiguracoes['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "Site";
	$assunto = "Loja";
	}
	


	$de = ('Baladitas - configuracoess em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=configuracoess_detalhes&id_configuracoes=".$id_configuracoes."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_configuracoes
if($acao=="editar_configuracoes"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_configuracoes = sqlinj($_REQUEST['id_configuracoes']);
	$configuracoes 			= sqlinj($_POST['configuracoes']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_configuracoes']);
	$hora_fim = sqlinj($_POST['hora_fim_configuracoes']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_configuracoes = $data;
					$data_explode_configuracoes = explode("/", $data_configuracoes);	
					$data_configuracoes_parte1 = $data_explode_configuracoes[0];
					$data_configuracoes_parte2 = $data_explode_configuracoes[1];
					$data_configuracoes_parte3 = $data_explode_configuracoes[2];
					$data_configuracoes_por_ano = "".$data_configuracoes_parte3."/".$data_configuracoes_parte2."/".$data_configuracoes_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($configuracoes)){
		echo "<script>alert('Informe um nome para o configuracoes!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_configuracoes set id_cliente='$id_cliente',configuracoes='$configuracoes',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_configuracoes_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_configuracoes=".$id_configuracoes;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_configuracoes where id_configuracoes='$id_configuracoes'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("configuracoes/".$dadosf1['imagem'])){
				unlink("configuracoes/".$dadosf1['imagem']);
				unlink("configuracoes/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'configuracoes/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "configuracoes/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("configuracoes/t/".$arquivo,80);
		}
			$sqlui = "update tb_configuracoes set imagem='$arquivo' where id_configuracoes=".$id_configuracoes."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_configuracoes='$id_configuracoes'");
		}
		if(!empty($video)){
		$sql_video_configuracoes = mysql_query("update tb_video link='$video',id_configuracoes='$id_configuracoes'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=configuracoess_detalhes&id_configuracoes=".$_REQUEST[id_configuracoes]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_configuracoes"){

	$id_configuracoes = sqlinj($_GET['id_configuracoes']);
	//excluindo a imagem da pasta antes de excluir o configuracoes
	$sql1 = "select * from tb_configuracoes where id_configuracoes=".$id_configuracoes;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o configuracoes
	$sql1 = "select imagem from tb_configuracoes where id_configuracoes=".$id_configuracoes;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_configuracoes=".$id_configuracoes;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_configuracoes=".$id_configuracoes;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_configuracoes=".$id_configuracoes;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_configuracoes=".$id_configuracoes;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_configuracoes where id_configuracoes=".$id_configuracoes;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("configuracoes/".$dados1['imagem'])){
		unlink("configuracoes/".$dados1['imagem']);
		unlink("configuracoes/t/".$dados1['imagem']);
	}
	if(file_exists("configuracoes/".$dados1['imagem2'])){
		unlink("configuracoes/".$dados1['imagem2']);
		unlink("configuracoes/t/".$dados1['imagem2']);
	}	
	if(file_exists("configuracoes/".$dados1['imagem3'])){
		unlink("configuracoes/".$dados1['imagem3']);
		unlink("configuracoes/t/".$dados1['imagem3']);
	}	
	if(file_exists("configuracoes/".$dados1['imagem4'])){
		unlink("configuracoes/".$dados1['imagem4']);
		unlink("configuracoes/t/".$dados1['imagem4']);
	}	
	if(file_exists("configuracoes/".$dados1['imagem5'])){
		unlink("configuracoes/".$dados1['imagem5']);
		unlink("configuracoes/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_configuracoes = ".$id_configuracoes."");
	$sql = mysql_query("delete from tb_bannercentro where id_configuracoes = ".$id_configuracoes."");
	$sql = mysql_query("delete from tb_configuracoes where id_configuracoes = ".$id_configuracoes."");
	$sql = mysql_query("delete from tb_patrocinador where id_configuracoes = ".$id_configuracoes."");
	$sql = mysql_query("delete from tb_cobertura where id_configuracoes = ".$id_configuracoes."");
	//deletar as fotos da configuracoes
	//deletar coberturas desta configuracoes
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='minhas_configuracoess_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################

//Adicionar produto
if($acao=="cadastrar_produto"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$produto 			= sqlinj($_POST['produto']);
	$preco 			= sqlinj($_POST['preco']);
	$desconto			= sqlinj($_POST['desconto']);
	$porcentagem_desconto 			= sqlinj($_POST['porcentagem_desconto']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	
  

	$data_produto = $data;
					$data_explode_produto = explode("/", $data_produto);	
					$data_produto_parte1 = $data_explode_produto[0];
					$data_produto_parte2 = $data_explode_produto[1];
					$data_produto_parte3 = $data_explode_produto[2];
					$data_produto_por_ano = "".$data_produto_parte3."/".$data_produto_parte2."/".$data_produto_parte1."";
					echo '<script> alert("encontrou id da produto'.$data_produto_por_ano.'");</script>';
					
	//$link = substr ($_POST['link'],31,11);
	//$link2 = substr ($_POST['link'],31,11);
	//$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o produto'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'produto/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "produto/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("produto/t/".$arquivo,80);
		}

		$sql = "insert into tb_produto (id_cliente,produto,preco,desconto,porcentagem_desconto,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao,data, detalhe,entrada,tags,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente','$produto','$preco','$desconto','$porcentagem_desconto','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$data','$detalhe','$entrada','$tags','$data_produto_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_produto=mysql_insert_id(); 
		echo '<script> alert("'.$id_produto.'");</script>';
		//include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_produto) values ('$link1','$link2','$link3','$id_produto')");
		}
		if(!empty($video)){
		$sql_video_produto = mysql_query("insert into tb_video (link,id_produto) values ('$video','$id_produto')");
		}
	
$sqlproduto = mysql_query("select * from tb_produto where cep = '$cep'");
$linhasproduto = mysql_num_rows($sqlproduto);
$dadosproduto = mysql_fetch_array($sqlproduto);

$idprodutobusca = $dadosproduto['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "dasdasdasd";
	$assunto = "dasdasdasd dasfassafasfafas";
	}
	
	

	$de = ('Baladitas - produtos e Eventos em geral! Cadastre a sua! ');
	$para = ('fellipe.lucenabr@yahoo.com.br');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
$mail->AddAddress("lucenafellipe15@gmail.com");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}

	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	
		
	if(!$enviado) {   
	
	} else {   
	
	} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=produtos_detalhes&id_produto=".$id_produto."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_produto
if($acao=="editar_produto"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_produto = sqlinj($_REQUEST['id_produto']);
	$produto 			= sqlinj($_POST['produto']);
	$preco 			= sqlinj($_POST['preco']);
	$desconto 			= sqlinj($_POST['desconto']);
	$porcentagem_desconto			= sqlinj($_POST['porcentagem_desconto']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$descricao 			= sqlinj($_POST['descricao']);
	$detalhe			= sqlinj($_POST['detalhe']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	

	$data_produto = $data;
					$data_explode_produto = explode("/", $data_produto);	
					$data_produto_parte1 = $data_explode_produto[0];
					$data_produto_parte2 = $data_explode_produto[1];
					$data_produto_parte3 = $data_explode_produto[2];
					$data_produto_por_ano = "".$data_produto_parte3."/".$data_produto_parte2."/".$data_produto_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($produto)){
		echo "<script>alert('Informe um nome para o produto!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_produto set id_cliente='$id_cliente',produto='$produto',preco='$preco',desconto='$desconto',porcentagem_desconto='$produto',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',detalhe='$detalhe' ,entrada='$entrada', tags='$tags', data='$data_produto_por_ano',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_produto=".$id_produto;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_produto where id_produto='$id_produto'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("produto/".$dadosf1['imagem'])){
				unlink("produto/".$dadosf1['imagem']);
				unlink("produto/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'produto/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "produto/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("produto/t/".$arquivo,80);
		}
			$sqlui = "update tb_produto set imagem='$arquivo' where id_produto=".$id_produto."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_produto='$id_produto'");
		}
		if(!empty($video)){
		$sql_video_produto = mysql_query("update tb_video link='$video',id_produto='$id_produto'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=produtos_detalhes&id_produto=".$_REQUEST[id_produto]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_produto"){

	$id_produto = sqlinj($_GET['id_produto']);
	//excluindo a imagem da pasta antes de excluir o produto
	$sql1 = "select * from tb_produto where id_produto=".$id_produto;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o produto
	$sql1 = "select imagem from tb_produto where id_produto=".$id_produto;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_produto=".$id_produto;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_produto=".$id_produto;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_produto=".$id_produto;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_produto=".$id_produto;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_produto where id_produto=".$id_produto;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("produto/".$dados1['imagem'])){
		unlink("produto/".$dados1['imagem']);
		unlink("produto/t/".$dados1['imagem']);
	}
	if(file_exists("produto/".$dados1['imagem2'])){
		unlink("produto/".$dados1['imagem2']);
		unlink("produto/t/".$dados1['imagem2']);
	}	
	if(file_exists("produto/".$dados1['imagem3'])){
		unlink("produto/".$dados1['imagem3']);
		unlink("produto/t/".$dados1['imagem3']);
	}	
	if(file_exists("produto/".$dados1['imagem4'])){
		unlink("produto/".$dados1['imagem4']);
		unlink("produto/t/".$dados1['imagem4']);
	}	
	if(file_exists("produto/".$dados1['imagem5'])){
		unlink("produto/".$dados1['imagem5']);
		unlink("produto/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_produto = ".$id_produto."");
	$sql = mysql_query("delete from tb_bannercentro where id_produto = ".$id_produto."");
	$sql = mysql_query("delete from tb_produto where id_produto = ".$id_produto."");
	$sql = mysql_query("delete from tb_patrocinador where id_produto = ".$id_produto."");
	$sql = mysql_query("delete from tb_cobertura where id_produto = ".$id_produto."");
	//deletar as fotos da produto
	//deletar coberturas desta produto
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_produtos_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################


	
//Adicionar extras
if($acao=="cadastrar_extras"){
	
	
	$id_cliente = sqlinj($_REQUEST['id_cliente']);
	$extras 			= sqlinj($_POST['extras']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$hora_inicio = sqlinj($_POST['hora_inicio_extras']);
	$hora_fim = sqlinj($_POST['hora_fim_extras']);
	$descricao 			= sqlinj($_POST['descricao']);
	$titulo			= sqlinj($_POST['titulo']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);
	$entrada	 			= sqlinj($_POST['valor']);
	$newslatter	 			= sqlinj($_POST['newslatter']);
	$data = sqlinj($_POST['data']);
	$datafim = sqlinj($_POST['datafim']);
  

	$data_extras = $data;
					$data_explode_extras = explode("/", $data_extras);	
					$data_extras_parte1 = $data_explode_extras[0];
					$data_extras_parte2 = $data_explode_extras[1];
					$data_extras_parte3 = $data_explode_extras[2];
					$data_extras_por_ano = "".$data_extras_parte3."/".$data_extras_parte2."/".$data_extras_parte1."";
					echo '<script> alert("encontrou id da extras'.$data_extras_por_ano.'");</script>';
					
	//$link = substr ($_POST['link'],31,11);
	//$link2 = substr ($_POST['link'],31,11);
	//$pdf= upload_arquivo($_FILES['pdf'], '../pdf/');

	
	if(empty($_FILES['imagem']['name'])){
		echo "<script>alert('Favor inserir uma imagem para o extras'); history.back(-1)</script>";	
	}else{
	
		$arquivo = upload_arquivo($_FILES['imagem'],'extras/');
		include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "extras/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("extras/t/".$arquivo,80);
		}

		$sql = "insert into tb_extras (id_cliente,extras,id_categoria,id_subcategoria,id_antsubcategoria,id_antantsubcategoria, id_estado, id_cidade , imagem, descricao, detalhe,entrada,tags,data,datafim,horainicio,horafim,destaque,vip,cep,numero,endereco,complemento,bairro,newslatter) values ( '$id_cliente', '$extras','$id_categoria','$id_subcategoria', '$id_antsubcategoria','$id_antantsubcategoria','$id_estado' ,'$id_cidade','$arquivo','$descricao','$titulo','$entrada','$tags','$data_extras_por_ano','$datafim','$hora_inicio','$hora_fim','$destaque','$vip' ,'$cep','$numero','$endereco','$complemento','$bairro', '$newslatter')";
		$result = mysql_query($sql) or die (mysql_error());
		$id_extras=mysql_insert_id(); 
		echo '<script> alert("'.$id_extras.'");</script>';
		//include( 'm2brimagem.class.php' );
		if($result==true){	
		
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("insert into tb_redesocial (link1,link2,link3,id_extras) values ('$link1','$link2','$link3','$id_extras')");
		}
		if(!empty($video)){
		$sql_video_extras = mysql_query("insert into tb_video (link,id_extras) values ('$video','$id_extras')");
		}
/*	
$sqlextras = mysql_query("select * from tb_extras where cep = '$cep'");
$linhasextras = mysql_num_rows($sqlextras);
$dadosextras = mysql_fetch_array($sqlextras);

$idextrasbusca = $dadosextras['cep'];



$sql = "select * from tb_cliente where newslatter = 'S'";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	

	
	
	for($i=0;$i<$linhas;$i++){
		$tmp = $dados['email'];
		$email = $email . $tmp.", ";
		
		$dados = mysql_fetch_array($result);
	$texto = "dasdasdasd";
	$assunto = "dasdasdasd dasfassafasfafas";
	}
	
	*/
	/*
	$de = ('Baladitas - extrass e Eventos em geral! Cadastre a sua! ');
	$para = ('lucenafellipe15@gmail.com');
	$assunto = ('Newslatter - Evento cadastrado Confira !');
	$html = ('<h1>Newsletter</h1> enviada <br /><strong>voce esta recebendo nossas publciacoes!</strong>');
	
	
include "phpmailer/class.phpmailer.php";
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->IsSMTP = ('smtp');
$mail->Mailer = ('mail');
//$mail->SMTPSecure = 'ssl';
//$mail->SMTPAuth = true;
$mail->Host = 'smtp.baladitas.com.br';
$mail->Username = ('fellipe16@baladitas.com.br');
$mail->Password = ('Guest123');
$mail->Sender = ('fellipe16@baladitas.com.br');
$mail->From = 'fellipe16@baladitas.com.br'; // Seu e-mail
$mail->FromName = $de; 
$mail->Addbcc ($para);
//$mail->AddAddress("felipe.lucenabr@yahoo.com.br");
$mail->AddReplyTo = ('fellipe16@baladitas.com.br');
$mail->Wordwrap = 50;
$mail->Subject  = $assunto; 
$mail->IsHTML(true);

$texto = 'Olá voce esta recebendo nossas ofertas1';


$mail->Body = $html;
$mail->AltBody = $texto;

if($mail->Send()){
	echo "<script>alert('Mensagem efetuada com sucesso!');</script>";
	}else {
		echo "<script>alert('mensagem nao enviada com sucesso!');</script>";
		}*/

/*
	$mail->AddAddress($email);   
	$mail->IsHTML(true); 
	$mail->Charset  = 'iso-8859-1';
	$mail->Subject  = iconv("UTF-8","ISO-8859-1",$assunto); 
	$mail->Body = $texto;
	$mail->WordWrap = 50;
$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	*/
		
	//if(!$enviado) {   
	
	//} else {   
	
	//} 
			echo "<script>alert('Cadastrado com Sucesso!');document.location='index.php?pagina=extras_detalhes&id_extras=".$id_extras."'</script>";
		}else{
			echo "<script>alert('Falha ao Cadastrar!!');history.back(-1)</script>";
		}
}
//Alt_extras
if($acao=="editar_extras"){
	include( 'm2brimagem.class.php' );
    $id_cliente = sqlinj($_REQUEST['id_cliente']);
	$id_extras = sqlinj($_REQUEST['id_extras']);
	$extras 			= sqlinj($_POST['extras']);
	$id_categoria	 	= sqlinj($_POST['id_categoria']);
	$id_subcategoria 	= sqlinj($_POST['id_subcategoria']);
	$id_antsubcategoria = sqlinj($_POST['id_antsubcategoria']);
	$id_antantsubcategoria 	= sqlinj(strip_tags(trim($_POST['id_antantsubcategoria'])));
	$id_estado 	= sqlinj($_POST['estado']);
	$id_cidade 	= sqlinj($_POST['cidade']);
	$data = sqlinj($_POST['data']);
	$hora_inicio = sqlinj($_POST['hora_inicio_extras']);
	$hora_fim = sqlinj($_POST['hora_fim_extras']);
	$descricao 			= sqlinj($_POST['descricao']);
	$titulo			= sqlinj($_POST['titulo']);
	$entrada			= sqlinj($_POST['valor']);
	$vip 		= sqlinj($_POST['vip']);
	$destaque 			= sqlinj($_POST['destaque']);
	$tags	 			= sqlinj($_POST['tags']);
	$cep		 			= sqlinj($_POST['cep']);
	$endereco	 			= sqlinj($_POST['endereco']);
	$numero	 			= sqlinj($_POST['numero']);
	$complemento	 			= sqlinj($_POST['complemento']);
	$bairro	 			= sqlinj($_POST['bairro']);

	$datafim = sqlinj($_POST['datafim']);

	$data_extras = $data;
					$data_explode_extras = explode("/", $data_extras);	
					$data_extras_parte1 = $data_explode_extras[0];
					$data_extras_parte2 = $data_explode_extras[1];
					$data_extras_parte3 = $data_explode_extras[2];
					$data_extras_por_ano = "".$data_extras_parte3."/".$data_extras_parte2."/".$data_extras_parte1."";
	if(empty($id_categoria) || $id_categoria == 0){
		echo "<script>alert('Escolha uma categoria!');history.back(-1)</script>";
	}elseif(empty($extras)){
		echo "<script>alert('Informe um nome para o extras!');history.back(-1)</script>";
	}elseif(empty($descricao)){
		echo "<script>alert('Digite uma descricao!');history.back(-1)</script>";
	}elseif(empty($detalhe)){
		echo "<script>alert('Digite os detalhes!');history.back(-1)</script>";
	}else{	
	$sql = "update tb_extras set id_cliente='$id_cliente',extras='$extras',id_categoria='$id_categoria',id_subcategoria ='$id_subcategoria' ,id_antsubcategoria ='$id_antsubcategoria', id_antantsubcategoria ='$id_antantsubcategoria',id_estado ='$id_estado',id_cidade ='$id_cidade', descricao='$descricao',titulo='$titulo' ,entrada='$entrada', tags='$tags', data='$data_extras_por_ano', datafim='$datafim', horainicio='$hora_inicio', horafim='$hora_fim',destaque='$destaque', vip='$vip', cep='$cep', numero='$numero', endereco='$endereco', complemento='$complemento',bairro='$bairro' where id_extras=".$id_extras;
	
		///////////////atualiza a PRIMEIRA imagem se existir
		if(!empty($_FILES['imagem']['name'])){
			//consulta a imagem para excluir da pasta antes de dá o update
			$sqlf1 = "select imagem from tb_extras where id_extras='$id_extras'";
			$resultf1 = mysql_query($sqlf1) or die(mysql_error());
			$dadosf1 = mysql_fetch_array($resultf1);
		
			if(file_exists("extras/".$dadosf1['imagem'])){
				unlink("extras/".$dadosf1['imagem']);
				unlink("extras/t/".$dadosf1['imagem']);
			}
		
		$arquivo = upload_arquivo($_FILES['imagem'],'extras/');
		//include('m2brimagem.class.php' );
		$oImg = new m2brimagem();
		// valida via m2brimagem
		$oImg->carrega( "extras/".$arquivo );
		$valida = $oImg->valida();
		if ($valida == 'OK') {
			$oImg->redimensiona('160','213','');
			$oImg->grava("extras/t/".$arquivo,80);
		}
			$sqlui = "update tb_extras set imagem='$arquivo' where id_extras=".$id_extras."";
			$resultui = mysql_query($sqlui) or die (mysql_error());
		}
		//////////////////////FIM//////////////////////////////
		$result = mysql_query($sql) or die (mysql_error());
		if($result==true){	
		$video = substr ($_POST['video'],31,11);
		$link1 = sqlinj($_POST['facebook']);
		$link2 = sqlinj($_POST['twitter']);
		$link3 = sqlinj($_POST['orkut']);
		if(!empty($link1) or !empty($link2) or !empty($link3)){
		$sql_rede_social = mysql_query("update tb_redesocial set link1='$link1',link2='$link2',link3='$link3',id_extras='$id_extras'");
		}
		if(!empty($video)){
		$sql_video_extras = mysql_query("update tb_video link='$video',id_extras='$id_extras'");
		}

			echo "<script>alert('Atualizado com Sucesso!');document.location='index.php?pagina=baladas_detalhes&id_extras=".$_REQUEST[id_extras]."'</script>";
		}else{
			echo "<script>alert('Falha ao Atualizar!');history.back(-1)</script>";
		}
	}
}
//Del 
if($acao=="del_extras"){

	$id_extras = sqlinj($_GET['id_extras']);
	//excluindo a imagem da pasta antes de excluir o extras
	$sql1 = "select * from tb_extras where id_extras=".$id_extras;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(isset($_SESSION[cliente][ID]) and $_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Você não tem permissão para Excluir este Evento!');history.back(-1)</script>";
		}else{echo "<script>alert('Efetue login para Excluir este Evento!');history.back(-1)</script>";}
	
	//excluindo a imagem da pasta antes de excluir o extras
	$sql1 = "select imagem from tb_extras where id_extras=".$id_extras;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_extras=".$id_extras;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql_bannerA = "select * from tb_bannercentro where id_extras=".$id_extras;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	$sql_patrocinador = "select * from tb_patrocinador where id_extras=".$id_extras;
	$result_patrocinador = mysql_query($sql_patrocinador) or die(mysql_error());
	while($dados_patrocinador = mysql_fetch_array($result_patrocinador)){
		if(file_exists("patrocinador/".$dados_patrocinador['imagem'])){
		unlink("patrocinador/".$dados_patrocinador['imagem']);
	}}
	$sql_cobertura = "select * from tb_cobertura where id_extras=".$id_extras;
	$result_cobertura = mysql_query($sql_cobertura) or die(mysql_error());
	$dados_cobertura = mysql_fetch_array($result_cobertura);
	$id_cobertura = $dados_cobertura['id_cobertura'];
	$sql_fotos_cobertura = mysql_query("select * from tb_fotos where id_cobertura=".$id_cobertura."");
	while($dados_fotos_cobertura = mysql_fetch_array($sql_fotos_cobertura)){
		if(file_exists("fotocobertura/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/t/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/t/".$dados_fotos_cobertura['imagem']);
		if(file_exists("fotocobertura/r/".$dados_fotos_cobertura['imagem'])){
		unlink("fotocobertura/r/".$dados_fotos_cobertura['imagem']);
	}}
	
	$sql_delete_cobertura = mysql_query("delete from tb_fotos where id_cobertura = ".$id_cobertura."");
	
	//consulta a imagem para excluir da pasta antes de dá o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_extras where id_extras=".$id_extras;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("extras/".$dados1['imagem'])){
		unlink("extras/".$dados1['imagem']);
		unlink("extras/t/".$dados1['imagem']);
	}
	if(file_exists("extras/".$dados1['imagem2'])){
		unlink("extras/".$dados1['imagem2']);
		unlink("extras/t/".$dados1['imagem2']);
	}	
	if(file_exists("extras/".$dados1['imagem3'])){
		unlink("extras/".$dados1['imagem3']);
		unlink("extras/t/".$dados1['imagem3']);
	}	
	if(file_exists("extras/".$dados1['imagem4'])){
		unlink("extras/".$dados1['imagem4']);
		unlink("extras/t/".$dados1['imagem4']);
	}	
	if(file_exists("extras/".$dados1['imagem5'])){
		unlink("extras/".$dados1['imagem5']);
		unlink("extras/t/".$dados1['imagem5']);
	}	
	$sql = mysql_query("delete from tb_bannerprincipal where id_extras = ".$id_extras."");
	$sql = mysql_query("delete from tb_bannercentro where id_extras = ".$id_extras."");
	$sql = mysql_query("delete from tb_extras where id_extras = ".$id_extras."");
	$sql = mysql_query("delete from tb_patrocinador where id_extras = ".$id_extras."");
	$sql = mysql_query("delete from tb_cobertura where id_extras = ".$id_extras."");
	//deletar as fotos da extras
	//deletar coberturas desta extras
	//e fotos da cobertura
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='meus_extras_lista&id_cliente=".$_REQUEST[id_cliente]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}
}}}
//##############################################################################################################	
	
	
}}}

?>