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




<!--CONTEUDO-->

<div id="conteudo">

<!--BOX ESQUERDA-->

<div style="width:680px; float:left;">

<!--FORM BUSCA-->
<form id="form3" name="form3" method="post" action="#">
<table width="680" border="0" cellspacing="0" cellpadding="3" style="background-color:#f69021; float:left;">
  <tr>
    <td width="140" align="right" valign="middle" class="span"><span>Busca por Curso:</span></td>
    <td width="216" align="left" valign="bottom">
      <input type="text" name="pesquisa" id="pesquisa" />
    </td>
    <td width="306" align="left" valign="top" style="padding-top:07px;"><input name="enviar2" type="image" id="enviar2" value="Submit" src="images/bt_enviar.jpg" alt="Enviar" /></td>
  </tr>
</table>
</form>

<!--BOX ESQUERDA-->
<div id="box_esq">

  <h2>Lista de cursos </h2>
  
<?php 
    $id_curso = $_request("id_curso");
	$sql = "select * from tb_curso where id_curso = '.$id_curso.'";
	if(!empty($filtro)){
		$sql = $sql."where portifolio or texto like '%".$filtro."%'";	
	}	
	$sql = $sql." order by id_curso DESC LIMIT $inicio, $qnt";
	$result = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
	for($i=0;$i<$linhas;$i++){
		$precosemponto= str_replace('.', '', $dados['valor']);
	    $preco= str_replace(',', '', $precosemponto);
?>  


<table width="652" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dotted #d75c14;">
  <tr>
    <td width="217" align="center"><img src="portifolio/<?php if ($dados['imagem'] == "" ){ echo "img_produto.jpg"; }else{ echo $dados['imagem']; } ?>" width="239" height="239" alt="produto" /></td>
    <td width="435" align="left" valign="top" style="padding:5px;">
    <h3><?php echo $dados['portifolio']?></h3>
    <p><?php echo $dados['texto']?></p>
    <span class="valor"><?php echo ($dados['valor']!="")? "&nbsp; R$ ".$dados['valor']:""?></span>
    </td>
  </tr>
  <tr>
    <td height="50">&nbsp;</td>
    <td align="right" valign="top"><a href="detalhe.php?id_curso=<?php echo $dados['id_curso']?>"><img src="images/bt_informacoes.jpg" alt="Mais Informações" border="0" style="margin-right:10px;" /></a>
    <a href="preinscricao.php?id_curso=<?php echo $dados['id_curso']?>"><img src="images/bt_inscricao.jpg" alt="Inscrição On-line" border="0" style="margin-left:10px;" /></a>
    </td>
  </tr>
  </table>

<!--produto-->
<?php 
	$dados = mysql_fetch_array($result);
	}
?>
<table width="652" border="0" cellspacing="0" cellpadding="0" style="border-bottom:1px dotted #d75c14;">
  <tr>
  	<td colspan="2" align="center">
    <?php
						
			$sql_select_all = "select * from tb_curso ";
			if(!empty($filtro)){
				$sql_select_all = $sql_select_all."where portifolio or texto like '%".$filtro."%'";	
			}
			$sql_select_all = $sql_select_all." order by id_curso DESC";
			// Executa o query da seleção acimas
			$sql_query_all = mysql_query($sql_select_all);
			// Gera uma variável com o número total de registros no banco de dados
			$total_registros = mysql_num_rows($sql_query_all);
			if($total_registros!=0){
					// Gera outra variável, desta vez com o número de páginas que será precisa.
					// O comando ceil() arredonda 'para cima' o valor
					$pags = ceil($total_registros/$qnt);
					// Número máximos de botões de paginação
					$max_links = 3;
					// Exibe o primeiro link 'primeira página', que não entra na contagem acima(3)
					echo "<a href='index.php?p=1' target='_self'>primeira pagina</a> ";
					// Cria um for() para exibir os 3 links antes da página atual
					for($i = $p-$max_links; $i <= $p-1; $i++) {
					// Se o número da página for menor ou igual a zero, não faz nada
					// (afinal, não existe página 0, -1, -2..)
					if($i <=0) {
					//faz nada
					// Se estiver tudo OK, cria o link para outra página
					} else {
					echo "<a href='index.php?p=".$i."' target='_self'>".$i."</a> ";
					}
					}
					// Exibe a página atual, sem link, apenas o número
					echo $p." ";
					// Cria outro for(), desta vez para exibir 3 links após a página atual
					for($i = $p+1; $i <= $p+$max_links; $i++) {
					// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
					if($i > $pags)
					{
					//faz nada
					}
					// Se tiver tudo Ok gera os links.
					else
					{
					echo "<a href='index.php?p=".$i."' target='_self'>".$i."</a> ";
					}
					}
					// Exibe o link "última página"
					echo "<a href='index.php?p=".$pags."' target='_self'>ultima pagina</a> ";
			}else{?>
            <?php
				echo "Nenhum Registro encontrado.";
				}
			?>
    </td>
 </tr>
 </table>



