
<link rel="stylesheet" href="menu_dropdown/styles/reset.css" />
<link rel="stylesheet" href="menu_dropdown/styles/text.css" />
<link rel="stylesheet" href="menu_dropdown/styles/960_fluid.css" />
<link rel="stylesheet" href="menu_dropdown/styles/main.css" />
<link rel="stylesheet" href="menu_dropdown/styles/bar_nav.css" />
<link rel="stylesheet" href="menu_dropdown/styles/side_nav.css" />
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css" />

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>

<script type="text/javascript" src="menu_dropdown/scripts/sherpa_ui.js"></script>
<div id="lateral_direita" class="lateral_direita">
            <!-- menu conteudo -->
            <div class="topo_menu"> 
            </div>
            <div class="bg_conteudo_menu"> 
            <div style="margin-top:-2px; z-index: 1;" id="side_nav" class="side_nav grid_3 push_down">
			<ul class="clearfix">
				<li><a class="round_left" href="index.php?pagina=home">
					<img src="menu_dropdown/images/icons/grey/admin_user.png">
					<span>Home</span></a>
				</li> 
                <?php
			 		$sqlC = mysql_query("select * from tb_categoria order by categoria");
			   		while($resultC = mysql_fetch_array($sqlC)){ 
					$idC = $resultC['id_categoria'];
					$data_hoje = date('Y/m/d');
					$sqlB = mysql_query("SELECT count(*) as total FROM tb_festa WHERE id_categoria = ".$dado['id_categoria']." and data >= '$data_hoje' or id_categoria = ".$dado['id_categoria']." and datafim >= '$data_hoje'");
				$linhasQC = mysql_fetch_array($sqlB);
				$qtd = $linhasQC['total'];
					
					
			   		
			   	?>
				<li><a href="index.php?pagina=baladas_lista&id_c=<?php echo $idC; ?>">
					<img src="menu_dropdown/images/icons/grey/settings_2.png">
                    
					<span><?php echo $resultC['categoria']; ?></span><?php if($qtd != '0'){?> (<?php echo $qtd;?>)<?php }?>
					<span class="icon">&nbsp;</span>
					</a>
					<ul>
                    <?php
			 		$sqlsub = mysql_query("select * from tb_subcategoria where id_categoria = '$idC' order by subcategoria");
			   		while($resultsub = mysql_fetch_array($sqlsub)){ 
			   		$idsub = $resultsub['id_subcategoria'];
			   		?>
                     <?php 
					$sql_qtd_sub_eventos = mysql_query("SELECT count(*) as total FROM tb_festa WHERE id_categoria = ".$dado['id_categoria']." and id_subcategoria = ".$dadoS['id_subcategoria']." and data >= '$data_hoje' or id_categoria = ".$dado['id_categoria']." and id_subcategoria = ".$dadoS['id_subcategoria']." and datafim >= '$data_hoje'");
					$linhasQC_festa = mysql_fetch_array($sql_qtd_sub_eventos);
					$qtd_sub_eventos = $linhasQC_festa['total'];
					?>
						<li><a href="index.php?pagina=baladas_lista&id_c=<?php echo $idC; ?>&id_s=<?php echo $idsub; ?>"><?php echo $resultsub['subcategoria'];?>
							<span class="icon">&nbsp;</span><?php if($qtd_sub_eventos != '0'){?> (<?php echo $qtd_sub_eventos;?>)<?php }?></a>	
                            <?php $sqlantsub = mysql_query("select * from tb_antsubcategoria where id_categoria = '$idC' and id_subcategoria = '$idsub' order by antsubcategoria");
							if(!empty($sqlantsub)){
							?>
							<ul>
                            <?php while($resultantsub = mysql_fetch_array($sqlantsub)){ 
							$idantsub = $resultsub['id_antsubcategoria'];?>
								<li><a href="index.php?pagina=baladas_lista&id_c=<?php echo $idC; ?>&id_s=<?php echo $idsub; ?>&id_as=<?php echo $idantsub; ?>">
									<img src="menu_dropdown/images/icons/grey/refresh_2.png"><?php echo $resultantsub['antsubcategoria'];?>	
									<span class="icon">&nbsp;</span></a>	
									<ul>
										<li><a href="#">
											<img src="menu_dropdown/images/icons/grey/post_card.png">Germany</a></li>
										<li><a href="#">
											<img src="menu_dropdown/images/icons/grey/speech_bubble.png">Netherlands</a></li>
										<li><a href="#">
											<img src="menu_dropdown/images/icons/grey/tags_2.png">France
											<span class="left icon">&nbsp;</span></a>								
											<ul class="slide_left">
												<li><a href="#">Paris</a></li>
												<li><a href="#">Lyon</a></li>
												<li><a href="#">Marseille</a></li>
												<li><a href="#">Toulouse</a></li>
											</ul>					
										</li>
									</ul>
								</li><?php } ?>
							</ul><?php } ?>
						</li>
                        <?php } ?>
					</ul>
				</li>		
                <?php } ?>		
					
				<li><a href="#">
					<img src="menu_dropdown/images/icons/grey/chart_6.png">
					<span>Mixed</span>
					<span class="icon">&nbsp;</span></a>
					<ul>
						<li><a href="#">North America
							<span class="icon">&nbsp;</span></a>
							<div class="accordion">
								<a href="#">Paris</a>
								<a href="#">Lyon</a>
								<a href="#">Toulouse</a>
							</div>
						</li>
						<li><a href="#">Europe
							<span class="icon">&nbsp;</span></a>	
							<ul>
								<li><a href="#">Eastern</a></li>
								<li><a href="#">Central</a></li>
								<li><a href="#">Western
									<span class="icon">&nbsp;</span></a>		
									<ul>
										<li><a href="#">Germany</a></li>
										<li><a href="#">Netherlands</a></li>
										<li><a href="#">France
											<span class="icon">&nbsp;</span></a>									
											<div class="accordion">
												<a href="#">Paris</a>
												<a href="#">Lyon</a>
												<a href="#">Marseille</a>
											</div>					
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#">Asia</a></li>
					</ul>
				</li>
				<li><a href="#">
					<img src="menu_dropdown/images/icons/grey/book.png">
					<span>Link</span></a>
				</li>				
				<li><a href="#">
					<img src="menu_dropdown/images/icons/grey/magnifying_glass.png">
					<span>Search</span>
					<span class="icon">&nbsp;</span></a>
					<div class="drop_box round_all">
						<form style="width:210px">
							<input class="round_all" value="Search...">
							<button class="send_right">Go</button>
						</form>
					</div>
				</li>				
				<li><a href="#">
					<img src="menu_dropdown/images/icons/grey/key.png">
					<span>Login</span>
					<span class="icon">&nbsp;</span></a>
					<div class="drop_box round_all">
						<form style="width:160px">
							<fieldset class="grid_8">
								<label>Email</label><input class="round_all" value="name@example.com">
							</fieldset>
							<fieldset class="grid_8">
								<label>Password</label><input class="round_all" type="password" value="password">
							</fieldset>
							<button class="send_right">Login</button>
						</form>
					</div>
				</li>				
			</ul>
			
		</div>
		
		
            </div>
            <!--LIMPAR-->
            <div class="cleaner"></div>
            <!-- FIM LIMPAR-->
            <div class="topo_menu"> 
            </div>
            <div class="bg_conteudo_menu"> 
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
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_users" title="CADASTRAR USERS" class="black" style="color:#000;">CADASTRAR USERS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_configuracoes" title="CADASTRAR CONFIGURAÇÕES" class="black" style="color:#000;">CADASTRAR CONFIGURAÇÕES</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?id=3&pagina=cadastro_apps" title="CADASTRAR APPS" class="black" style="color:#000;">CADASTRAR APPS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links" ><a href="index.php?pagina=minhas_baladas_lista&id_cliente=<?=$_SESSION[cliente][ID]?>"  title="MEUS EVENTOS" class="black" style="color:#000;">MEUS EVENTOS</a></span><br />
                    
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="visualiza_meus_comentarios.php?id_cliente=<?=$_SESSION[cliente][ID]?>"   title="MEUS COMENTÁRIOS" class="black" rel="iframe-full-full" class="pirobox_gall1" style="color:#000;">MEUS COMENTÁRIOS</a></span><br />
                    <span class="lateral_direita_conteudo_corpo_menu_texto_links"><a href="index.php?pagina=form_cadastro_user1&acao=ver&id_cliente=<?=$_SESSION[cliente][ID]?>"  title="MEU REGISTRO" class="black" style="color:#000;">MEU REGISTRO</a></span><br />
                </div>
            </div>
            </div>
            <div class="topo_menu"> 
            </div>
            <div class="bg_conteudo_menu"> 
            Dados Navegação !
            Dados Navegação !
            Dados Navegação !
            Dados Navegação !
            Dados Navegação !
            Dados Navegação !
            Dados Navegação !
            Dados Navegação !
            Dados Navegação !
            
            </div>
            <!-- fim menu conteudo -->
        </div>
        <br /> 