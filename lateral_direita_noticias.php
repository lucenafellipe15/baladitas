<link rel='stylesheet' type='text/css' href='../css/calendar_style.css' />
<script type='text/javascript' src="../js/calendar.js"></script>
        <div id="lateral_esquerda_conteudo" class="lateral_esquerda_conteudo">
            <div class="iten_lateral_esquerda_conteudo"><p align="center" style="margin-top:32px; margin-bottom:40px; margin-left:-20px; font-weight:bold; font-size:16px; color:#000000; text-shadow:1px 1px 1px #333;">Menu</p>
            <!--  Busca Categorias -->   <?php 
										$sqlC = mysql_query("select * from tb_categoria_noticias order by id_categoria_noticias DESC");
										while($dado = mysql_fetch_array($sqlC)){ ?>
            <ul class="sf-menu">
			<li class="current">
            	<!-- contador por subcategorias -->
                <?php 
				/*$data_hoje = date('Y/m/d');
				$sqlB = mysql_query("SELECT count(*) as total FROM tb_subcategoria WHERE id_categoria = ".$dado['id_categoria']."");
				$linhasQC = mysql_fetch_array($sqlB);
				$qtd = $linhasQC['total']*/
				?>
                <!-- contador por festas -->
                 <?php 
				$data_hoje = date('Y/m/d');
				$sqlB = mysql_query("SELECT count(*) as total FROM tb_noticia WHERE id_categoria_noticias = ".$dado['id_categoria_noticias']."");
				$linhasQC = mysql_fetch_array($sqlB);
				$qtd = $linhasQC['total']
				?>
				<a href="../index.php?pagina=noticias_lista&amp;id=<?php echo $dado['id_categoria_noticias']?>" class="black" title="<?php echo $dado['categoria_noticias'] ?>"><?php echo $dado['categoria_noticias'] ?><small><img style="vertical-align:bottom; margin-left:5px; " src="categoria_noticias/<?php echo $dado['imagem_categoria_noticias'] ?>" width="24" height="24" /><?php if($qtd != '0'){?> (<?php echo $qtd;?>)<?php }?></small></a>
                  <!--  Busca Subcategorias -->
                	<?php 
	$sqlS = mysql_query("select * from tb_subcategoria_noticias where id_categoria_noticias = ".$dado['id_categoria_noticias']."  order by id_subcategoria_noticias DESC");
					while($dadoS = mysql_fetch_array($sqlS)){
					?>
				<ul>
					<li>
                    <?php 
					$sql_qtd_sub_eventos = mysql_query("SELECT count(*) as total FROM tb_noticia WHERE id_categoria_noticias = ".$dado['id_categoria_noticias']." and id_subcategoria_noticias = ".$dadoS['id_subcategoria_noticias']."");
					$linhasQC_festa = mysql_fetch_array($sql_qtd_sub_eventos);
					$qtd_sub_eventos = $linhasQC_festa['total']
					?>
					<a href="../index.php?pagina=noticias_lista&amp;ids=<?php echo $dadoS['id_categoria_noticias']?>&amp;idsd=<?php echo $dadoS['id_subcategoria_noticias']?>"class="black" title="<?php echo $dadoS['subcategoria_noticias']?>" ><?php echo $dadoS['subcategoria_noticias']?><small><?php if($qtd_sub_eventos != '0'){?> (<?php echo $qtd_sub_eventos;?>)<?php }?></small> </a>
                            <!-- Selecionando os antsubsubcategoria -->
                      
                       
                                
                                </li>
                            </ul><?php } ?>
					</li>
				</ul><?php } ?>
			</li>
			</ul>
             <!-- twiter -->
            <?php $id_subcategoria = $dados_enfrentamento['id_subcategoria'];
			
			$pagina = $_REQUEST[pagina];
			
			if($pagina == 'enfrentamentos_lista'){
			
			?>
            <div style="margin-top:10px; margin-left:-25px;"><a href="" class="red" title="Enquete"><img style="margin-left:5px;" src="../images/enquete.png"  width="160" height="32" border="0"/></a>
                <div id="lateral_direita_conteudo_corpo_menu" class="lateral_direita_conteudo_corpo_menu" style="height:auto;  margin-top:11px">
                   <iframe style="margin-left:-9px; margin-top:-20px;" width="180" height="300" frameborder="0" scrolling="no" src="../ajax-poll/index_enquete_enfrentamentos.php" allowtransparency="true" ></iframe>
                </div>
            </div>
            <!-- FIM twiterr -->
            <?php }elseif($pagina == 'enfrentamentos_detalhes'){ ?>
            <div style="margin-top:10px; margin-left:-25px;"><a href="" class="red" title="Enquete"><img style="margin-left:5px;" src="../images/enquete.png"  width="160" height="32" border="0"/></a>
                <div id="lateral_direita_conteudo_corpo_menu" class="lateral_direita_conteudo_corpo_menu" style="height:auto;  margin-top:11px">
                   <iframe style="margin-left:-9px; margin-top:-20px;" width="180" height="300" frameborder="0" scrolling="no" src="../ajax-poll/index_enquete_enfrentamentos_detalhes.php?id_enfrentamento=<?php echo $id_enfrentamento ?>" allowtransparency="true" ></iframe>
                </div>
            </div>
            <?php } ?>
           <!-- twiter -->
            <div style="margin-top:10px; margin-left:-25px;"><a href="" class="red" title="Enquete"><img style="margin-left:5px;" src="../images/enquete.png"  width="160" height="32" border="0"/></a>
                <div id="lateral_direita_conteudo_corpo_menu" class="lateral_direita_conteudo_corpo_menu" style="height:auto;  margin-top:11px">
                   <iframe style="margin-left:-9px; margin-top:-20px;" width="180" height="300" frameborder="0" scrolling="no" src="../ajax-poll/index.html" allowtransparency="true" ></iframe>
                </div>
            </div>
            <!-- FIM twiterr -->
            
            <!-- twiter -->
            <div style="margin-top:10px; margin-left:-25px;"><a href="" class="red" title="Enquete"><img style="margin-left:5px;" src="../images/enquete.png"  width="160" height="32" border="0"/></a>
                <div id="lateral_direita_conteudo_corpo_menu" class="lateral_direita_conteudo_corpo_menu" style="height:auto;  margin-top:11px">
                   <iframe style="margin-left:-9px; margin-top:-20px;" width="180" height="300" frameborder="0" scrolling="no" src="../ajax-poll/index_enquete2.html" allowtransparency="true" ></iframe>
                </div>
            </div>
            <!-- FIM twiterr -->
            <div style="margin-top:10px; margin-left:-25px;"><a href="" class="black" title=" Mídias - twitter "><img align="middle" style="margin-left:0px;" src="../images/midias.png" title="Midias" width="160" height="32" border="0" /></a>
                <div id="lateral_direita_conteudo_corpo_menu" class="lateral_direita_conteudo_corpo_menu" style="height:330px;  margin-top:11px; margin-bottom:100px;">
                   <iframe style="margin-left:-9px; margin-top:-20px;" width="180" height="350" frameborder="0" scrolling="no" src="../twiter/twiter.php" allowtransparency="true" ></iframe>
                </div>
            </div>
            
            </div>
              
            <!--
            <div class="iten_lateral_esquerda_conteudo"><p align="center" style="margin-top:6px; margin-left:-16px; font-weight:bold; color:#87A415;">Calendario</p>
              <div id="calback">
					<div id="calendar"></div>
			  </div>
            </div>-->
        </div>
        