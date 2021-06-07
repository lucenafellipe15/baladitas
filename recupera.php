<?php

		//include "conexao/conexao.php";
		
		$email = $_POST['email'];
		$sql = mysql_query("SELECT * FROM tb_cliente WHERE email = '$email'") or die(mysql_error());
		$contar = mysql_num_rows($sql);

		if($contar >= '1'){
			$sql = mysql_fetch_array($sql);
			$nome = $sql['nome'];
			$senha = $sql['senha'];
			$email = $sql['email'];

			include "phpmailer/class.phpmailer.php";

			$mensagem = "Caro Sr(a)" .$nome. "<BR> Foi solicitado o envio de senha para este email, " .$email. "<P>A senha segue abaixo:<BR><B>" .$senha. "</B><P>Data do envio: " .date("d-m-Y"). "<BR>";
			
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
		}else{
			echo "<script>alert('Email nao cadastrado em nosso banco de dados');history.back(-1)</script>";
		}
?>