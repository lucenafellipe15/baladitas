<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic&subset=latin' rel='stylesheet' type='text/css'>
<?php //error_reporting(0);
include "valida_login.php";
?>
<?php
$acao = sqlinj($_REQUEST['acao']);
if($acao == 'del_festa'){
	$id_festa = sqlinj($_GET['id_festa']);
	
	//excluindo a imagem da pasta antes de excluir o festa
	$sql1 = "select * from tb_festa where id_festa=".$id_festa;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if($_SESSION[cliente][ID] != $dados1['id_cliente']){
		echo "<script>alert('Voc? n?o tem permiss?o para Excluir este Evento!');history.back(-1)</script>";
		}
	
	//consulta a imagem para excluir da pasta antes de d? o update
	$sql_bannerP = "select * from tb_bannerprincipal where id_festa=".$id_festa;
	$result_bannerP = mysql_query($sql_bannerP) or die(mysql_error());
	while($dados_bannerP = mysql_fetch_array($result_bannerP)){
		if(file_exists("banner/".$dados_bannerP['imagem'])){
		unlink("banner/".$dados_bannerP['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de d? o update
	$sql_bannerA = "select * from tb_bannercentro where id_festa=".$id_festa;
	$result_bannerA = mysql_query($sql_bannerA) or die(mysql_error());
	while($dados_bannerA = mysql_fetch_array($result_bannerA)){
		if(file_exists("banner/".$dados_bannerA['imagem'])){
		unlink("banner/".$dados_bannerA['imagem']);
	}}
	//consulta a imagem para excluir da pasta antes de d? o update
	$sql1 = "select imagem, imagem2, imagem3, imagem4, imagem5 from tb_festa where id_festa=".$id_festa;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
		
	if(file_exists("festa/".$dados1['imagem'])){
		unlink("festa/".$dados1['imagem']);
		unlink("festa/t/".$dados1['imagem']);
	}
	if(file_exists("festa/".$dados1['imagem2'])){
		unlink("festa/".$dados1['imagem2']);
		unlink("festa/t/".$dados1['imagem2']);
	}	
	if(file_exists("festa/".$dados1['imagem3'])){
		unlink("festa/".$dados1['imagem3']);
		unlink("festa/t/".$dados1['imagem3']);
	}	
	if(file_exists("festa/".$dados1['imagem4'])){
		unlink("festa/".$dados1['imagem4']);
		unlink("festa/t/".$dados1['imagem4']);
	}	
	if(file_exists("festa/".$dados1['imagem5'])){
		unlink("festa/".$dados1['imagem5']);
		unlink("festa/t/".$dados1['imagem5']);
	}	
	$sql = "delete from tb_bannerprincipal where id_festa = ".$id_festa;
	$sql = "delete from tb_bannercentro where id_festa = ".$id_festa;
	$sql = "delete from tb_festa where id_festa = ".$id_festa;
	$result = mysql_query($sql) or die (mysql_error());
	if($result==true){
		echo "<script>alert('Deletado com Sucesso!');document.location='index.php?pagina=minhas_baladas_lista&id_cliente=".$_SESSION[cliente][ID]."'</script>";
	}else{
		echo "<script>alert('Falha ao Deletar!');history.back(-1)</script>";
		}			
}


if($acao == "editar"){
	
	$id_festa = $_GET['id_festa'];
	$sql = "select * from tb_festa where id_festa=".$id_festa."";
	
	$result  		= mysql_query($sql) or die(mysql_error());
	$linhas 		= mysql_num_rows($result);
	$dados 			= mysql_fetch_array($result);
//$id_catProduto 	= $dados['id_categoria'];
	$id_fab			= $dados['id_fabricante'];
	$id_categoriaFA = $dados['id_categoria'];
	$id_subcategoriaFA = $dados['id_subcategoria'];
	$id_antsubcategoriaFA = $dados['id_antsubcategoria'];
	$id_antantsubcategoriaFA = $dados['id_antantsubcategoria'];
	
	if($_SESSION[cliente][ID] != $dados['id_cliente']){
		echo "<script>alert('Voc? n?o tem permiss?o para alterar este Evento!');history.back(-1)</script>";
		}
	
}

?>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/pirobox_extended.js"></script>
<script type="text/javascript" src="js/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="js/highslide/highslide.css" />

<META HTTP-EQUIV="imagetoolbar" CONTENT="no">

<script type="text/javascript">

$(document).ready(function() {
	$().piroBox_ext({
		piro_speed : 700,
		bg_alpha : 0.3,
		piro_scroll : true // pirobox always positioned at the center of the page
	});
});

</script>

<script>
function click() {
	if (event.button==2||event.button==3) {
		oncontextmenu='return false';
	 }
}
	document.onmousedown=click
	document.oncontextmenu = new Function("return false;")
</script>
<script language="JavaScript">
<!--
var mensagem="E Proibito a copia deste conteudo!";
function clickIE() {if (document.all) {(mensagem);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(mensagem);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
// --> 
</script>

<link href="form/reset.css" rel="stylesheet" type="text/css">    
        <link rel="shortcut icon" href="http://imasters.com.br/favicon.png">
        <link rel="apple-touch-icon" href="http://static.imasters.com.br/core/img/imasters/apple-touch-icon.png">
        
        
        <meta property="og:site_name" content="iMasters">
        <meta property="fb:admins" content="737466100">
  
        <link href="form/form.css" rel="stylesheet" type="text/css">
     
        <!-- Categorias Busca-->
        <script type="text/javascript">
	$(document).ready(function(){
		$("select[name=id_categoria]").change(function(){		
			$("select[name=id_subcategoria]").html('<option value="0"> Aguarde Carregando... </option>');
			
				$.post("adm/subcategoria.php",{id_cat:$(this).val()},function(valor){
					$("select[name=id_subcategoria]").html(valor);
			})
	})
		
		$("select[name=id_subcategoria]").change(function(){
														  $("select[name=id_antsubcategoria]").html('<option value="0"> Aguarde Carregando... </option>');
			$.post("adm/antsubcategoria.php",{id_subcategoria:$(this).val()},function(valor){
			$("select[name=id_antsubcategoria]").html(valor);
			
			})
	})
		$("select[name=id_antsubcategoria]").change(function(){
														  $("select[name=id_antantsubcategoria]").html('<option value="0"> Aguarde Carregando... </option>');
			$.post("adm/antantsubcategoria.php",{id_antsubcategoria:$(this).val()},function(valor){
			$("select[name=id_antantsubcategoria]").html(valor);
			})
	})
})


</script>
        <!-- fim Categorias Busca -->
        <!-- Somente numero -->
<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla > 47 && tecla < 58)) return true;
    else{
    if (tecla != 8) return false;
    else return true;
    }
}
</script>

</script>
		<!-- Fim Somente numero -->   
        <script type="text/javascript">

	function valida()

	{
		with(document.formFesta)

		{	if (id_categoria.value=='0'){
				alert("Escolha uma categoria!");
				id_categoria.focus();
				return false;
			}	
			if (estado.value=='0'){
				alert("Digite um estado!");
				estado.focus();
				return false;
			}
			if (cidade.value=='0'){
				alert("Digite uma cidade!");
				cidade.focus();
				return false;
			}
			//if (cep.value==''){
			//	alert("Digite um valor cep da festa!");
			//	cep.focus();
			//	return false;
			//}
			if (complemento.value==''){
				alert(" Digite o complemento!");
				complemento.focus();
				return false;
			}
			if (endereco.value==''){
				alert(" Digite um endereco!");
				endereco.focus();
				return false;
			}
			if (bairro.value==''){
				alert(" Digite um bairro!");
				endereco.focus();
				return false;
			}
			if (festa.value==''){
				alert("Informe um nome para festa");
				festa.focus();
				return false;
			}
			if (data.value==''){
				alert("Informe uma data");
				data.focus();
				return false;
			}
			if (hora_inicio_festa.value==''){
				alert("Informe uma data");
				hora_inicio_festa.focus();
				return false;
			}
		//	if (hora_fim_festa.value==''){
			//	alert("Informe uma data");
			//	hora_fim_festa.focus();
			//	return false;
			//}
				if (tags.value==''){
				alert("Digite as Tags para consulta!");
				tags.focus();
				return false;
			} 
			//if (imagem.value==''){
			//	alert("Digite uma imagem para a festa!");
			//	tags.focus();
			//	return false;
			//} 
		
				submit();
		}
	}
</script> 
<script type="text/javascript">

$(document).ready(function(){
	
	$("select[name=estado]").change(function(){		
		$("select[name=cidade]").html('<option value="0">Aguarde Carregando...</option>');
			
			$.post("cidade.php",{estado:$(this).val()},function(valor){
				$("select[name=cidade]").html(valor);
		
			})
	})

})
</script>  
<script language="javascript">
/*----------------------------------------------------------------------------
Formata??o para qualquer mascara
-----------------------------------------------------------------------------*/
function formatar(src, mask){
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
  {
    src.value += texto.substring(0,1);
  }
}
</script>
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript">

	 jQuery(function($){
	 $("#data").mask("99/99/9999");
	 $("#datafim").mask("99/99/9999");
	 $("#hora_inicio_festa").mask("99:99:99");
	 $("#hora_fim_festa").mask("99:99:99");
	 $("#fone").mask("(99) 9999-9999");
	 $("#cpf").mask("999-999-999-99");
	 $("#custom").mask("99999-9/999(99)");
	 $("#cep").mask("99.999-999");
	 });
</script>
<div id="meio_conteudo" class="meio_conteudo">
            <div id="iten_meio_conteudo3" class="iten_meio_conteudo3">&nbsp;
                <div class="iten_meio_conteudo_barra_festas">&nbsp;
                </div>
                 <div class="center-forms">
                <form  onSubmit="return valida()" id="formFesta" name="formFesta" action="index.php?pagina=acao_cliente&id_festa=<?php echo $dados['id_festa']?>&acao=<?php if($acao=="editar"){echo "editar_festa";}else{echo "cadastrar_festa";}?>" method="post" class="im-account-form" enctype="multipart/form-data">
					<h2>Formulario de Cadastro.</h2>
                    <input type="hidden" name="id_cliente" id="id_cliente" value="<?=$_SESSION[cliente][ID]?>"/>
				<div class="field">
						<label>Tipo:</label>
<select name="id_categoria" style="background-color:#fff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#111; text-shadow:0 1px 1px #333;border:1px solid #111; width:200px;">
									<option value="0">Escolha uma Categoria</option>
										<?
												$sql_cat = "select * from tb_categoria order by categoria ASC";
												$result = mysql_query($sql_cat);

												if(mysql_num_rows <= '0'){
													echo '<option value="0">Selecione uma Tipo</option>';
												}else
													while ($registro = mysql_fetch_array($result))
													{
														$id_categoria = $registro['id_categoria'];	
														
														if ($id_categoriaFA == $id_categoria)
															$selecionado = "selected";
														else
															$selecionado = "";
													
														echo '<option value = "'.$id_categoria.'"'.$selecionado.' > '.$registro['categoria'].'</option>';
													}
										?>
				  </select>
				  </div>
                  <div class="field">
						<label>Estilo:</label>
<select name="id_subcategoria"  style="background-color:#fff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#111; text-shadow:0 1px 1px #333;border:1px solid #111; width:200px;">
                                    <option value="0">Selecione um Estilo:</option>
								<?php  
								
									$sqlSub = "SELECT * FROM tb_subcategoria WHERE id_categoria = '".$id_categoriaFA."'";
									$qrSub = mysql_query($sqlSub);

									while($dadoSub = mysql_fetch_array($qrSub)){
											$selected = ($dadoSub['id_subcategoria'] == $dados['id_subcategoria']) ? ' selected="selected"': '';?>
									<option value = "<?=$dadoSub['id_subcategoria'];?>" <?=$selected;?> ><?=$dadoSub['subcategoria'];?></option>
								<? } ?>
					</select>
				  </div>
                  <div class="field">
						<label>Entrada:</label>
<select name="id_antsubcategoria"  style="background-color:#fff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#111; text-shadow:0 1px 1px #333;border:1px solid #111; width:200px;">
                                   <option value="0">Selecione uma entrada</option>
								<?php  
									$sqlSub = "SELECT * FROM tb_antsubcategoria WHERE id_categoria = ".$id_categoriaFA." and id_subcategoria = ".$id_subcategoriaFA."";
									$qrSub = mysql_query($sqlSub);

									while($dadoSub = mysql_fetch_array($qrSub)){
											$selected = ($dadoSub['id_antsubcategoria'] == $dados['id_antsubcategoria']) ? ' selected="selected"': '';
										?>
									<option value = "<?=$dadoSub['id_antsubcategoria'];?>" <?=$selected;?> ><?=$dadoSub['antsubcategoria'];?></option>
								<? }?>
						</select>
				  </div>
                  <div class="field">
						<label>Traje:</label>
<select name="id_antantsubcategoria"  style="background-color:#fff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#111; text-shadow:0 1px 1px #333;border:1px solid #111; width:200px;">
                                <option value="0">Selecione um tipo de traje</option>
								<?php  
									$sqlSub = "SELECT * FROM tb_antantsubcategoria WHERE id_categoria = ".$id_categoriaFA." and id_subcategoria = ".$id_subcategoriaFA." and id_antsubcategoria = ".$id_antsubcategoriaFA."";
									$qrSub = mysql_query($sqlSub);

									while($dadoSub = mysql_fetch_array($qrSub)){
											$selected = ($dadoSub['id_antantsubcategoria'] == $dados['id_antantsubcategoria']) ? ' selected="selected"': '';
										?>
									<option value = "<?=$dadoSub['id_antantsubcategoria'];?>" <?=$selected;?> ><?=$dadoSub['antantsubcategoria'];?></option>
								<? }?>
					</select>
				  </div>
                  <div class="field">
						<label>Estado:</label>
					<select name="estado" style="background-color:#fff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#111; text-shadow:0 1px 1px #333;border:1px solid #111; width:200px;">
                <option value="">Escolha um estado</option>
                <?php
                    $sql = "SELECT * FROM tb_estados ORDER BY nome ASC";
                    $qr = mysql_query($sql) or die (mysql_error());
                    if(mysql_num_rows($qr) <= '0'){
                        echo '<option value="0">Nenhum estado selecionado</option>';
                    }else
                    while($ln = mysql_fetch_assoc($qr)){
                        $id = $ln['id'];
                        $nome = $ln['nome'];
                        if($ln['id'] == $dados['id_estado']){
                            $selecionado = 'selected = "selected"';
                        }else{$selecionado = "";}	
                        
                        echo '<option value="'.$id.'" '.$selecionado.'>'.utf8_encode($nome).'</option>';
                    }
                ?>
                </select>
				  </div>
                  <div class="field">
						<label>Cidade:</label>
<select name="cidade" style="background-color:#fff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#111; text-shadow:0 1px 1px #333;border:1px solid #111; width:200px;">
							<?php $sqlCi = "SELECT * FROM tb_cidades WHERE estado = '".$dados['id_estado']."'";
                            $rsCi = mysql_query($sqlCi) or die(mysql_error());
                            while($dadosCi = mysql_fetch_array($rsCi)){
                                if($dadosCi['id'] == $dados['id_cidade']){
                                    $selected = 'selected = "selected"';
                                }else{
                                    $selected = '';
                                }
                
                            ?>
                            <option value="<?=$dadosCi['id'];?>" <?=$selected;?>><?=$dadosCi['nome'];?></option>
                            <? } ?>		
                        </select>
				  </div>
                  <div class="field">
						<label>CEP:</label>
					<input class="text" type="text" name="cep" id="cep" value="<?=$dados['cep'];?>" />
				  </div>
                  <div class="field">
						<label>Endere&ccedil;o:</label>
					<input type="text" name="endereco" id="endereco" class="text" size="20" value="<?=$dados['endereco'];?>" />
				  </div>
                  <div class="field">
						<label>N:</label>
					<input  onkeypress='return SomenteNumero(event)' type="text" name="numero" id="numero" class="text" value="<?=$dados['numero'];?>" />
				  </div>
                  <div class="field">
						<label>Complemento:</label>
					<input type="text" class="text" name="complemento" id="complemento"value="<?=$dados['complemento'];?>" />
				  </div>
                  <div class="field">
						<label>Bairro:</label>
					<input type="text" class="text" name="bairro" id="bairro" value="<?=$dados['bairro'];?>" />
				  </div>
                  <div class="field">
						<label>Nome da Festa:</label>
					<input type="text" class="text" name="festa" id="festa" value="<?=$dados['festa'];?>" />
				  </div>
                  <div class="field">
						<label>Data:</label>
					<input class="text" name="data" type="text" id="data" value="<?php if(!empty($dados['data'])){echo date('d/m/Y',strtotime($dados['data']));}?>" size="40" />
				  </div>
                  <div class="field">
						<label>Data Fim:</label> 
					<input class="text" name="datafim" type="text" id="datafim" value="<?php if(!empty($dados['datafim'])){echo date('d/m/Y',strtotime($dados['datafim']));}?>" size="40" /><label><small> Caso termine no mesmo dia deixe sem preenchimento.</small></label>
				  </div>
                  <div class="field">
						<label>Hor&aacute;rio de in&iacute;cio:</label>
					<input class="text" name="hora_inicio_festa" type="text" id="hora_inicio_festa" value="<?php echo $dados['horainicio']?>" size="40" />
				  </div>
                  <div class="field">
						<label>Hor&aacute;rio de fim :</label>
					<input class="text" name="hora_fim_festa" type="text" id="hora_fim_festa" value="<?php echo $dados['horafim']?>" size="40" />
				  </div>
                  <label><small> Em caso de d&uacute;vidas deixe o campo em branco!</small></label>
                  <!-- redes sociais -->
                  <div class="field">
						<label>Facebook :</label>
					<input class="text" name="facebook" type="text" id="facebook" value="<?php echo $dados['link1']?>" size="40" />
                    
				  </div>
                  <div class="field">
						<label>Twitter :</label>
					<input class="text" name="twitter" type="text" id="twitter" value="<?php echo $dados['link2']?>" size="40" />
				  </div>
                  <div class="field">
						<label>Orkut :</label>
					<input class="text" name="orkut" type="text" id="orkut" value="<?php echo $dados['link3']?>" size="40" />
				  </div>
                  
                  <!-- redes sociais -->
                  <div class="field">
						<label>V&iacute;deo :</label>
					<input class="text" name="video" type="text" id="video" value="<?php if(isset($dados['link'])){echo "http://www.youtube.com/watch?v=".$dados['link'];}?>" size="40" /><label><small> Nao esque&ccedil;a o http://www</small></label>
				  </div>
                  
<div class="field">
						<label>Imagem:</label>
						<input name="imagem" id="imagem" type="file" value="<?=$dados['imagem'];?>" />
				  </div>
                  <div class="field">
						<label>Insira as palavras para que encontrem sua festa na busca</label>
						<input  class="text" name="tags" type="text" id="tags" value="<?php echo $dados['tags']?>" size="80" />
				  </div>
                  <div class="field">
						<label>Dados da entrada:</label>
						<?php //CODIGO NOVO
							$sBasePath = $_SERVER['PHP_SELF'] ;
							$oFCKeditor = new FCKeditor('valor') ;
							$oFCKeditor->BasePath	= "fckeditor/" ;
							$oFCKeditor->ToolbarSet = "gutanaprod";
							$oFCKeditor->Width = "467";
							$oFCKeditor->Height = "160";
							$oFCKeditor->Value = $dados['entrada'];
							$oFCKeditor->Create();
							?>
				  </div>
                  <div class="field">
						<label>Breve Descri&ccedil;&atilde;o da festa:</label>
						<?php //CODIGO NOVO
							$sBasePath = $_SERVER['PHP_SELF'] ;
							$oFCKeditor = new FCKeditor('descricao') ;
							$oFCKeditor->BasePath	= "fckeditor/" ;
							$oFCKeditor->ToolbarSet = "gutanaprod";
							$oFCKeditor->Width = "467";
							$oFCKeditor->Height = "160";
							$oFCKeditor->Value = $dados['descricao'];
							$oFCKeditor->Create();
							?>
				  </div>
                  <div class="field">
						<label>Detalhe da festas:</label>
                  <?php //CODIGO NOVO
							$sBasePath = $_SERVER['PHP_SELF'] ;
							$oFCKeditor = new FCKeditor('detalhe') ;
							$oFCKeditor->BasePath	= "fckeditor/" ;
							$oFCKeditor->ToolbarSet = "gutanaprod";
							$oFCKeditor->Width = "467";
							$oFCKeditor->Height = "300";
							$oFCKeditor->Value = $dados['detalhe'];
							$oFCKeditor->Create();
							?>
                  </div>
				 
			  <div class="text">
						<input type="image" value="Cadastrar" class="" src="images/enviar.png" style="float: left;">
				  </div>
				</form>
                </div>
            </div>
        
        </div>
        
        