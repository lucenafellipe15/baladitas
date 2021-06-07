
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
			   	?>
				<li><a href="index.php?pagina=baladas_lista&id_c=<?php echo $idC; ?>">
					<img src="menu_dropdown/images/icons/grey/settings_2.png">
                    
					<span><?php echo $resultC['categoria']; ?></span>
					<span class="icon">&nbsp;</span>
					</a>
					<ul>
                    <?php
			 		$sqlsub = mysql_query("select * from tb_subcategoria where id_categoria = '$idC' order by subcategoria");
			   		while($resultsub = mysql_fetch_array($sqlsub)){ 
			   		$idsub = $resultsub['id_subcategoria'];
			   		?>
						<li><a href="index.php?pagina=baladas_lista&id_c=<?php echo $idC; ?>&id_s=<?php echo $idsub; ?>"><?php echo $resultsub['subcategoria'];?>
							<span class="icon">&nbsp;</span></a>	
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
            dsadasdasd
            sadasd
            asdasdasd
            dsadasd
            dasdasdasd
            
            zxfzfsfsdfsdfsd
            fsdfsdf
            fsdfsdfsd
            fsdfsdfsdf
            fsdfsdfsdf
            fsdfsdf
            zxfzfsfsdfsdfsd
            fsdfsdf
            fsdfsdfsd
            fsdfsdfsdf
            fsdfsdfsdf
            fsdfsdf
            
            zxfzfsfsdfsdfsd
            fsdfsdf
            fsdfsdfsd
            fsdfsdfsdf
            fsdfsdfsdf
            fsdfsdf
            </div>
            <div class="topo_menu"> 
            </div>
            <div class="bg_conteudo_menu"> 
            dsadasdasd
            sadasd
            asdasdasd
            dsadasd
            dasdasdasd dsadasdasd sadasd asdasdasd dsadasd dasdasdasd zxfzfsfsdfsdfsd fsdfsdf fsdfsdfsd fsdfsdfsdf fsdfsdfsdf fsdfsdf zxfzfsfsdfsdfsd fsdfsdf fsdfsdfsd fsdfsdfsdf fsdfsdfsdf fsdfsdf zxfzfsfsdfsdfsd fsdfsdf fsdfsdfsd fsdfsdfsdf fsdfsdfsdf fsdfsdf 
            </div>
            <!-- fim menu conteudo -->
        </div>