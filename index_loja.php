<?php 
error_reporting(0);
include('../injection.php');
include "../conexao/conexao.php";
include("../fckeditor/fckeditor.php");
error_reporting(0);
session_start();
$pagina = sqlinj($_REQUEST['pagina']); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.::Baladitas::.</title>
<!--METAS-->
<meta name="author" content="Baladitas - http://www.baladitas.com" />
<meta name="publisher" content="Baladitas - http://www.baladitas.com" />
<link rel="icon" href="icon.ico" type="image/x-icon"/>
<meta name="description" content="Baladitas Loja" />
<meta name="keywords" content="" /> 
<meta name="rating" content="General" />
<meta name="expires" content="0" />

<meta name="language" content="portuguese, PT-BR" />
<meta name="copyright" content="Baladitas" />
<!--FIM METAS-->

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.js"></script>

<link href="css/pirobox/pirobox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/pirobox_extended.js"></script>
<!-- contado de visitas -->
<?php
$seleciona_visitas = mysql_query("SELECT visitas FROM contador") or die(mysql_error());
while($res_visitas=mysql_fetch_array($seleciona_visitas)){
 
	 $visitas = $res_visitas[0];
	 $visitas_mais = $visitas +1;
	 
	 session_start();
	 $sessao = session_id();
	 $tempo_on = time();
	 $tempo_fim = time() - 300;
	 $ip = $_SERVER['REMOTE_ADDR'];
	$ip = sprintf('%u',ip2long($_SERVER['REMOTE_ADDR']));
	 
	 $termina_sessao = mysql_query("DELETE FROM usuarios_online WHERE tempo < '$tempo_fim'")
	 or die(mysql_error());
	 
	 $pega_sessao = mysql_query("SELECT sessao, tempo, ip FROM usuarios_online WHERE sessao = '$sessao'")
	 or die(mysql_error());
	 $contar_sessao = mysql_num_rows($pega_sessao);
	 
	 if($contar_sessao <= '0'){
		$nova_sessao = mysql_query("INSERT INTO usuarios_online (sessao, tempo, ip) VALUES ('$sessao','$tempo_on','$ip')")or die(mysql_error());
		$contar = mysql_query("UPDATE contador SET visitas = '$visitas_mais'")or die(mysql_error());
	 }else{ 
		$atualiza_sessao = mysql_query("UPDATE usuarios_online SET tempo = $tempo_on WHERE sessao = '$sesao'")or die(mysql_error());
	 }
 
}
?>

