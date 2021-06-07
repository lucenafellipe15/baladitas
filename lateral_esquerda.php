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
                 	<form action="index.php?pagina=baladas_lista" method="post" name="busca">
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
                 	<form action="index.php?pagina=baladas_lista" method="post" name="newslatter">
                 		<input class="input_newslatter_lateral_esquerda" style="" name="newslatter" id="newslatter" onclick="MM_setTextOfTextfield('newslatter','','')" type="text" size="30" maxlength="30" value="Digite seu email !"/>
                        
                </div>
                <div class="login">
                    <form action="index.php?pagina=login" method="post" name="login">
                    <div id="topo3" class="topo3">
                    <div class="subtopo1">
                             <input  name="login" id="login" class="input_login" onclick="MM_setTextOfTextfield('login','','')" type="text" size="20" maxlength="30" value="Login..."/>
                    </div>
                    <div class="subtopo2">
                                <input  name="senha" id="senha" class="input_senha" onclick="MM_setTextOfTextfield('senha','','')" type="password" size="20" maxlength="30" value="Senha..."/>
                    </div>
                    <div class="subtopo3">
            		<input name="entrar" type="image" class="input_bt_login" src="images/entrar.png" title="entrar" class="bt_entrar" />
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
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_extras" title="CADASTRAR EVENTOS" class="black" style="color:#000;">CADASTRAR IMAGENS EXTRAS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_artisticos" title="CADASTRAR EVENTOS" class="black" style="color:#000;">CADASTRAR IMAGENS ARTISTICOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_produtos" title="CADASTRAR EVENTOS" class="black" style="color:#000;">CADASTRAR PRODUTOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_canhotos" title="CADASTRAR EVENTOS" class="black" style="color:#000;">CADASTRAR CANHOTO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_portifolios" title="CADASTRAR EVENTOS" class="black" style="color:#000;">CADASTRAR PORTIFÓLIO</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=minhas_baladas_lista&id_cliente=<?=$_SESSION[cliente][ID]?>"  title="MEUS EVENTOS" class="black" style="color:#000;">MEUS EVENTOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="visualiza_meus_comentarios.php?id_cliente=<?=$_SESSION[cliente][ID]?>"   title="MEUS COMENTÁRIOS" class="black" rel="iframe-full-full" class="pirobox_gall1" style="color:#000;">MEUS COMENTÁRIOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?pagina=form_cadastro_user1&acao=ver&id_cliente=<?=$_SESSION[cliente][ID]?>"  title="MEU REGISTRO" class="black" style="color:#000;">MEU REGISTRO</a></span><br />
                </div>
            </div>
            </div>
            <div class="topo_lateral_esquerda"> 
            </div>
            <div class="bg_conteudo_lateral_esquerda">
            dasdasdasdasd
            dasdasdasdasdas
            dasdasdasdasdad
            sadasdasdasdasd
            sdasdasdasdasdas
            dasdasdasdasdas
            dasdasdasdasdas
            dasdasdasdasdad
            sadasdasdasdasd
            sdasdasdasdasdas
            dasdasdasdasdas
            </div>
            
            
        </div>
        <!--LIMPAR desnecessario-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
        
        <!-- fim topo lateral_esquerda -->
    </div>