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
            <h2>Quem Somos </h2>
             <!--Produto Completo-->
            	<div id="bg_produto" class="bg_produto">
                
  
  
<?php 
	$sql = "select * from tb_quemsomos ";
	if(!empty($filtro)){
		$sql = $sql."where quemsomos like '%".$filtro."%'";	
	}	
	$sql = $sql." order by id_quemsomos DESC LIMIT $inicio, $qnt";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	while($dados = mysql_fetch_array($result)){
	

                    
                    echo '<div class="img_produto">
                    	<a href="#"><img src="quemsomos/'.$dados['imagem'].'" width="175" height="111" border="none"/></a>
                    </div>
                    <div id="preco" class="preco">
                    	<div class="valor_total"><p align="center">'.$dados['quemsomos'].'</p></div>
                        <div class="valor_desconto"><p align="center">'.$dados['descricao'].'</p></div>
                    </div>
                    <div id="desconto" class="desconto">
                        <div class="diferenca_total"><p align="center">$5133,33</p></div>
                        <div class="porcentagem_desconto"><p align="center">60%</p></div>	
                    </div>
                    <!--LIMPAR-->
            		<div class="cleaner"></div>
            		<!-- FIM LIMPAR-->
               	    <div id="contagem" class="contagem">
                    	<div class="hora">
                        	<p align="center">22</p>
                        </div>
                        <div class="minuto">
                      	    <p align="center">22</p>
                        </div>
                        <div class="segundo">
                        	<p align="center">22</p>
                        </div>
                        <!--LIMPAR-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
                    </div>
                    <div id="link_produto" class="link_produto">
                        <div class="link_site">
                        	<p align="center"><a href="#">Peixe Urbano</a></p>
                        </div>
                        <div class="link_site_detalhes">
                        	<p align="center"><a href="index.php?pagina=quemsomoss_detalhes.php?id_quemsomos='.$dados['id_quemsomos'].'"><img src="images/bt_comprar.png" width="61" height="17" border="none"/></a></p>
                        </div>
                    </div>';
                
                }?>
                </div>
                <!-- Fim Produto Completo-->
                
                
                
                <!--Produto Completo-->
            	<div id="bg_produto" class="bg_produto">
                    <div class="img_produto">
                    	<a href="#"><img src="images/img_produto.jpg" width="175" height="111" border="none"/></a>
                    </div>
                    <div id="preco" class="preco">
                    	<div class="valor_total"><p align="center">$5133,33</p></div>
                        <div class="valor_desconto"><p align="center">$23,33</p></div>
                    </div>
                    <div id="desconto" class="desconto">
                        <div class="diferenca_total"><p align="center">$5133,33</p></div>
                        <div class="porcentagem_desconto"><p align="center">60%</p></div>	
                    </div>
                    <!--LIMPAR-->
            		<div class="cleaner"></div>
            		<!-- FIM LIMPAR-->
               	    <div id="contagem" class="contagem">
                    	<div class="hora">
                        	<p align="center">22</p>
                        </div>
                        <div class="minuto">
                      	    <p align="center">22</p>
                        </div>
                        <div class="segundo">
                        	<p align="center">22</p>
                        </div>
                        <!--LIMPAR-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
                    </div>
                    <div id="link_produto" class="link_produto">
                        <div class="link_site">
                        	<p align="center"><a href="#">Peixe Urbano</a></p>
                        </div>
                        <div class="link_site_detalhes">
                        	<p align="center"><a href="#"><img src="images/bt_comprar.png" width="61" height="17" border="none"/></a></p>
                        </div>
                    </div>
                
                
                </div>
                <!-- Fim Produto Completo-->
                <!--Produto Completo-->
            	<div id="bg_produto" class="bg_produto">
                    <div class="img_produto">
                    	<a href="#"><img src="images/img_produto.jpg" width="175" height="111" border="none"/></a>
                    </div>
                    <div id="preco" class="preco">
                    	<div class="valor_total"><p align="center">$5133,33</p></div>
                        <div class="valor_desconto"><p align="center">$23,33</p></div>
                    </div>
                    <div id="desconto" class="desconto">
                        <div class="diferenca_total"><p align="center">$5133,33</p></div>
                        <div class="porcentagem_desconto"><p align="center">60%</p></div>	
                    </div>
                    <!--LIMPAR-->
            		<div class="cleaner"></div>
            		<!-- FIM LIMPAR-->
               	    <div id="contagem" class="contagem">
                    	<div class="hora">
                        	<p align="center">22</p>
                        </div>
                        <div class="minuto">
                      	    <p align="center">22</p>
                        </div>
                        <div class="segundo">
                        	<p align="center">22</p>
                        </div>
                        <!--LIMPAR-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
                    </div>
                    <div id="link_produto" class="link_produto">
                        <div class="link_site">
                        	<p align="center"><a href="#">Peixe Urbano</a></p>
                        </div>
                        <div class="link_site_detalhes">
                        	<p align="center"><a href="#"><img src="images/bt_comprar.png" width="61" height="17" border="none"/></a></p>
                        </div>
                        <!--LIMPAR desnecessario-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
                    </div>
                
                
                </div>
                		<!--LIMPAR desnecessario-->
                        <div class="cleaner"></div>
                        <!-- FIM LIMPAR-->
                <!-- Fim Produto Completo-->
                
            </div>
        <!-- fim topo conteudo principal -->
        </div>