</head>
<body>
<!--GERAL-->
<div id="geral">
    <!--TOPO-->
    <div id="bg_topo" class="bg_topo">
        <div id="topo_conteudo" class="topo_conteudo">
            <div class="logo"><a href="index.html"><img src="images/logo.png" width="144" height="120" border="none" /></a>
            
            <div>
            <iframe width="200" height="150" frameborder="0" scrolling="no"  src="data/testedata2.php" allowtransparency="true"></iframe>
            </div>
            </div>
            
            
            <div id="lado_direito" class="lado_direito">
            <!--MENU TOPO-->
                <div id="lado_direito_topo" class="lado_direito_topo">
                	<div id="redes_sociais_div" class="redes_sociais_div">
                        <div class="redes_sociais">
                        <?php $redes = mysql_query("select * from tb_redes limit 1");
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
                        <a href="index.php?pagina=form_cadastro_user1&acao=cadastrar"><img src="images/cadastrar.png" width="99" height="31" border="none"/></a>
                        </div>
                    </div>
                    <?php if(isset($_SESSION[cliente][NOME])){?></br></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ol&aacute; <span class="imagem_centro_festa"><a href="index.php?pagina=artisticos_detalhes&id_artistico=<?php echo $dados_cliente['id_cliente']?> class="highslide red" onClick="return hs.expand(this)""><img src="cliente/t/<?=$dados_cliente['imagem']?>" width="90" height="70" name="festa" id="festa" border="none" title="<?php echo $dados_cliente['login']?>"/></a><a href="cliente/<?php echo $dados_cliente['imagem'];?>" class="highslide red" onClick="return hs.expand(this)" title="<?php echo $dados_cliente['cliente']?>"><small>Clique para ampliar</small></a></span><?php echo $_SESSION[cliente][NOME];?>&nbsp;&nbsp;<a href="index.php?pagina=logout&kill=sair" title="Sair" class="black"><img src="images/icon-deletar.png" border="0"  height="20" width="20" /></a><?php }?>
                    <div id="menu_topo" class="menu_topo">
                      <!--<div id="dock" class="dock">
                            <div class="dock-container">
                                <a class="dock-item" href="index.html"><span>Example&nbsp;1</span><img src="jsmenu/images/dock/home.png" alt="home" /></a> 
                                <a class="dock-item" href="example2.html"><span>Example&nbsp;2</span><img src="jsmenu/images/dock/email.png" alt="contact" /></a> 
                                <a class="dock-item" href="example3.html"><span>Example&nbsp;3</span><img src="jsmenu/images/dock/portfolio.png" alt="portfolio" /></a> 
                                <a class="dock-item" href="all-examples.html"><span>All&nbsp;Examples</span><img src="jsmenu/images/dock/music.png" alt="music" /></a> 
                                <a class="dock-item" href="#"><span>Video</span><img src="jsmenu/images/dock/video.png" alt="video" /></a> 
                                <a class="dock-item" href="#"><span>History</span><img src="jsmenu/images/dock/history.png" alt="history" /></a> 
                                <a class="dock-item" href="#"><span>Calendar</span><img src="jsmenu/images/dock/calendar.png" alt="calendar" /></a> 
                                
                            </div>
                        </div>-->
                    </div>
                    <div class="cleaner"></div>
                    <!--<div class="lado_direito_banner">
                    <iframe style="margin-left:-18px; margin-top:-53px;" width="785" height="390" frameborder="0" scrolling="no" src="piecemaker/index.html" allowtransparency="true" ></iframe>
                    
      
                    </div>-->
                    
                    
                </div>
            <!--FIM MENU TOPO-->
            <!--LIMPAR-->
            <div class="cleaner"></div>
            <!-- FIM LIMPAR-->
            
            
            
            
            </div>
            
        </div>
        <!-- MENU HORIZONTAL-->
        <div style="background-color:; width:100%; height:60px; margin-top:-60px; padding-top:10px;">
       <link rel="stylesheet" type="text/css" media="screen" href="jsmenu/css/layout1.css">
	<link rel="stylesheet" type="text/css" media="screen" href="jsmenu/css/dock-example1.css">
	
<noscript>
		<style type="text/css">
			#dock { top: -32px; }
			a.dock-item { position: relative; float: left; margin-right: 10px; }
			.dock-item span { display: block; }
		</style>
	</noscript>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="jsmenu/js/fisheye-iutil.min.js"></script>
	<script type="text/javascript" src="jsmenu/js/dock-example1.js"></script>
    
        <div id="dock" class="dock">
                            <div class="dock-container">
                                <a class="dock-item" href="index.html"><span>Example&nbsp;1</span><img src="jsmenu/images/dock/home.png" alt="home" /></a> 
                                <a class="dock-item" href="example2.html"><span>Example&nbsp;2</span><img src="jsmenu/images/dock/email.png" alt="contact" /></a> 
                                <a class="dock-item" href="example3.html"><span>Example&nbsp;3</span><img src="jsmenu/images/dock/portfolio.png" alt="portfolio" /></a> 
                                <a class="dock-item" href="all-examples.html"><span>All&nbsp;Examples</span><img src="jsmenu/images/dock/music.png" alt="music" /></a> 
                                <a class="dock-item" href="#"><span>Video</span><img src="jsmenu/images/dock/video.png" alt="video" /></a> 
                                <a class="dock-item" href="#"><span>History</span><img src="jsmenu/images/dock/history.png" alt="history" /></a> 
                                <a class="dock-item" href="#"><span>Calendar</span><img src="jsmenu/images/dock/calendar.png" alt="calendar" /></a>
                                <a class="dock-item" href="index.html"><span>Example&nbsp;1</span><img src="jsmenu/images/dock/home.png" alt="home" /></a> 
                                <a class="dock-item" href="example2.html"><span>Example&nbsp;2</span><img src="jsmenu/images/dock/email.png" alt="contact" /></a> 
                                <a class="dock-item" href="example3.html"><span>Example&nbsp;3</span><img src="jsmenu/images/dock/portfolio.png" alt="portfolio" /></a> 
                                <a class="dock-item" href="all-examples.html"><span>All&nbsp;Examples</span><img src="jsmenu/images/dock/music.png" alt="music" /></a> 
                                <a class="dock-item" href="#"><span>Video</span><img src="jsmenu/images/dock/video.png" alt="video" /></a> 
                                <a class="dock-item" href="#"><span>History</span><img src="jsmenu/images/dock/history.png" alt="history" /></a> 
                                <a class="dock-item" href="#"><span>Calendar</span><img src="jsmenu/images/dock/calendar.png" alt="calendar" /></a>
                                <a class="dock-item" href="#"><span>Video</span><img src="jsmenu/images/dock/video.png" alt="video" /></a> 
                                <a class="dock-item" href="#"><span>History</span><img src="jsmenu/images/dock/history.png" alt="history" /></a> 
                                <a class="dock-item" href="#"><span>Calendar</span><img src="jsmenu/images/dock/calendar.png" alt="calendar" /></a> 
                                 
                                
                            </div>
                        </div>
        </div>
        <!-- MENU HORIZONTAL-->
        
        
       
        
        
    </div>
     <!-- Banner Conteudo Destaques -->
        <div style="background-color:; width:980px; height:300px; margin:0 auto;">
           <div style="background-color:; width:880px; height:300px; margin:0 auto; -webkit-box-shadow: #666 0px 2px 3px;
