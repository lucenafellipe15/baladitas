<?php //header("Content-Type: text/html; charset=ISO-8859-1",true); ?>
<?php 
error_reporting(0);
include('injection.php');
include "conexao/conexao.php";
include("fckeditor/fckeditor.php");

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
<title>PORTIFÓLIOUM</title>

<!--METAS-->
<meta name="robots" content="index, follow" />
<meta name="author" content="Nova Midia Brasilia - http://www.novamidiabrasilia.com" />
<meta name="publisher" content="Nova Midia Brasilia - http://www.novamidiabrasilia.com" />
<link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
<meta name="description" content="PORTIFÓLIOUM" />
<meta name="keywords" content="cursos, apostilas, emprego, empresario, empresa, aulas, eventos, rh, rh cursos, taguatinga, trade center, sala 118/120, curso " />
<meta name="rating" content="General" />
<meta name="expires" content="0" />
<meta name="language" content="portuguese, PT-BR" />
<meta name="copyright" content="PORTIFÓLIOUM" />
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
<script type="text/javascript">

$(document).ready(function(){
	
	$("select[name=estado]").change(function(){		
		$("select[name=cidade]").html('<option value="0">Aguarde Carregando...</option>');
			
			$.post("cidade.php",{estado:$(this).val()},function(valor){
				$("select[name=cidade]").html(valor);
		
			})
	})

})
</script>
</head>

<body>

<!--TOPO-->
<div id="topo">
<!--LOGO-->
<div id="box_logo">
<a href="index.php"><h4 style="font-weight:bold; font-size:24px;">PORTIFÓLIOUM</h4></a>
</div>
<!--MENU TOPO--><br /><br /><br /><br />
                <div id="lado_direito_topo" class="lado_direito_topo">
                	<div id="redes_sociais_div" class="redes_sociais_div">
                        <div class="redes_sociais">
                        <?php $redes = mysql_query("select * from tb_redes");
						$dados_redes = mysql_fetch_array($redes);
						?>
                        <a href="https://www.facebook.com/profile.php?id=100004229439948"><img src="images/facebook.png" width="41" height="41" border="none"/></a>
                        <a href="https://twitter.com/login?lang=pt"><img src="images/twiter.png" width="41" height="41" border="none"/></a>
                        <a href="https://mail.google.com/mail/u/0/"><img src="images/rss.png" width="41" height="41" border="none"/></a>
                        <a href="https://www.youtube.com/channel/UCUN9lhwfMJRxMVuet7Shg0w"><img src="images/youtube.png" width="41" height="41" border="none"/></a>
                        </div>
                    </div>
                    <div id="cadastro" class="cadastro">
                        <div class="link_cadastro">
                        <a href="index.php?pagina=form_login"><img src="images/login.png" width="67" height="33" border="none"/></a>
                        <a href="index.php?pagina=form_cadastro_user&acao=cadastrar"><img src="images/cadastrar.png" width="99" height="31" border="none"/></a>
                        <a href="index.php?pagina=form_cadastro_user7&acao=cadastrar"><img src="images/cadastrar.png" width="99" height="31" border="none"/></a>
                        </div>
                    </div>
<!--BANNER-->

</div>
<!--FIM DO TOPO-->

<!--CONTEUDO-->
<?php  $id_cliente = $_SESSION[cliente][ID];?>
<div id="conteudo">
<div style="padding-top:-10px;">
                    <?php if(isset($_SESSION[cliente][NOME])){?></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ol&aacute; <span class="imagem_centro_festa"><a href="index.php?pagina=clientes_detalhes&id_cliente=<?php echo $dados_cliente['id_cliente']?> class="highslide red" onClick="return hs.expand(this)""><img src="cliente/t/<?=$dados_cliente['imagem']?>" width="90" height="70" name="festa" id="festa" border="none" title="<?php echo $dados_cliente['login']?>"/></a><a href="cliente/<?php echo $dados_cliente['imagem'];?>" class="highslide red" onClick="return hs.expand(this)" title="<?php echo $dados_cliente['cliente']?>"><small>Clique para ampliar</small></a></span><?php echo $_SESSION[cliente][NOME];?>&nbsp;&nbsp;<a href="index.php?pagina=logout&kill=sair" title="Sair" class="black"><img src="images/icon-deletar.png" border="0"  height="20" width="20" /></a><a href="index.php?pagina=form_cadastro_user&acao=editar&id_cliente=<?php echo $_SESSION[cliente][ID]?>" title="Editar Conta" class="black"><img src="images/icon-deletar.png" border="0"  height="20" width="20" /></a><?php }?>
                    </div>
