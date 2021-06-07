<div id="corpo" class="corpo">
        <!-- topo conteudo principal -->
        <div class="topo_conteudo_principal"> 
            </div>
            <div class="corpo_conteudo_principal"> 
           

    <!--<script src="gSlider/js/image-slider.js" type="text/javascript"></script>

    <link href="gSlider/style/image-slider.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        $(document).ready(function() {
            $('#slider').slider({ speed: 500 });

        });       
        
    </script>
    <div id="slider">
            <div>
                <img alt="Open Source Vector Icons" src="gSlider/images/open-source-vector-icons.png" width="100" height="100" />
                <a href="http://www.greepit.com/2010/07/open-source-icons-for-ui-designers-web-developers-gcons/" target="_blank">Open Source Vector Icons</a>
            </div>
            <div>
                <img alt="Feedback Collection Polling Widget" src="gSlider/images/Feedback-Collection-Polling-Widget.png" width="100" height="100" />
                <a href="http://www.greepit.com/2010/11/feedback-collection-and-polling-widget-opineo/" target="_blank"><img src="images/bt_comprar.png" width="61" height="17" border="none"/>Feedback Collection Polling Widget</a></div>
            <div>
                <img alt="Most Effective Link Building Strategies for Blogs" src="gSlider/images/link-building-strategies-for-blogs.png" width="100" height="100" />
                <a href="http://www.greepit.com/2010/11/most-effective-link-building-strategies-for-blogs/" target="_blank">Link Building Strategies for Blogs</a></div>
            <div>
                <img alt="First Complete CSS3 jQuery Tabs" src="gSlider/images/jQuery-css3-tabs.png" width="100" height="100" />
                <a href="http://www.greepit.com/2011/04/jquery-css3-tabs-with-breadcrumb-and-pagination-classytabs/" target="_blank">First Complete CSS3 jQuery Tabs</a></div>
            <div>
                <img alt="Professional Creative Free Resume Template" src="gSlider/images/professional-creative-resume-template.png" width="100" height="100" />
                <a href="http://www.greepit.com/2010/06/creative-resume-template/" target="_blank">Professional Creative Free Resume Template</a></div>
            <div>
                <img alt="How to Design Accessible Websites and Web Applications
" src="gSlider/images/how-to-design-accessible-websites-and-web-applications.png" width="100" height="100" />
                <a href="http://www.greepit.com/2011/05/how-to-design-accessible-websites-and-web-applications/" target="_blank">How to Design Accessible Websites</a></div>
            <div>
                <img alt="One-liner Login Control" src="gSlider/images/one-line-login-control-singleline-login.png" width="100" height="100" />
                <a href="http://www.greepit.com/2011/05/one-is-better-than-two-singleline-login" target="_blank">One-liner Login Control</a></div>
            <div>
                <img alt="Free Minimal Wordpress Theme" src="gSlider/images/free-minimal-wordpress-theme.png" width="100" height="100" />
                <a href="http://www.greepit.com/2010/12/free-minimal-wordpress-theme-ginimalistic/" target="_blank">Free Minimal Wordpress Theme</a></div>
                
            <div>
                <img alt="5 Web Design Trends to Watch & Follow in 2011" src="gSlider/images/5-web-design-trends-to-watch-follow-in-2011.png" width="100" height="100" />
                <a href="http://www.greepit.com/2011/04/5-web-design-trends-to-watch-follow-in-2011/" target="_blank">Web Design Trends to Watch & Follow</a></div>

                        
        </div>-->
            </div>
            
            <div class="topo_conteudo_principal_produto"> 
            </div>
            <div id="corpo_conteudo_principal_produto" class="corpo_conteudo_principal_produto">
            <h2>Lista de Produtos </h2>
             <!--Produto Completo-->
            	<div id="bg_produto" class="bg_produto">
                
  
  
<?php 
$filtro = $_post['busca'];
	$sql = "select * from tb_produto ";
	if(!empty($filtro)){
		$sql = $sql."where produto like '%".$filtro."%'";	
	}	
	$sql = $sql." order by id_produto DESC LIMIT 1000";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	while($dados = mysql_fetch_array($result)){
	

                    
                    echo '<div class="img_produto">
                    	<a href="#"><img src="produto/'.$dados['imagem'].'" width="175" height="111" border="none"/></a>
                    </div>
                    <div id="preco" class="preco">
					<br /><br /><br /><br />
                    	<div class="valor_total"><p align="center">'.$dados['produto'].'</p></div>
                        <div class="valor_desconto"><p align="center">'.$dados['descricao'].'</p></div>
                    </div>
                    <div id="desconto" class="desconto">
                        <div class="diferenca_total"><p align="center">R$'.$dados['preco'].'</p></div>
                        <div class="porcentagem_desconto"><p align="center">R$'.$dados['valor'].'</p></div>	
                    </div>
                    <!--LIMPAR-->
            		<div class="cleaner"></div>
            		<!-- FIM LIMPAR-->
               	    <div id="contagem" class="contagem">
                    	<div class="hora">
						<br /><br />
                        	<p align="center">'.$dados['preco'].'</p>
                        </div>
                        <div class="minuto">
                      	    
                        </div>
                        <div class="segundo">
						    <br /><br /><br /><br />
                        	<p align="center">'.$dados['texto'].'</p>
                        </div>
                        <!--LIMPAR-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
                    </div>
                    <div id="link_produto" class="link_produto">
                        <div class="link_site">
						<br /><br /><br /><br />
                        	<p align="center"><a href="#">'.$dados['produto'].'</a></p>
                        </div>
						<br /><br /><br /><br />
                        <div class="link_site_detalhes">
                        	<p align="center"><a href="index.php?pagina=produtos_detalhes.php?id_produto='.$dados['id_produto'].'"><img src="images/bt_comprar.png" width="61" height="17" border="none"/></a></p>
                        </div>
                    </div>
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					<div class="minha_conta_bt_editar" ><a href="https://pagseguro.uol.com.br?preco='.$dados['preco'].'" class="black" title="'.$dados['preco'].'"><input type="image" name="imageField" title="Comprar" id="imageField" src="images/bt_finalizar_compra.jpg" /></a><a href="index.php?pagina=carrinho&acao=comprar_produto&id_cliente='.$_SESSION[cliente][ID].'&id_produto='.$dados['id_produto'].' "><input name="input" type="image" alt="Comprar Produto" src="images/bt_comprar.jpg"/></a></div>';
                
                }?><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                <?php echo '<a href="https://pagseguro.uol.com.br?preco='.$dados['preco'].'" class="black" title="'.$dados['preco'].'"><input type="image" name="imageField" title="Comprar" id="imageField" src="images/bt_finalizar_compra.jpg" /></a>
                    '; ?>
                </div>
                <!-- Fim Produto Completo-->
                
                
                
                
                
            </div>
        <!-- fim topo conteudo principal -->
        </div>
        <div style="margin-top:20000px;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ohWHHMfJVOQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <br /><br /><br /><br /><br /><br /><br /><br />
        <?php 

	$sql_video = "select * from tb_video ";
	$result_video = mysql_query($sql_video) or die(mysql_error());
	$linhas_video = mysql_num_rows($result_video);
	while($dados_video = mysql_fetch_array($result_video)){
		
		echo '<p>'.$dados_video['nomevideo'].'</p><iframe width="560" height="315" src="https://www.youtube.com/embed/'.$dados_video['link'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'; }?>
	</div>

        