
<?php
$acao = $_GET['acao'];
	$id = $_GET['id_cliente'];
if($acao == "editar"){
	
	$sql = "select * from tb_cliente where id_cliente=".$id;
	
	$result  = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
}
if($acao == "ver"){
			include "valida_login.php";
	$sql = "select * from tb_cliente where id_cliente=".$id;
	
	$result  = mysql_query($sql) or die(mysql_error());
	$linhas = mysql_num_rows($result);
	$dados = mysql_fetch_array($result);
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
			
				$.post("../adm/subcategoria.php",{id_cat:$(this).val()},function(valor){
					$("select[name=id_subcategoria]").html(valor);
			})
	})
		
		$("select[name=id_subcategoria]").change(function(){
														  $("select[name=id_antsubcategoria]").html('<option value="0"> Aguarde Carregando... </option>');
			$.post("../adm/antsubcategoria.php",{id_subcategoria:$(this).val()},function(valor){
			$("select[name=id_antsubcategoria]").html(valor);
			
			})
	})
		$("select[name=id_antsubcategoria]").change(function(){
														  $("select[name=id_antantsubcategoria]").html('<option value="0"> Aguarde Carregando... </option>');
			$.post("../adm/antantsubcategoria.php",{id_antsubcategoria:$(this).val()},function(valor){
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
		with(document.formCadastro)
		{
			if (nome.value==''){
				alert("Digite seu nome!");
				nome.focus();
				return false;
			}
			if (email.value==''){
				alert("Digite seu e-mail!");
				email.focus();
				return false;
			}
			var obj = eval("document.formCadastro.email");
			var txt = obj.value;
			if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 3)))
			{
				alert('Email inválido');
				obj.focus();
				return false;
			}

			if (sexo.value==''){
				alert("Informe o sexo!");
				sexo.focus();
				return false;
			}
			if (email.value==''){
				alert("Informe um email!");
				email.focus();
				return false;
			}
			if (nascimento.value==''){
				alert("Informe a de nascimento!");
				nascimento.focus();
				return false;
			}

			if (senha.value==''){
				alert("Digite uma senha!");
				senha.focus();
				return false;
			}
			if (senha2.value != senha.value){
				alert("Senhas diferentes!");
				senha2.focus();
				return false;
			}

			if (cep.value==''){
				alert("Digite o cep!");
				cep.focus();
				return false;
			}
			if (endereco.value==''){
				alert("Digite o endereco!");
				endereco.focus();
				return false;
			}
			if (bairro.value==''){
				alert("Digite o bairro!");
				bairro.focus();
				return false;
			}
			if (estado.value==''){
				alert("Escolha o estado!");
				estado.focus();
				return false;
			}
			if (ddd1.value==''){
				alert("Informe o DDD!");
				ddd1.focus();
				return false;
			}
			if (telefone1.value==''){
				alert("Informe um telefone!");
				telefone1.focus();
				return false;
			}
			if (contrato.checked == false){

				alert("Aceite o termo de uso!");
				contrato.focus();
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
//Aplicando mascaras nos inputs do formulario
	$("#nascimento").mask("99/99/9999");
	$("#cep").mask("99.999.999");
	
	$("#cpfcnpj").mask("999.999.999-99");
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
<link href="css/pirobox/pirobox.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/lavalamp_test.css" type="text/css" media="screen">

    <script src="js/slides.min.jquery.js"></script>    
	<script type="text/javascript">
        $(function() {
            $("#1, #2, #3").lavaLamp({
                fx: "backout",
                speed: 700,
                click: function(event, menuItem) {
                    return true;
                }
            });
        });

		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'images/slide/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});

	$(document).ready(function(){
		//Definimos que todos as tags dd terão display:none menos o primeiro filho
		$('dd:not(:first)').hide();
		//Ao clicar no link, executamos a funcao
		$('dt a').click(function(){
			//As tags dd's visíveis agora ficam com display:none
			$("dd:visible").slideUp("fast");
			//Apos, a funcao é transferida para seu pai, que procura o proximo irmao no codigo o tonando visível
			$(this).parent().next().slideDown("fast");
			return false;
		});
	});

$(document).ready(function() {
	$().piroBox_ext({
	piro_speed : 700,
		bg_alpha : 0.3,
		piro_scroll : true // pirobox always positioned at the center of the page
	});
});
</script>
<script type="text/javascript">

$(document).ready(function(){
	
//Aplicando mascaras nos inputs do formulario
	$("#nascimento").mask("99/99/9999");
	$("#cep").mask("99.999.999");
	
	$("#cpfcnpj").mask("999.999.999-99");
})
</script> 
<script src="js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript">

	 jQuery(function($){
	 $("#nascimento").mask("99/99/9999");
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
            <div id="iten_meio_conteudo3" class="iten_meio_conteudo3">&nbsp;</div>
                <div class="iten_meio_conteudo_barra_festas">&nbsp;
                </div>
                <div id="iten_meio_conteudo_festas" class="iten_meio_conteudo_festas">&nbsp;
                <?php 
				$acao = sqlinj($_REQUEST[acao]);
				if($acao == "editar" or $acao == "cadastrar"){?>
                <div class="center-forms" style="margin-left:20px;">
  <form  onSubmit="return valida()" id="formCadastro" name="formCadastro" action="acao_cliente.php?acao=<?php if($acao=="editar"){echo "editar";}else{echo "cadastrar";}?>" method="post" class="im-account-form" enctype="multipart/form-data">
					<h2>Formulario de Cadastro.</h2>
				<div class="field">
                	<input type="hidden" name="id_cliente" id="id_cliente" value="<?=$_SESSION[cliente][ID]?>" />
                  <div class="field">
                       <div style="float:left">
                       <label>Pessoa Fisica</label>
                       <input id="radio" type="radio" name="tipopessoa" value="F" checked="checked" />
                       </div>
                       <div style="float:left; margin-left:10px;">
                       <label>Pessoa Juridica</label>
                       <input id="radio" type="radio" name="tipopessoa" value="J" />
                       </div>
				  </div>
                  <div style="clear:both"></div>
                  <div class="field">
						<label>Imagem:</label>
						<input name="imagem" class="text" id="imagem" type="file"  value="<?=$dados['imagem'];?>" />
				  </div>
                  <br />
                  <div class="field">
						<label>Nome :</label>
						<input type="text" name="nome"  class="text" id="nome" value="<?=$dados['nome'];?>"/>
				  </div>
                  <br />
                  <div class="field">
						<label>Sobrenome:</label>
						<input type="text" name="sobrenome" class="text" id="sobrenome" value="<?=$dados['sobrenome'];?>"/>
				  </div>
                  <br />
                  <div class="field">
						<label>CPF/CNPJ:</label>
						<input type="text" name="cpfcnpj" id="cpfcnpj" class="text" value="<?=$dados['cpfcnpj'];?>" />
				  </div>
                  <br />
                  <div class="field">
						<label>Data de nascimento*:</label>
					<input type="text" name="nascimento" id="nascimento" class="text" value="<?php if(!empty($dados['nascimento'])){echo date('d/m/Y',strtotime($dados['nascimento']));}?>"/>
				  </div>
                  <br />
                  <div class="field">
						<label>E-mail*:</label>
						<input type="text" name="email" class="text" id="email" value="<?=$dados['email'];?>"/>
				  </div>
                  <br />
                  <div class="field">
						<label>Sexo:</label>
						<select name="sexo" style="background-color:00deff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#F30; text-shadow:0 1px 1px #333;border:1px solid #F30; width:200px;">
                            <option selected="selected" value="">Selecione o Sexo</option>
                            <option <?php if($dados['sexo'] == "M"){?>selected="selected"<?php } ?>  value="M">Masculino</option>
                            <option  <?php if($dados['sexo'] == "F"){?>selected="selected"<?php } ?> value="F">Feminino</option>
        				</select>
				  </div>
                  <br />
                  <div class="field">
						<label>Login*:</label>
						<input type="text" name="login" id="login" class="text" value="<?=$dados['login'];?>"/>
				  </div>
                  <br />
                  <div class="field">
						<label>Senha:</label>
						<input type="password" name="senha" class="text" id="senha" value="" size="20"/>
				  </div>
                  <br />
                  <div class="field">
						<label>Repetir senha:</label>
						<input type="password" name="senha2" id="senha2" class="text" value="" size="20"/>
				  </div>
                  <br />
                  <h2>Dados do Endere&ccedil;o.</h2>
                  <div class="field">
                  <label>Estado:</label>
					<select name="estado" style="background-color:00deff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#F30; text-shadow:0 1px 1px #333;border:1px solid #F30; width:200px;">
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
                 <br />
                 <div class="field">
						<label>Cidade:</label>
<select name="cidade" style="background-color:00deff; font-size:1em;
	font-weight:bold; text-decoration:none; color:#F30; text-shadow:0 1px 1px #333;border:1px solid #F30; width:200px;">
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
                  <br />
             	 <div class="field">
					<label>CEP:</label>
					<input type="text" name="cep" id="cep" class="text" value="<?=$dados['cep'];?>" />
				  </div>
                  <br />
                  <div class="field">
                       <label>Endere&ccedil;o:</label>
                       <input type="text" name="endereco" id="endereco" class="text" size="20" value="<?=$dados['endereco'];?>" />
</div>
<br />
                  <div class="field">
						<label>N:</label>
					<input  onkeypress='return SomenteNumero(event)' type="text" name="numero" id="numero" class="text" value="<?=$dados['numero'];?>" />
				  </div>
                  <br />
                  <div class="field">
						<label>Complemento:</label>
						<input type="text" class="text" name="complemento" id="complemento"value="<?=$dados['complemento'];?>" />
				  </div>
                  <br />
                  <div class="field">
						<label>Bairro:</label>
						<input type="text" class="text" name="bairro" id="bairro" value="<?=$dados['bairro'];?>" />
				  </div>
                  <br />
                  <div class="field">
				    <label>Telefone 1:</label>
					<input type="text"  class="text" name = "ddd1" id="ddd1" style="width:30px;" maxlength="2" value="<?=$dados['ddd1'];?>"/><input style="margin-left:5px; width:195px;"  class="text" type="text" name = "telefone1" id="telefone1" value="<?=$dados['telefone1'];?>" />
				  </div>
                  <br />
                  
                  <div class="field">
				    <label>Telefone 2:</label>
					<input type="text" class="text" name = "ddd2" id="ddd2" style="width:30px;" maxlength="2" value="<?=$dados['ddd2'];?>" /><input style="margin-left:5px; width:195px;" class="text" type="text" name = "telefone2" id="telefone2" value="<?=$dados['telefone2'];?>" />
				  </div>
                  <br />
                  <div class="field">
						<label>Newslatter:</label>
                        <input type="radio" name="newslatter" id="radio" value="S" <?php echo ($dados['newslatter']=='S')? "checked=\"checked\"":"" ?>/>
									SIM 
									<input type="radio" name="newslatter" id="radio" value="N" <?if($acao != "editar"){echo 'checked="checked"';}?> <?php echo ($dados['newslatter']=='N')? "checked=\"checked\"":"" ?>/>
				  N&Atilde;O </div>
<div class="field">
                   <?php   $sql = mysql_query("select * from tb_termocontrato");
	$linhas = mysql_num_rows($sql);
	$dadosc = mysql_fetch_array($sql);                        ?>
						<label><a href="http://docs.google.com/gview?url=http://www.baladitas.com.br/pdf/<?php echo $dadosc['texto']?>&embedded=true" rel="iframe-930-500"  class="pirobox_gall1" title="">Termos de Contrato</a></label>
					<input type="checkbox" name="contrato" id="contrato" value=""/>
                    &nbsp;Li e concordo com os termos do contrato
				  </div>
				  
<div class="field">
						<input type="image" value="Cadastrar" class="" src="images/entrar.png" style="float: left;">
				  </div>
                  <br />
				</form>
                </div>
                
            </div>
      
        <?php }elseif($acao == "ver") {?>
        <?php 
			include "valida_login.php";
		?>  
        <div id="geral_minha_conta">
            <h2>Minha Conta.</h2>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Imagem:</div>
                 <div class="minha_conta_dados"><?php echo $dados['imagem'];?><img src="cliente/t/<?=$dados['imagem']?>" width="100" height="80" name="festa" id="festa" border="none" title="<?php echo $dados['login']?>"/></div>            
            </div>
        	<div id="minha_conta">
                 <div class="minha_conta_nome">Nome:</div>
                 <div class="minha_conta_dados"><?php echo $dados['nome'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Sobrenome:</div>
                 <div class="minha_conta_dados"><?php echo $dados['sobrenome'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Email:</div>
                 <div class="minha_conta_dados"><?php echo $dados['email'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Nascimento:</div>
                 <div class="minha_conta_dados"><?php echo $dados['nascimento'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Sexo:</div>
                 <div class="minha_conta_dados"><?php echo $dados['sexo'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Login:</div>
                 <div class="minha_conta_dados"><?php echo $dados['login'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Cep:</div>
                 <div class="minha_conta_dados"><?php echo $dados['cep'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Endere&ccedil;o:</div>
                 <div class="minha_conta_dados"><?php echo $dados['endereco'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">N&ordm;:</div>
                 <div class="minha_conta_dados"><?php echo $dados['numero'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Complemento:</div>
                 <div class="minha_conta_dados"><?php echo $dados['complemento'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Bairro:</div>
                 <div class="minha_conta_dados"><?php echo $dados['bairro'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Telefone 01: </div>
                 <div class="minha_conta_dados">(<?php echo $dados['ddd1'];?>) <?php echo  $dados['telefone1'];?></div>            
            </div>
            <div id="minha_conta">
                 <div class="minha_conta_nome">Telefone 02: </div>
                 <div class="minha_conta_dados">(<?php echo $dados['ddd2'];?>) <?php echo  $dados['telefone2'];?></div>            
            </div>
        </div> 
        <div style="clear:both"></div>  
        <div id="bt_editar">
                 <div class="minha_conta_bt_editar" ><a href="index.php?id=3&pagina=form_cadastro_user1&acao=editar&id_cliente=<?=$_SESSION[cliente][ID]?>"><img src="images/editar.png" width="59" height="16" alt="Editar" /></a></div>
        </div> 
        <?php } ?>
        </div>
        </div>
        
        
        