</div>
</div>

<!--BOX DIREITA-->
<div id="box_dir">
<h2>Novos cursos</h2>
  <?php 
	$sql1 = "select * from tb_banner order by id_banner DESC LIMIT $inicio, $linhas";
	$result1 = mysql_query($sql1) or die(mysql_error());
	$linhas1 = mysql_num_rows($result1);
	$dados1 = mysql_fetch_array($result1);
	for($i=0;$i<$linhas1;$i++){
?>  
<a href="detalhe.php?id_curso=<?php echo $dados1['id_curso'];?>" >
  <img src="banner/<?php echo $dados1['banner']?>" width="291" height="284" alt="banner1" border="0"/>
</a>
  <br /><br />
<?php
$dados1 = mysql_fetch_array($result1);
 } ?>
</div>


</div>
<!--FIM DO CONTEUDO-->


<!--BANNER PROFESSORES-->
<div id="professores">
  <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="978" height="247">
    <param name="movie" value="swf/banner_professores.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <param name="menu" value="true" />
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="swf/banner_professores.swf" width="978" height="247">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <param name="menu" value="true" />
      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
      <div>
        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
      </div>
      <!--[if !IE]>-->
    </object>
    <!--<![endif]-->
  </object>
</div>
<!--FIM DO BANNER PROFESSORES-->


<!--BANNER CADASTRO-->
<div id="cadastro">
<form action="preinscricao.php" method="post" name="form1" id="form1" >
<table width="335" style="height:157px; float:left;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="34" colspan="2" style="padding-left:10px;"><h2>Pré-cadastro</h2></td>
    </tr>
  <tr>
    <td width="89" align="right" valign="middle"><span>Nome:</span></td>
    <td width="246" align="left" valign="middle">
      <input type="text" name="nome" id="nome" />
   </td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span>E-mail:</span></td>
    <td align="left" valign="middle"><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="padding-right:22px;"><input name="enviar" type="image" id="enviar" value="Submit" src="images/bt_enviar.jpg" alt="Enviar" /></td>
  </tr>
</table>
 </form>
<a href="#"><img src="images/chat_on_line.jpg" alt="Chat on0line" style="margin:10px 05px; float:left;" border="0" /></a>

<form action="acao_cliente.php?comando=add_news" method="post" name="form2" id="form2" >
<table width="337" style="height:157px; float:left;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="34" colspan="2" style="padding-left:10px;"><h2>Newsletter</h2></td>
    </tr>
  <tr>
    <td width="89" align="right" valign="middle"><span>Nome:</span></td>
    <td width="248" align="left" valign="middle">
      <input type="text" name="nome1" id="nome1" />
   </td>
  </tr>
  <tr>
    <td align="right" valign="middle"><span>E-mail:</span></td>
    <td align="left" valign="middle"><input type="text" name="email1" id="email1" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" style="padding-right:22px;">
    <input name="enviar" type="image" id="enviar" value="Submit" src="images/bt_enviar.jpg" alt="Enviar" /></td>
  </tr>
</table>
 </form>
</div>
<!--FIM DO BANNER CADASTRO-->





<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
//-->
</script>
</body>
</html>
