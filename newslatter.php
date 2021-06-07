<?php

		//include "conexao/conexao.php";
		
		$email = $_POST['email'];
		$sql = mysql_query("SELECT * FROM tb_cliente WHERE email = '$email'") or die(mysql_error());
		$contar = mysql_num_rows($sql);
	

	if($contar >= '1'){
			$sql = mysql_fetch_array($sql);
			$id_cliente = $sql['id_cliente'];
			$nome = $sql['nome'];
			$senha = $sql['senha'];
			$email = $sql['email'];
			
			$sql_produto = mysql_query("SELECT * FROM tb_produto") or die(mysql_error());
		    $contar_produto = mysql_num_rows($sql_produto);
			while($dados_produto = mysql_fetch_array($sql)){

			include "phpmailer/class.phpmailer.php";

			$mensagem = "Caro Sr(a)" .$nome. "<BR> Foi solicitado o envio de produtos para este email, " .$email. "<P>O Produto segue abaixo:<BR><B>" .$dados_produto['produto']. "</B><P>Data do envio: " .date("d-m-Y"). "<BR>";
			
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = 'smtp.mail.yahoo.com';
			$mail->Username = 'fellipe.lucenabr';
			$mail->Password = '29061974';
			$mail->SetFrom('fellipe.lucenabr@yahoo.com');
			$mail->AddAddress($email, 'Urbano');
			$mail->Subject = 'Re-envio de Email';
					   
			$body = "<strong>Nome :</strong>{$nome} <br />
				<strong>E-mail :</strong>{$email} <br />
				<strong>Telefone :</strong>{$senha} <br />
				<strong>Mensagem :</strong>{$mensagem} <br />";
		   
			$mail->MsgHTML($body);

			if($mail->Send()){
				echo "<script>alert('Uma mensagem foi enviado para o seu endereco de email');document.location='index.php?pagina=recupera';</script>"; 
				echo '<script> history.back()</script>';
			}else{
				echo '<script> alert("Desculpe, houve um problema no envio!") </script>';  
			}	
		}}else{
			echo "<script>alert('Email nao cadastrado em nosso banco de dados');history.back(-1)</script>";
		}
?>