<?php           
$arquivo = fopen("contador.txt", "r+");
$nVisitas = fgets($arquivo, 7);
rewind($arquivo);
$nVisitas++;
if (flock($arquivo, 2)) fputs($arquivo, $nVisitas);
fclose($arquivo);

/*****************************************
Inicio da criação do gráfico. Para compreender cada 
método utilizado aqui, verifique a referência de cada
um
em http://www.php.net/manual/ref.image.php 
******************************************/

$tLargura = 80;
$tAltura = 15;
$imagem = ImageCreate($tLargura, $tAltura); 
$cFundo = ImageColorAllocate($imagem, 255,0,0);
$cTexto = ImageColorAllocate($imagem, 255,255,255);
$cSombra = ImageColorAllocate($imagem, 0,0,0);
ImageRectangle ($imagem, 0, 0, $tLargura, 
$tAltura, $cSombra);
//ImageRectangle ($imagem, 2, 2, $tLargura – 2, 
//$tAltura – 2, $cFundo);
ImageString($imagem, 3, 4, 3, $nVisitas, $cSombra);
ImageString($imagem, 3, 5, 2, $nVisitas, $cTexto);
ImageGif($imagem, "Contador.gif");
ImageDestroy($imagem);
echo "Visitantes:
"; 
?>

                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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


<?php //require("busca.php");?>


<?php //require("box_direita.php");?>
<?php require("lateral_esquerda.php"); ?>



<!--RODAPE-->
<div id="rodape">
<div style="width:1000px; height:22px; background-color:#f4ede3; margin:0 auto;"></div>
<div id="rodape_centro">

<!--MENU2-->

