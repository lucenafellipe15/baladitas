<?php //error_reporting(0);
include "valida_login.php";
?>
<?php
$acao = sqlinj($_REQUEST[acao]);
if($acao == 'deletar_patrocinador'){
	
	$id_patrocinador = $_GET['id_patrocinador'];
	
	$imagem = $_GET['img'];
	//excluindo a imagem da pasta antes de excluir o patrocinador
	$sql_busca_imagem = mysql_query("select imagem from tb_patrocinador where id_patrocinador=".$id_patrocinador."");
	$dados_busca_imagem = mysql_fetch_array($sql_busca_imagem);
	$imagem = $dados_busca_imagem['imagem'];
	
	
	$sql1 = "select ".$imagem." from tb_patrocinador where id_patrocinador=".$id_patrocinador;
	$result1 = mysql_query($sql1) or die(mysql_error());
	$dados1 = mysql_fetch_array($result1);
	if(file_exists("patrocinador/".$dados1[$imagem])){
		unlink("patrocinador/".$dados1[$imagem]);
		unlink("patrocinador/t/".$dados1[$imagem]);
	}	
	$sql_deleta = mysql_query("delete from tb_patrocinador WHERE id_patrocinador = '".$id_patrocinador."'");
	echo "<script>alert('Patrociandor excluído com sucesso!');history.back(-1)</script>";
}

if($acao == "editar_patrocinador"){
	
	$id_patrocinador = $_GET['id_patrocinador'];
	$sql = "select * from tb_patrocinador where id_patrocinador=".$id_patrocinador."";
	
	$result  		= mysql_query($sql) or die(mysql_error());
	$linhas 		= mysql_num_rows($result);
	$dados 			= mysql_fetch_array($result);
	$id_festaFA = $dados['id_festa'];

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
		with(document.formPatrocinador)

		{	
			if (patrocinador.value==''){
				alert("Informe um nome para festa");
				patrocinador.focus();
				return false;
			}
			if (imagem.value==''){
				alert("Digite uma imagem para a festa!");
				imagem.focus();
				return false;
			} 
		
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
Formatação para qualquer mascara
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
	 $("#hora_inicio_festa").mask("99:99:99");
	 $("#hora_fim_festa").mask("99:99:99");
	 $("#fone").mask("(99) 9999-9999");
	 $("#cpf").mask("999-999-999-99");
	 $("#custom").mask("99999-9/999(99)");
	 $("#cep").mask("99.999-999");
	 });
</script>
<style type="text/css">
.realupload {
	position: relative;
	float: right;
	top: -21px;
	right: 0;
	opacity:0;
	-moz-opacity:0;
	filter:alpha(opacity:0);
	cursor: pointer
}
.fakeupload {
	width: 100%;
	background: url(adm/imagens/btn_selecione.png) no-repeat 99% 51%;
	cursor: default;
        }
</style>
<div id="meio_conteudo" class="meio_conteudo">
            <div id="iten_meio_conteudo3" class="iten_meio_conteudo3">&nbsp;
                <div class="iten_meio_conteudo_barra_festas_patrocinadores_lista">&nbsp;
                </div>
                 <div class="center-forms">
                <form  onSubmit="return valida()" id="formPatrocinador" name="formPatrocinador" action="index.php?pagina=acao_cliente&acao=<?php if($acao=="editar_patrocinador"){echo "editar_patrocinador";}else{echo "cadastrar_patrocinador";}?>" method="post" class="im-account-form" enctype="multipart/form-data">
					<h2>Formulario de Cadastro.</h2>
                    <input type="hidden" name="id_cliente" id="id_cliente" value="<?=$_SESSION[cliente][ID]?>"/>
                    <input type="hidden" name="id_festa" id="id_festa" value="<?=sqlinj($_REQUEST['id_festa'])?>"/>
                    <input type="hidden" name="id_patrocinador" id="id_patrocinador" value="<?=sqlinj($_REQUEST['id_patrocinador'])?>"/>
                  <div class="field">
						<label>Nome do Patrocinador:</label>
					<input type="text" class="text" name="patrocinador" id="patrocinador" value="<?=$dados['patrocinador'];?>" />
				  </div>
                  <div class="field">
						<label>Imagem:</label>
						<input style="background-color: #FFF; border: 1px solid #CCC; letter-spacing: 1px; font-size: 11px; color: #333;padding-left: 0px; padding-top: 5px; padding-bottom: 5px; margin-left: 0px; height: 25px; vertical-align: middle;" id="fakeupload" name="fakeupload" class="fakeupload" type="text" />
			<input id="realupload" name="imagem" class="realupload" type="file" onchange="this.form.fakeupload.value = this.value;" />
				  </div>
			  <div class="text">
						<input type="image" value="Cadastrar" class="" src="images/enviar.png" style="float: left;">
				  </div>
				</form>
                </div>
            </div>
        
        </div>
        
        