<div id="lateral_esquerda" class="lateral_esquerda">
        	<div class="topo_lateral_esquerda"> 
            </div>
            <div id="bg_conteudo_lateral_esquerda_localizar" class="bg_conteudo_lateral_esquerda_localizar">
            <!-- Script para o busca -->
<script type="text/javascript">
$(function(){
	
	$('#busca').focus(function(){
		$('#busca').val('');
	});
	
})
</script>

<!-- Fim do script para o busca -->
            
            	<div id="bg_conteudo_lateral_esquerda_localizar_input" class="bg_conteudo_lateral_esquerda_localizar_input">
                 	<form action="index.php?pagina=produtos_lista" method="post" name="busca">
                 		<input class="input_busca_lateral_esquerda" style="" name="busca" id="busca" onclick="MM_setTextOfTextfield('busca','','')" type="text" size="30" maxlength="30" value="Buscar..."/>
                        
                </div>
                <div id="bg_conteudo_lateral_esquerda_localizar_bt_localizar" class="bg_conteudo_lateral_esquerda_localizar_bt_localizar">
                	<input class="input_bt_busca_lateral_esquerda" type="image" src="images/bt_ok.png" />
                    </form>
                </div>
                <!--LIMPAR desnecessario-->
                <div class="cleaner"></div>
                <!-- FIM LIMPAR-->
            </div>
            <div class="topo_lateral_esquerda_newslatter"> 
            </div>
            <div id="bg_conteudo_lateral_esquerda_newslatter" class="bg_conteudo_lateral_esquerda_newslatter">
            <!-- Script para o newslatter -->
<script type="text/javascript">
$(function(){
	
	$('#newslatter').focus(function(){
		$('#newslatter').val('');
	});
	
})
</script>