<div class="span">
<a href="portifolioum.com">portifolioum.com</a><br />
TELEFONE: +55 (61) 99947.6005 <br />
</div>
<div style="padding:10px;">
				<li><a href="http://baladitas1.hospedagemdesites.ws/baladitasloja/index.php" class="blue" title="Baladitas">Baladitas</a></li>
                <li><a href="http://www.portifolioum.com.br/coletivo/index.php" class="blue" title="Coletivo">Coletivo</a></li>
                <li><a href="index.php?pagina=galerias_lista" class="blue" title="Galerias">Galerias</a></li>
             
                <li><a href="http://portifolioum.com.br/joomla2/Joomla_3.9.26-Stable-Full_Package/" class="blue" title="Joomla">Joomla</a></li>			<li><a href="http://baladitas1.hospedagemdesites.ws/joomla/Joomla_3.9.26-Stable-Full_Package/" class="blue" title="Joomla Baladitas">Joomla Baladitas</a></li>
                <li><a href="http://baladitas1.hospedagemdesites.ws/wordpress/wp-admin/setup-config.php" class="blue" title="WordPress Baladitas">WordPress Baladitas</a></li>
                <li><a href="http://www.portifolioum.com.br/wordpress/wp-admin/setup-config.php" class="blue" title="WordPress Portifolioum">WordPress Portifolioum</a></li>
                <li><a href="http://www.portifolium.com.br/" class="blue" title="WordPress Portifolioum">Portifolium</a></li>
                <li><a href="http://www.portifolioum.com.br/phpBB3/" class="blue" title="phpBB3">Portifolium phpBB3</a></li>
                <li><a href="http://baladitas1.hospedagemdesites.ws/phpBB3/" class="blue" title="phpBB3">Baladitas phpBB3</a></li>
                <li><a href="http://www.portifolioum.com.br/coletivo/temperandoavida" class="blue" title="Temperando A Vida">Baladitas Temperando A Vida</a></li>
                <li><a href="http://www.portifolioum.com.br/coletivo/mabuya.html" class="blue" title="Mabuya">Mabuya</a></li>
                <li><a href="http://www.portifolioum.com.br/lojavirtualphp7/bootstrap-5.0.0-examples/" class="blue" title="Php 7 Loja VIrtual">Php 7 Loja VIrtual</a></li>
                 <li><a href="http://www.portifolioum.com.br/lojavirtualphp7/bootstrap-5.0.0-examples/blog/index.html" class="blue" title="Blog">Blog</a></li>
                 <li><a href="http://www.portifolioum.com.br/lojavirtualphp7/bootstrap-5.0.0-examples/carousel/index.html" class="blue" title="Carrocel">Carrocel</a></li>
                 <li><a href="http://www.portifolioum.com.br/lojavirtualphp7/bootstrap-5.0.0-examples/checkout/index.html" class="blue" title="Formulário">Formulário</a></li>
                 <li><a href="http://www.portifolioum.com.br/lojavirtualphp7/bootstrap-5.0.0-examples/features/index.html" class="blue" title="Features">Features</a></li>
                 <li><a href="http://www.portifolioum.com.br/lojavirtualphp7/bootstrap-5.0.0-examples/grid/index.html" class="blue" title="Grid">Grid</a></li>
                 <li><a href="http://www.portifolioum.com.br/lojavirtualphp7/bootstrap-5.0.0-examples/product/index.html" class="blue" title="Produtos">Produtos</a></li>
                <li><a href="index.php?pagina=clientes_lista" class="blue" title="Etapas">Clientes</a></li>
                <li><a href="index.php?pagina=etapas_lista" class="blue" title="Etapas">Etapas</a></li>
                <li><a href="index.php?pagina=titulos_lista" class="blue" class="Títulos" title="Link">Títulos</a></li>
                <li><a href="index.php?pagina=gols_lista" class="blue" title="Gols">Gols</a></li>
                <li><a href="index.php?pagina=artisticos_lista" class="blue" title="Artístico">Artístico</a></li>
                <li><a href="index.php?pagina=shows_lista" class="blue" title="Show">Show</a></li>
                <li><a href="index.php?pagina=discografias_lista" class="blue" title="Discografia">Discografia</a></li>
                <li><a href="index.php?pagina=musicas_lista" class="blue" title="Música">Música</a></li>
                <li><a href="galerias.php?pagina=galerias_lista" class="blue" title="Galerias">Galerias</a></li>
                <li><a href="index.php?pagina=receitas_lista" class="blue" title="Receitas">Receitas</a></li>
                <li><a href="index.php?pagina=medicos_lista" class="blue" title="Médicos">Médicos</a></li>
                <li><a href="index.php?pagina=policias_lista" class="blue" title="Policias">Policias</a></li>
                <li><a href="index.php?pagina=passagens_lista" class="blue" title="Música">Passagens</a></li>
                <li><a href="index.php?pagina=c_util" class="blue" title="Util">Util</a></li>
                <li><a href="index.php?pagina=graficas_lista" class="blue" title="Gráfica">Grafica</a></li>
                <li><a href="index.php?pagina=clientes_lista" class="blue" title="Clientes">Clientes</a></li>
                <li><a href="index.php?pagina=users_lista" class="blue" title="Users">Users</a></li>
                <li><a href="index.php?pagina=configuracoes_lista" class="blue" title="Configuracoes">Configuracoes</a></li>
                <li><a href="index.php?pagina=apps_lista" class="blue" title="Apps">Apps</a></li>
                <li><a href="index.php?pagina=ajuda" class="blue" title="Ajuda">Ajuda</a></li>
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

  <a href="http://www.portifolioum.com.br" target="_blank">Desenvolvido por Portifólioum.</a></div>


</div>

</div>
<!--FIM DO RODAPE-->




<script type="text/javascript">

</script>
</body>
</html>
