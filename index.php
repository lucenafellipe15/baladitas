<?php //header("Content-Type: text/html; charset=ISO-8859-1",true); ?>
<?php 
include('injection.php');
include "conexao/conexao.php";
include("fckeditor/fckeditor.php");
error_reporting(0);
session_start();
$pagina = sqlinj($_REQUEST['pagina']); 
?> 
<?php 
$filtro = $_POST['pesquisa'];

//Paginação
$p = $_GET["p"];
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 5;

$inicio = ($p*$qnt) - $qnt;
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
<meta name="description" content="RH CURSOS - ENDEREÇO: C 1 LOTE 1/12 ED. TAGUATINGA TRADE CENTER SALA 118/120 TELEFONE: +55 (61) 3965.1929 FAX: (61) 3965.1959" />
<meta name="keywords" content="cursos, apostilas, emprego, empresario, empresa, aulas, eventos, rh, rh cursos, taguatinga, trade center, sala 118/120, curso " />
<meta name="rating" content="General" />
<meta name="expires" content="0" />
<meta name="language" content="portuguese, PT-BR" />
<meta name="copyright" content="RH CURSOS" />
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
</head>

<body>

<!--TOPO-->
<div id="topo">
<!--LOGO-->
<div id="box_logo">
<a href="index.php"><img src="images/logo.jpg" alt="logo marca" width="299" height="169" border="0" /></a>
<img src="images/texto_pri.png" alt="O senhor abrirá o céu, o depósito do seu tesouro, para enviar chuva à sua terra no devido tempo e para abençoar todo o trabalho das suas mãos." width="299" height="71" /></div>
<!--MENU TOPO-->
                <div id="lado_direito_topo" class="lado_direito_topo">
                	<div id="redes_sociais_div" class="redes_sociais_div">
                        <div class="redes_sociais">
                        <?php $redes = mysql_query("select * from tb_redes");
						$dados_redes = mysql_fetch_array($redes);
						?>
                        <a href="<?php echo $dados_redes['facebook']; ?>"><img src="images/facebook.png" width="41" height="41" border="none"/></a>
                        <a href="<?php echo $dados_redes['twitter']; ?>"><img src="images/twiter.png" width="41" height="41" border="none"/></a>
                        <a href="<?php echo $dados_redes['gplus']; ?>"><img src="images/rss.png" width="41" height="41" border="none"/></a>
                        <a href="<?php echo $dados_redes['youtube']; ?>"><img src="images/youtube.png" width="41" height="41" border="none"/></a>
                        </div>
                    </div>
                    <div id="cadastro" class="cadastro">
                        <div class="link_cadastro">
                        <a href="index.php?pagina=form_login"><img src="images/login.png" width="67" height="33" border="none"/></a>
                        <a href="index.php?pagina=form_cadastro_user2&acao=cadastrar"><img src="images/cadastrar.png" width="99" height="31" border="none"/></a>
                        </div>
                    </div>
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
<?php require("menu.php");?>
<div style="width:680px; float:left;">
<!--MEIO-->
		<?php 
        $id = sqlinj($_REQUEST[id]);
        switch($id){
        case '3': require("valida_login.php");break;
        case '4': 	 echo '<script>window.location="index.php?pagina=form_cadastro_user"</script>';break;
        //formcadastro
		}
        ?>
		<?php 
		
        if (!isset($_REQUEST['pagina'])){
            include('home.php');
        }else{
        	include($_REQUEST['pagina'].".php");
        }
        ?>
        </div>
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

</div>
<?php require("lateral_esquerda.php"); ?>



<!--RODAPE-->
<div id="rodape">
<div style="width:1000px; height:22px; background-color:#f4ede3; margin:0 auto;"></div>
<div id="rodape_centro">

