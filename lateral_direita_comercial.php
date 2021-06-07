<link rel='stylesheet' type='text/css' href='../css/calendar_style.css' />
<script type='text/javascript' src="../js/calendar.js"></script>
        <div id="lateral_esquerda_conteudo" class="lateral_esquerda_conteudo">
            <div class="iten_lateral_esquerda_conteudo"><p align="center" style="margin-top:32px; margin-bottom:40px; margin-left:-16px; font-weight:bold; color:#87A415;">Menu</p>
            <!--  Busca Categorias -->   <?php 
										$sqlC = mysql_query("select * from tb_categoria_comercial order by id_categoria_comercial DESC");
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
				$sqlB = mysql_query("SELECT count(*) as total FROM tb_comercial WHERE id_categoria_comercial = ".$dado['id_categoria_comercial']."");
				$linhasQC = mysql_fetch_array($sqlB);
				$qtd = $linhasQC['total']
				?>
				<a href="../index.php?pagina=baladas_lista&amp;id=<?php echo $dado['id_categoria_comercial']?>"><?php echo $dado['categoria_comercial'] ?><small><?php if($qtd != '0'){?> (<?php echo $qtd;?>)<?php }?></small></a>
                  <!--  Busca Subcategorias -->
                	<?php 
	$sqlS = mysql_query("select * from tb_subcategoria_comercial where id_categoria_comercial = ".$dado['id_categoria_comercial']."  order by id_subcategoria_comercial DESC");
					while($dadoS = mysql_fetch_array($sqlS)){
					?>
				<ul>
					<li>
                    <?php 
					$sql_qtd_sub_eventos = mysql_query("SELECT count(*) as total FROM tb_comercial WHERE id_categoria_comercial = ".$dado['id_categoria_comercial']." and id_subcategoria_comercial = ".$dadoS['id_subcategoria_comercial']."");
					$linhasQC_festa = mysql_fetch_array($sql_qtd_sub_eventos);
					$qtd_sub_eventos = $linhasQC_festa['total']
					?>
					<a href="../index.php?pagina=baladas_lista&amp;id=<?php echo $dadoS['id_categoria_comercial']?>&amp;ids=<?php echo $dadoS['id_subcategoria_comercial']?>"><?php echo $dadoS['subcategoria_comercial']?><small><?php if($qtd_sub_eventos != '0'){?> (<?php echo $qtd_sub_eventos;?>)<?php }?></small> </a>
                            <!-- Selecionando os antsubsubcategoria -->
                        <?php 
	$sqlSA = mysql_query("select * from tb_antsubcategoria WHERE id_categoria = ".$dadoS['id_categoria']." and id_subcategoria = ".$dadoS['id_subcategoria']."");
											while($dadoSA = mysql_fetch_array($sqlSA)){
				?>  <ul>      
                            
                                <li><a href="../index.php?pagina=baladas_lista&amp;id=<?php echo $dadoSA['id_categoria']?>&amp;ids=<?php echo $dadoSA['id_subcategoria']?>&amp;idSa=<?php echo $dadoSA['id_antsubcategoria']?>"><?php echo $dadoSA['antsubcategoria'] ?></a>
                                
                                      <!-- Selecionando os antantsubsubcategoria -->
                                        <?php 
                $sqlSAA = mysql_query("select * from tb_antantsubcategoria WHERE id_categoria = ".$dadoSA['id_categoria']." and id_subcategoria = ".$dadoSA['id_subcategoria']."  and id_antsubcategoria = ".$dadoSA['id_antsubcategoria']." ");
                                                        while($dadoSAA = mysql_fetch_array($sqlSAA)){
                            ?>  <ul> 
                                    <li class="current"><a href="../index.php?pagina=baladas_lista&amp;id=<?php echo $dadoSAA['id_categoria_comercial']?>&amp;ids=<?php echo $dadoSAA['id_subcategoria_comercial']?>&amp;idSa=<?php echo $dadoSAA['id_antsubcategoria']?>&amp;idSaa=<?php echo $dadoSAA['id_antantsubcategoria']?>"><?php echo $dadoSAA['antantsubcategoria'] ?></a></li><?php } ?>
                                    </ul><?php } ?>
                                
                                </li>
                            </ul><?php } ?>
					</li>
				</ul><?php } ?>
			</li>
			</ul>
            </div>
            <!--
            <div class="iten_lateral_esquerda_conteudo"><p align="center" style="margin-top:6px; margin-left:-16px; font-weight:bold; color:#87A415;">Calendario</p>
              <div id="calback">
					<div id="calendar"></div>
			  </div>
            </div>-->
        </div>