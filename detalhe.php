﻿<?php 
include "adm/conexao.php";

$id_curso_ = str_replace("'","",$_GET['id_curso']);
$id_curso = addslashes($id_curso_);


$sql = "select * from tb_curso where id_curso=".$id_curso;
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	$precosemponto= str_replace('.', '', $dados['valor']);
	    $preco= str_replace(',', '', $precosemponto);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RH CURSOS</title>

<!--METAS-->
<meta name="robots" content="index, follow" />
<meta name="author" content="Nova Midia Brasilia - http://www.novamidiabrasilia.com" />
<meta name="publisher" content="Nova Midia Brasilia - http://www.novamidiabrasilia.com" />
<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
<meta name="description" content="NATURAL PILATES - Studio Natural Pilates - SHIN CA 02 Lt A Bl A Lj 12 - (61) 3033-3282 - Brasilia - DF" />
<meta name="keywords" content="academia pilates, pilates, academia, asa norte, " /> 
<meta name="rating" content="General" />
<meta name="expires" content="0" />
<meta name="language" content="portuguese, PT-BR" />
<meta name="copyright" content="NATURAL PILATES" />
<!--FIM METAS-->

<!--MENU CSS-->
<style media="all" type="text/css">@import "css/menu_style.css";</style>
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="/include/ie6.css" media="screen"/>
<![endif]-->
<!--FIM DO MENU CSS-->

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' está incorreto.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' somente números.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' '+min+' '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+'  é obrigatório.\n'; }
    } if (errors) alert('Existe(m) campo(s) a ser(em) preenchido(s):\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<script src="Scripts/jquery-1.2.6.js" type="text/javascript"></script>

</head>

<body >

<!--TOPO-->
<div id="topo">
<!--LOGO-->
<div id="box_logo">
<a href="index.php"><img src="images/logo.jpg" alt="logo marca" width="299" height="169" border="0" /></a>
<img src="images/texto_pri.png" alt="O senhor abrirá o céu, o depósito do seu tesouro, para enviar chuva à sua terra no devido tempo e para abençoar todo o trabalho das suas mãos." width="299" height="71" /></div>
<!--BANNER-->
<div id="banner_flash">
  <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="681" height="292">
    <param name="movie" value="swf/banner_flash.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="transparent" />
    <param name="swfversion" value="9.0.45.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="swf/banner_flash.swf" width="681" height="292">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="transparent" />
      <param name="swfversion" value="9.0.45.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>
</div>
<!--FIM DO TOPO-->

<!--CONTEUDO-->

<div id="conteudo">
<!--MENU-->
<div class="wrapper1">
	<div class="wrapper">
		<div class="nav-wrapper">
		  <div class="nav">
		    <ul id="navigation">
			   		<li class="">
						<a href="index.php">
							<span class="menu-left"></span>
							<span class="menu-mid">Apresentação</span>
							<span class="menu-right"></span>
						</a>
                      <div class="sub">
		   				  <ul>
                                <li>
									<a href="quemsomos.php">Quem Somos</a>
							  </li>
                            	<li>
									<a href="galeriadefotos.php">Galeria de fotos</a>
								</li>
                            	<li>
									<a href="certidoes.php">Certidões</a>
								</li>
                                
                           </ul>
                           <div class="btm-bg"></div>
                           </div>
					</li>
			   		<li class="active">
						<a href="cursos.php">
							<span class="menu-left"></span>
							<span class="menu-mid">cursos</span>
							<span class="menu-right"></span>
						</a>
        </li>
			   		<li class="">
						<a href="professores.php">
							<span class="menu-left"></span>
							<span class="menu-mid">Professores</span>
							<span class="menu-right"></span>
						</a>
  </li>
			   		<li class="">
						<a href="#">
							<span class="menu-left"></span>
							<span class="menu-mid">Novidades</span>
							<span class="menu-right"></span>
						</a>
<div class="sub">
			   				<ul>
                            	<li>
									<a href="eventos.php">Eventos</a>
							  </li>
			   					<li>
									<a href="noticias.php">Notícias</a>
								</li>
			   				</ul>
			   				<div class="btm-bg"></div>
		   			  </div>
				  </li>
			   		<li class="">
						<a href="clientes.php">
							<span class="menu-left"></span>
							<span class="menu-mid">Clientes</span>
							<span class="menu-right"></span>
						</a>
</li>
			   		<li class="">
						<a href="#">
							<span class="menu-left"></span>
							<span class="menu-mid">Cadastro</span>
							<span class="menu-right"></span>
						</a>
<div class="sub">
			   				<ul>
                                <li>
									<a href="preinscricao.php">Pré-inscrição</a>
							  </li>
			   					<li>
									<a href="newsletter.php">Newsletter</a>
								</li>
			   				</ul>
			   				<div class="btm-bg"></div>
		   			  </div>
				  </li>
                  <li class="last">
						<a href="agenda.php">
							<span class="menu-left"></span>
							<span class="menu-mid">Agenda</span>
							<span class="menu-right"></span>
						</a>
  </li>
			   		<li class="last">
						<a href="contato.php">
							<span class="menu-left"></span>
							<span class="menu-mid">Contato</span>
							<span class="menu-right"></span>
						</a>
                          <div class="sub">
			   				<ul>
                            	<li>
									<a href="atendimento.php">Atendimento On-line</a>
							  </li>
                                <li>
									<a href="contato.php#local">Localização</a>
								</li>
			   					<li>
									<a href="contato.php">Falar Conosco</a>
								</li>
			   				</ul>
			   				<div class="btm-bg"></div>
		   			  </div>
			   		</li>
	   	    </ul>
		  </div>
		</div>
	</div>
</div>
<!--FIM DO MENU-->
<!--BOX ESQUERDA-->

<div style="width:680px; float:left;">

<!--FORM BUSCA-->
<form id="form3" name="form3" method="post" action="#">
<table width="680" border="0" cellspacing="0" cellpadding="3" style="background-color:#f69021; float:left;">
  <tr>
    <td width="140" align="right" valign="middle" class="span"><span>Busca por Curso:</span></td>
    <td width="216" align="left" valign="bottom">
      <input type="text" name="pesquisa" id="pesquisa" />
    </td>
    <td width="306" align="left" valign="top" style="padding-top:07px;"><input name="enviar2" type="image" id="enviar2" value="Submit" src="images/bt_enviar.jpg" alt="Enviar" /></td>
  </tr>
</table>
</form>

<!--BOX ESQUERDA-->
<div id="box_esq">

  <h2><?php echo $dados['curso']?> </h2>

<table width="652" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dotted #d75c14;">
  <tr>
    <td width="217" align="center"><img src="curso/<?php if ($dados['imagem'] == "" ){ echo "img_produto.jpg"; }else{ echo $dados['imagem']; } ?>" width="239" height="239" alt="produto" /></td>
    <td width="435" align="left" valign="top" style="padding:5px;">
    <div align="right" style="margin-bottom:20px;"><span class="valor"><?php echo ($dados['valor']!="")? "&nbsp; R$ ".$dados['valor']:""?></span>
    <a href="preinscricao.php?id_curso=<?php echo $dados['id_curso']?>"><img src="images/bt_inscricao.jpg" alt="Inscrição On-line" border="0" style="margin-left:10px;" /></a><br /></div>
    <p><?php echo $dados['texto']?></p>
    </td>
  </tr>
  <tr>
    <td height="50" colspan="2" align="left" valign="top" style="padding:10px;"><p><?php echo $dados['texto2']?></p></td>
    </tr>
  <tr>
    <td height="50">&nbsp;</td>
    <td align="right" valign="top"><a href="preinscricao.php?id_curso=<?php echo $dados['id_curso']?>"><img src="images/bt_inscricao.jpg" alt="Inscrição On-line" border="0" style="margin-left:10px;" /></a>
    </td>
  </tr>
  </table>


</div>
</div>

<!--BOX DIREITA-->
<div id="box_dir">
<h2>Novos cursos</h2>
  <?php 
	$sql1 = "select * from tb_banner order by id_banner DESC LIMIT 3";
	$result1 = mysql_query($sql1) or die(mysql_error());
	$linhas1 = mysql_num_rows($result1);
	$dados1 = mysql_fetch_array($result1);
	for($i=0;$i<$linhas1;$i++){
?>  
<a href="detalhe.php?id_curso=<?php echo $dados1['id_curso'];?>" >
  <img src="banner/<?php echo $dados1['banner']?>" width="291" height="284" alt="banner1" border="0"/>
</a>
  <br /><br />
<?php
$dados1 = mysql_fetch_array($result1);
 } ?>
</div>


</div>
<!--FIM DO CONTEUDO-->


<!--BANNER PROFESSORES-->
<div id="professores">
  <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="978" height="247">
    <param name="movie" value="swf/banner_professores.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="swf/banner_professores.swf" width="978" height="247">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>
<!--FIM DO BANNER PROFESSORES-->


<!--BANNER CADASTRO-->
<div id="cadastro">
<form action="preinscricao.php" method="post" name="form1" id="form1" >
<table width="335" style="height:157px; float:left;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="34" colspan="2" style="padding-left:10px;"><h2>Pré-cadastro</h2></td>
    </tr>
  <tr>
    <td width="89" align="right" valign="middle"><span>Nome:</span></td>
    <td width="246" align="left" valign="middle">
      <input type="text" name="nome" id="nome" />
   </td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span>E-mail:</span></td>
    <td align="left" valign="middle"><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="padding-right:22px;"><input name="enviar" type="image" id="enviar" value="Submit" src="images/bt_enviar.jpg" alt="Enviar" /></td>
  </tr>
</table>
 </form>
<a href="#"><img src="images/chat_on_line.jpg" alt="Chat on0line" style="margin:10px 05px; float:left;" border="0" /></a>

<form action="acao_cliente.php?comando=add_news" method="post" name="form2" id="form2" >
<table width="337" style="height:157px; float:left;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="34" colspan="2" style="padding-left:10px;"><h2>Newsletter</h2></td>
    </tr>
  <tr>
    <td width="89" align="right" valign="middle"><span>Nome:</span></td>
    <td width="248" align="left" valign="middle">
      <input type="text" name="nome1" id="nome1" />
   </td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span>E-mail:</span></td>
    <td align="left" valign="middle"><input type="text" name="email1" id="email1" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="padding-right:22px;">
    <input name="enviar" type="image" id="enviar" value="Submit" src="images/bt_enviar.jpg" alt="Enviar" /></td>
  </tr>
</table>
 </form>
</div>
<!--FIM DO BANNER CADASTRO-->


<!--RODAPE-->
<div id="rodape">
<div style="width:1000px; height:22px; background-color:#f4ede3; margin:0 auto;"></div>
<div id="rodape_centro">

<!--MENU2-->
<div style="border-top:1px dashed #FFF; margin-top:20px;"></div>
<div id="menu2" class="span">
ENDEREÇO: C 1 LOTE 1/12 <br />
ED. TAGUATINGA TRADE CENTER SALA 118/120<br />
Telefone: +55 (61) 3965.1929 <br />
Fax: (61) 3965.1959
</div>

<!--COPYRIGHT-->
<div id="direitosautorais">

  <a href="http://www.novamidiabrasilia.com" target="_blank">Desenvolvido por Nova Mídia Brasília.</a></div>


</div>

</div>
<!--FIM DO RODAPE-->




<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
//-->
</script>

</body>
</html>