<!--MENU2-->
<div style="border-top:1px dashed #FFF; margin-top:20px;"></div>
<div id="menu2" class="span">
ENDEREÇO: C 1 LOTE 1/12 <br />
ED. TAGUATINGA TRADE CENTER SALA 118/120<br />
TELEFONE: +55 (61) 3965.1929 <br />
FAX: (61) 3965.1959
</div>
<div style="padding:10px;">
                <li><a href="index_loja.php?pagina=etapas_lista" class="blue" title="Etapas">Etapas</a></li>
                <li><a href="index_loja.php?pagina=titulos_lista" class="blue" class="Títulos" title="Link">Títulos</a></li>
                <li><a href="index_loja.php?pagina=gols_lista" class="blue" title="Gols">Gols</a></li>
                <li><a href="index_loja.php?pagina=artisticos_lista" class="blue" title="Artístico">Artístico</a></li>
                <li><a href="index_loja.php?pagina=shows_lista" class="blue" title="Show">Show</a></li>
                <li><a href="index_loja.php?pagina=discografias_lista" class="blue" title="Discografia">Discografia</a></li>
                <li><a href="index_loja.php?pagina=musicas_lista" class="blue" title="Música">Música</a></li>
                <li><a href="galerias.php?pagina=galerias_lista" class="blue" title="Galerias">Galerias</a></li>
                <li><a href="index_loja.php?pagina=receitas_lista" class="blue" title="Receitas">Receitas</a></li>
                <li><a href="index_loja.php?pagina=medicos_lista" class="blue" title="Médicos">Médicos</a></li>
                <li><a href="index_loja.php?pagina=policias_lista" class="blue" title="Policias">Policias</a></li>
                <li><a href="index_loja.php?pagina=passagens_lista" class="blue" title="Música">Passagens</a></li>
                <li><a href="index_loja.php?pagina=graficas_lista" class="blue" title="Gráfica">Grafica</a></li>
                <li><a href="index_loja.php?pagina=users_lista" class="blue" title="Users">Users</a></li>
                <li><a href="index_loja.php?pagina=configuracoes_lista" class="blue" title="Configuracoes">Configuracoes</a></li>
                <li><a href="index_loja.php?pagina=apps_lista" class="blue" title="Apps">Apps</a></li>
                <li><a href="index_loja.php?pagina=ajuda" class="blue" title="Ajuda">Ajuda</a></li>
                <li><a href="https://web.whatsapp.com/" class="blue" title="Como Posso Te Ajudar">Como Posso Te Ajudar</a></li>
                <?php echo '<li><a href="index_loja.php?pagina=galerias_lista_festa&id_festa='.$dados_festa_todos['id_festa'].'" class="blue" title="Galerias Lista Festas">Galerias Lista Festas</a></li>'; ?>
                <?php
				$sql_produto_todos =  mysql_query("select * from tb_produto order by produto asc ORDER BY rand() LIMIT 100"); 
				while($dados_produto_todos = mysql_fetch_array($sql_produto_todos)){
				echo '<li><a href="index_loja.php?pagina=galerias_lista_produtos&id_produto='.$dados_produto_todos['id_produto'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Produtos</a></li>
				';} ?>
                <?php
				$sql_time_todos =  mysql_query("select * from tb_time order by time asc ORDER BY rand() LIMIT 100"); 
				while($dados_time_todos = mysql_fetch_array($sql_time_todos)){
				echo '<li><a href="index_loja.php?pagina=galerias_lista_times&id_time='.$dados_time_todos['id_time'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Times</a></li>
				';} ?>
                <?php
				$sql_esporte_todos =  mysql_query("select * from tb_esporte order by esporte asc ORDER BY rand() LIMIT 100"); 
				while($dados_esporte_todos = mysql_fetch_array($sql_esporte_todos)){
				echo '<li><a href="index_loja.php?pagina=galerias_lista_esportes&id_esporte='.$dados_esporte_todos['id_esporte'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Esportes</a></li>
				';} ?>
                <?php
				$sql_extra_todos =  mysql_query("select * from tb_extras order by extras asc ORDER BY rand() LIMIT 100"); 
				while($dados_extra_todos = mysql_fetch_array($sql_extra_todos)){
				echo '<li><a href="index_loja.php?pagina=galerias_lista_extras&id_extra='.$dados_extra_todos['id_extra'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Extras</a></li>
				';} ?>
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