<!-- Fim do script para o newslatter -->
            
            	<div id="bg_conteudo_lateral_esquerda_newslatter_input" class="bg_conteudo_lateral_esquerda_newslatter_input">
                 	<form action="index.php?pagina=newslatter" method="post" name="newslatter">
                 		<input class="input_newslatter_lateral_esquerda" style="" name="newslatter" id="newslatter" onclick="MM_setTextOfTextfield('newslatter','','')" type="text" size="30" maxlength="30" value="Digite seu email !"/>
                        
                </div>
                <div id="bg_conteudo_lateral_esquerda_newslatter_bt_newslatter" class="bg_conteudo_lateral_esquerda_newslatter_bt_newslatter">
                	<input class="input_bt_newslatter_lateral_esquerda" type="image" src="images/bt_ok.png" />
                    </form>
                </div>
                <!--LIMPAR desnecessario-->
                <div class="cleaner"></div>
                <!-- FIM LIMPAR-->
            </div>
            <div class="topo_lateral_esquerda"> 
            </div>
            <div class="bg_conteudo_lateral_esquerda">
            <div id="lateral_direita_conteudo_deslogar" class="lateral_direita_conteudo_deslogar"><?php if(isset($_SESSION[cliente][NOME])){?>Acesso Permitido <span class="lateral_direita_conteudo_deslogar_nome"><a href="index.php?pagina=form_cadastro_user1&acao=ver&id_cliente=<?=$_SESSION[cliente][ID]?>"  title="ACESSO" class="black" style="color:#000;"><?php echo $_SESSION[cliente][NOME];?></a></span><?php }?></div>
            <div id="lateral_direita_conteudo_topo_menu" class="lateral_direita_conteudo_topo_menu"><a href="" class="black" title="Navegação"><img src="images/navegacao_titulo_direita.png" width="160" height="32" border="0" /></a>
                <div id="lateral_direita_conteudo_corpo_menu" class="lateral_direita_conteudo_corpo_menu">
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_evento" title="CADASTRAR EVENTOS" class="black" style="color:#000;">CADASTRAR EVENTOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_etapa" title="CADASTRAR ETAPAS" class="black" style="color:#000;">CADASTRAR ETAPAS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_gol" title="CADASTRAR TÍTULOS" class="black" style="color:#000;">CADASTRAR TÍTULOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_artistico" title="CADASTRAR ARTISTICOS" class="black" style="color:#000;">CADASTRAR ARTISTICOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_show" title="CADASTRAR SHOWS" class="black" style="color:#000;">CADASTRAR SHOWS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_discografia" title="CADASTRAR DISCOGRAFIAS" class="black" style="color:#000;">CADASTRAR DISCOGRAFIAS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_coberturas" title="CADASTRAR COBERTURAS" class="black" style="color:#000;">CADASTRAR COBERTURAS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_equipes" title="CADASTRAR EQUIPES" class="black" style="color:#000;">CADASTRAR EQUIPES</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_concursos" title="CADASTRAR CONCURSOS" class="black" style="color:#000;">CADASTRAR CONCURSOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_djs" title="CADASTRAR DJS" class="black" style="color:#000;">CADASTRAR DJS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_casas_lista" title="CADASTRAR CASAS DE SHOWS" class="black" style="color:#000;">CADASTRAR CASAS DE SHOWS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_comercial" title="CADASTRAR COMERCIALS" class="black" style="color:#000;">CADASTRAR COMERCIALS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_noticia" title="CADASTRAR NOTÍCIAS" class="black" style="color:#000;">CADASTRAR NOTÍCIAS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_servico" title="CADASTRAR SERVICOSS" class="black" style="color:#000;">CADASTRAR SERVICOSS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_extras" title="CADASTRAR IMAGENS EXTRAS" class="black" style="color:#000;">CADASTRAR IMAGENS EXTRAS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_artisticos" title="CADASTRAR IMAGENS ARTISTICOS" class="black" style="color:#000;">CADASTRAR IMAGENS ARTISTICOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_produtos" title="CADASTRAR PRODUTOS" class="black" style="color:#000;">CADASTRAR PRODUTOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_canhotos" title="CADASTRAR CANHOTOs" class="black" style="color:#000;">CADASTRAR CANHOTO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_portifolios" title="CADASTRAR PORTIFÓlIOS" class="black" style="color:#000;">CADASTRAR PORTIFÓlIO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_graficas" title="CADASTRAR GRAFICAS" class="black" style="color:#000;">CADASTRAR GRÁFICA</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_medicos" title="CADASTRAR MÉDICO" class="black" style="color:#000;">CADASTRAR MÉDICO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_policias" title="CADASTRAR POLICIA" class="black" style="color:#000;">CADASTRAR POLICIA</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_engenheiros" title="CADASTRAR ENGENHEIRO" class="black" style="color:#000;">CADASTRAR ENGENHEIRO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_empregos" title="CADASTRAR EMPREGO" class="black" style="color:#000;">CADASTRAR EMPREGO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_bancos" title="CADASTRAR BANCO" class="black" style="color:#000;">CADASTRAR BANCO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_users" title="CADASTRAR USERS" class="black" style="color:#000;">CADASTRAR USERS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_configuracoes" title="CADASTRAR CONFIGURAÇÕES" class="black" style="color:#000;">CADASTRAR CONFIGURAÇÕES</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_apps" title="CADASTRAR APPS" class="black" style="color:#000;">CADASTRAR APPS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=minhas_baladas_lista&id_cliente=<?=$_SESSION[cliente][ID]?>"  title="MEUS EVENTOS" class="black" style="color:#000;">MEUS EVENTOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=meus_canhotos_lista&id_cliente=<?php echo $id_cliente;?>"  title="MEUS CANHOTOS" class="black" style="color:#000;">MEUS CANHOTOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=meus_medicos_lista&id_cliente=<?=$_SESSION[cliente][ID]?>"  title="MEUS MÉDICOS" class="black" style="color:#000;">MEUS MÉDICOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=meus_policiais_lista&id_cliente=<?php echo $id_cliente;?>"  title="MEUS POLICIAIS" class="black" style="color:#000;">MEUS POLICIAIS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=meus_apps_lista&id_cliente=<?php echo $id_cliente;?>"  title="MEUS APPS" class="black" style="color:#000;">MEUS APPS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=meus_users_lista&id_cliente=<?php echo $id_cliente;?>"  title="MEUS USERS" class="black" style="color:#000;">MEUS USERS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=meus_empregos_lista&id_cliente=<?php echo $id_cliente;?>"  title="MEUS EMPREEGOS" class="black" style="color:#000;">MEUS EMPREEGOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=meus_bancos_lista&id_cliente=<?php echo $id_cliente;?>"  title="MEUS BANCOS" class="black" style="color:#000;">MEUS BANCOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=minhas_configuracoes_lista&id_cliente=<?php echo $id_cliente;?>"  title="MINHAS CONFIGURACOES" class="black" style="color:#000;">MEUS CONFIGURACOES</a></span><br />
                    
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="visualiza_meus_comentarios.php?id_cliente=<?=$_SESSION[cliente][ID]?>"   title="MEUS COMENTÁRIOS" class="black" rel="iframe-full-full" class="pirobox_gall1" style="color:#000;">MEUS COMENTÁRIOS</a></span><br />
                    
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?pagina=form_cadastro_user1&acao=ver&id_cliente=<?php echo $id_cliente;?>"  title="MEU REGISTRO" class="black" style="color:#000;">MEU REGISTRO</a></span><br />
                </div>
            </div>
            <div class="topo_lateral_esquerda"> 
            </div>
            <div class="bg_conteudo_lateral_esquerda">
             Dados Naveação !
              Dados Naveação !
               Dados Naveação !
                Dados Naveação !
                 Dados Naveação !
                  Dados Naveação !
            </div>
            
            
        </div>
        <!--LIMPAR desnecessario-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
        
        <!-- fim topo lateral_esquerda -->
    </div>