-moz-box-shadow: #666 0px 2px 3px;
box-shadow: #666 0px 2px 3px; margin-bottom:60px;">
         		<iframe style="margin-left:0px; margin-top:0px;" width="880" height="300px" frameborder="0" scrolling="no" src="lofslidernews/destaques_principal.html" allowtransparency="true" >
                </iframe>
           </div>     
       
        </div>
        
        <br />
        <br />
        <!-- Banner Conteudo Destaques-->
        <div style="width:1000px; height:auto; margin:0 auto; display:table; padding:20px;">
                <li><a href="index.php?pagina=etapas_lista" class="blue" title="Etapas">Etapas</a></li>
                <li><a href="index.php?pagina=titulos_lista" class="blue" class="Títulos" title="Link">Títulos</a></li>
                <li><a href="index.php?pagina=gols_lista" class="blue" title="Gols">Gols</a></li>
                <li><a href="index.php?pagina=artisticos_lista" class="blue" title="Artístico">Artístico</a></li>
                <li><a href="index.php?pagina=times_lista" class="blue" title="Time">Time</a></li>
                <li><a href="index.php?pagina=atletas_lista" class="blue" title="Atleta">Atleta</a></li>
                <li><a href="index.php?pagina=esportes_lista" class="blue" title="Esporte">Esporte</a></li>
                <li><a href="index.php?pagina=musas_lista" class="blue" title="Musa">Musa</a></li>
                <li><a href="index.php?pagina=casas_lista" class="blue" title="Casa">Casa</a></li>
                <li><a href="index.php?pagina=sites_lista" class="blue" title="Site">Site</a></li>
                <li><a href="index.php?pagina=cinemas_lista" class="blue" title="Cinema">Cinema</a></li>
                <li><a href="index.php?pagina=estadios_lista" class="blue" title="Estadio">Estadio</a></li>
                <li><a href="index.php?pagina=shows_lista" class="blue" title="Show">Show</a></li>
                <li><a href="index.php?pagina=discografias_lista" class="blue" title="Discografia">Discografia</a></li>
                <li><a href="index.php?pagina=musicas_lista" class="blue" title="Música">Música</a></li>
                <li><a href="galerias.php?pagina=galerias_lista" class="blue" title="Galerias">Galerias</a></li>
                <li><a href="index.php?pagina=receitas_lista" class="blue" title="Receitas">Receitas</a></li>
                <li><a href="index.php?pagina=medicos_lista" class="blue" title="Médicos">Médicos</a></li>
                <li><a href="index.php?pagina=policias_lista" class="blue" title="Policias">Policias</a></li>
                <li><a href="index.php?pagina=cliente_lista" class="blue" title="Clientes">Clientes</a></li>
                <li><a href="index.php?pagina=passagens_lista" class="blue" title="Música">Passagens</a></li>
                <li><a href="index.php?pagina=graficas_lista" class="blue" title="Gráfica">Grafica</a></li>
                <li><a href="index.php?pagina=cadastro_artistico" class="blue" title="Cadastro Artisticos">Cadastro Artisticos</a></li>
                <li><a href="index.php?pagina=users_lista" class="blue" title="Users">Users</a></li>
                <li><a href="index.php?pagina=configuracoes_lista" class="blue" title="Configuracoes">Configuracoes</a></li>
                <li><a href="index.php?pagina=apps_lista" class="blue" title="Apps">Apps</a></li>
                <li><a href="index.php?pagina=galerias_lista" class="blue" title="Galerias">Galerias</a></li>
                <li><a href="index.php?pagina=galerias_lista_produtos" class="blue" title="Galerias Produtos">Galerias Produtos</a></li>
                <li><a href="index.php?pagina=galerias_lista_extras" class="blue" title="Galerias Extras">Galerias Extras</a></li>
                <li><a href="index.php?pagina=ajuda" class="blue" title="Ajuda">Ajuda</a></li>
                <li><a href="https://web.whatsapp.com/" class="blue" title="Como Posso Te Ajudar">Como Posso Te Ajudar</a></li>
                <?php echo '<li><a href="index.php?pagina=galerias_lista_festa&id_festa='.$dados_festa_todos['id_festa'].'" class="blue" title="Galerias Lista Festas">Galerias Lista Festas</a></li>'; ?>
                <?php
				$sql_produto_todos =  mysql_query("select * from tb_produto order by produto asc ORDER BY rand() LIMIT 100"); 
				while($dados_produto_todos = mysql_fetch_array($sql_produto_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_produtos&id_produto='.$dados_produto_todos['id_produto'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Produtos</a></li>
				';} ?>
                <?php
				$sql_time_todos =  mysql_query("select * from tb_time order by time asc ORDER BY rand() LIMIT 100"); 
				while($dados_time_todos = mysql_fetch_array($sql_time_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_times&id_time='.$dados_time_todos['id_time'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Times</a></li>
				';} ?>
                <?php
				$sql_esporte_todos =  mysql_query("select * from tb_esporte order by esporte asc ORDER BY rand() LIMIT 100"); 
				while($dados_esporte_todos = mysql_fetch_array($sql_esporte_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_esportes&id_esporte='.$dados_esporte_todos['id_esporte'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Esportes</a></li>
				';} ?>
                <?php
				$sql_extra_todos =  mysql_query("select * from tb_extrasorder by extrasasc ORDER BY rand() LIMIT 100"); 
				while($dados_extra_todos = mysql_fetch_array($sql_extra_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_extras&id_extra='.$dados_extra_todos['id_extra'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Extras</a></li>
				';} ?>
                </div>
                <br />
                <br />
                
        <!-- Conteudo Principal-->
    <div class="conteudo_principal" id="conteudo_principal" >
     <!-- Lateral Direita-->
     
        <?php require('lateral_direita_festas.php'); ?>
        <!-- LATERAL direita-->
        <?php $pagina = $_REQUEST['pagina']; 
		if($pagina == "comercial_lista" or $pagina == "comercial_detalhes"){
		
   		include('lateral_direita_comercial.php'); 
		}elseif($pagina == "noticias_lista" or $pagina == "noticias_detalhes"){
			 include('lateral_direita_noticias.php');
		}elseif($pagina == "filmes_lista" or $pagina == "filmes_detalhes"){
			 include('lateral_direita_filmes.php');
		}elseif($pagina == "esportes_lista" or $pagina == "esportes_detalhes"){
			 include('lateral_direita_esportes.php');
		}elseif($pagina == "duelos_lista" or $pagina == "duelos_detalhes"){
			 include('lateral_direita_duelos.php');
		}elseif($pagina == "enfrentamentos_lista" or $pagina == "enfrentamentos_detalhes"){
			 include('lateral_direita_enfrentamentos.php');
		}elseif($pagina == "times_lista" or $pagina == "times_detalhes"){
			 include('lateral_direita_times.php');
		}elseif($pagina == "atletas_lista" or $pagina == "atletas_detalhes"){
			 include('lateral_direita_atletas.php');
		}elseif($pagina == "musas_lista" or $pagina == "musas_detalhes"){
			 include('lateral_direita_musas.php');
		}elseif($pagina == "estadios_lista" or $pagina == "estadios_detalhes"){
			 include('lateral_direita_estadios.php');
		}elseif($pagina == "gols_lista" or $pagina == "gols_detalhes"){
			 include('lateral_direita_gols.php');
		}elseif($pagina == "titulos_lista" or $pagina == "titulos_detalhes"){
			 include('lateral_direita_titulos.php');
		}elseif($pagina == "artisticos_lista" or $pagina == "artisticos_detalhes"){
			 include('lateral_direita_artisticos.php');
		}elseif($pagina == "canhotos_lista" or $pagina == "canhotos_detalhes"){
			 include('lateral_direita_canhotos.php');
		}elseif($pagina == "medicos_lista" or $pagina == "medicos_detalhes"){
			 include('lateral_direita_medicos.php');
		}elseif($pagina == "users_lista" or $pagina == "users_detalhes"){
			 include('lateral_direita_users.php');
		}elseif($pagina == "apps_lista" or $pagina == "apps_detalhes"){
			 include('lateral_direita_apps.php');
		}elseif($pagina == "configuracoes_lista" or $pagina == "configuracoes_detalhes"){
			 include('lateral_direita_configuracoes.php');
		}elseif($pagina == "advogados_lista" or $pagina == "advogados_detalhes"){
			 include('lateral_direita_advogados.php');
		}elseif($pagina == "policias_lista" or $pagina == "policias_detalhes"){
			 include('lateral_direita_policias.php');
		}
	elseif($pagina == "cadastro_artistico"){
			 include('form_login.php');
		}else{
         	 // require('lateral_direita.php'); 
			 } ?>
        <!-- FIM LATERAL direita-->
        <?php 
        $id = sqlinj($_REQUEST[id]);
        switch($id){
        case '3': require("valida_login.php");break;
        case '4': 	 echo '<script>window.location="index.php?pagina=form_cadastro_user1"</script>';break;
        //formcadastro
		}
        ?>
        <!-- MEIO -->
		<?php 
		
        if (!isset($_REQUEST['pagina'])){
            include('home.php');
        }else{
        	include($_REQUEST['pagina'].".php");
        }
        ?>
        <!-- FIM MEIO -->
        <!-- Meio -->
        <?php //require('meio.php'); ?>
        <!--  topo lateral_esquerda -->
        <?php require('lateral_esquerda.php'); ?>
     <!-- Conteudo Principal-->
    
    <div id="bg_rodape" class="bg_rodape">
    	<div class="bg_conteudo_rodape1"></div>
        <div class="bg_conteudo_rodape1"></div>
        <div class="bg_conteudo_rodape1"></div>
        <!--LIMPAR desnecessario-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
    </div>
    <div id="bg_rodape_ultimo" class="bg_rodape_ultimo">
    <a href="#">Publicidade</a>
                        
                        <a href="#">Empresa</a>
                        <a href="#">Termos de uso</a>
                        <a href="#">Quem somos</a>
                        <a href="#">Empresa</a>
                        <a href="#">Termos de uso</a>
                        
    </div>
</div>
<div style="width:1000px; height:1000px;
                        margin:0 auto; display:table;">
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
                <li><a href="index.php?pagina=graficas_lista" class="blue" title="Gráfica">Grafica</a></li>
                <li><a href="index.php?pagina=users_lista" class="blue" title="Users">Users</a></li>
                <li><a href="index.php?pagina=configuracoes_lista" class="blue" title="Configuracoes">Configuracoes</a></li>
                <li><a href="index.php?pagina=apps_lista" class="blue" title="Apps">Apps</a></li>
                <li><a href="index.php?pagina=ajuda" class="blue" title="Ajuda">Ajuda</a></li>
                <li><a href="https://web.whatsapp.com/" class="blue" title="Como Posso Te Ajudar">Como Posso Te Ajudar</a></li>
                <?php echo '<li><a href="index.php?pagina=galerias_lista_festa&id_festa='.$dados_festa_todos['id_festa'].'" class="blue" title="Galerias Lista Festas">Galerias Lista Festas</a></li>'; ?>
                <?php
				$sql_produto_todos =  mysql_query("select * from tb_produto order by produto asc ORDER BY rand() LIMIT 100"); 
				while($dados_produto_todos = mysql_fetch_array($sql_produto_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_produtos&id_produto='.$dados_produto_todos['id_produto'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Produtos</a></li>
				';} ?>
                <?php
				$sql_time_todos =  mysql_query("select * from tb_time order by time asc ORDER BY rand() LIMIT 100"); 
				while($dados_time_todos = mysql_fetch_array($sql_time_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_times&id_time='.$dados_time_todos['id_time'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Times</a></li>
				';} ?>
                <?php
				$sql_esporte_todos =  mysql_query("select * from tb_esporte order by esporte asc ORDER BY rand() LIMIT 100"); 
				while($dados_esporte_todos = mysql_fetch_array($sql_esporte_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_esportes&id_esporte='.$dados_esporte_todos['id_esporte'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Esportes</a></li>
				';} ?>
                <?php
				$sql_extra_todos =  mysql_query("select * from tb_extrasorder by extrasasc ORDER BY rand() LIMIT 100"); 
				while($dados_extra_todos = mysql_fetch_array($sql_extra_todos)){
				echo '<li><a href="index.php?pagina=galerias_lista_extras&id_extra='.$dados_extra_todos['id_extra'].'" class="blue" title="Galerias Lista Produtos">Galerias Lista Extras</a></li>
				';} ?>
                </div>
</body>
</html>