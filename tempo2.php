<?php

//include "conexao/conexao.php";

//$sql_1 = "SELECT * FROM tb_oferta WHERE id_oferta = '".$_POST['oferta']."' ";
//$rs_1 = mysql_query($sql_1);
//$texto_1 = mysql_fetch_array($rs_1,MYSQL_ASSOC);

//$data_inicial = $texto_1['data_oferta'];
//$tempo = $texto_1['tempo_oferta'];
//$data_atual = date('Y-m-d H:i:s');
//print_r($data_inicial);exit;

$data_inicial = "10/01/2012";
$hora_inicial = "10:40:20"; //13:19:40;
$data_final = "30/03/2012";
$hora_final = "10:00:00";
$tempo = "207:10:30";
$data_atual = date('Y-m-d');
$hora_atual = date('H:i:s');
//08
//

 
 
 					//separando data dia mes e ano data inicial
 
 					$data_inicial_explode = explode("/", $data_inicial);	
					$dia_inicial = $data_inicial_explode[0];
					$mes_inicial = $data_inicial_explode[1];
					$ano_inicial = $data_inicial_explode[2];
					
				
 					//separando data dia mes e ano data final
 
 					$data_final_explode = explode("/", $data_final);	
					$dia_final = $data_final_explode[0];
					$mes_final = $data_final_explode[1];
					$ano_final = $data_final_explode[2];
					
					//separando data dia mes e ano data atual
 
 					$data_atual_explode = explode("-", $data_atual);	
					$ano_atual = $data_atual_explode[0];
					$mes_atual = $data_atual_explode[1];
					$dia_atual = $data_atual_explode[2];
					
					
					//calculando a diferenca entre as datas atual e final
					/*
					$diferenca_dia = $dia_atual - $dia_final; 
					$diferenca_mes = $mes_final -  $mes_atual; 
					$diferenca_ano = $ano_atual - $ano_final; 
					
					echo '<script> alert("diferenca_dia '.$diferenca_dia.'")</script>';
					echo '<script> alert("diferenca_mes '.$diferenca_mes.'")</script>';
					echo '<script> alert("diferenca_ano '.$diferenca_ano.'")</script>';
					*/
					
					//calculando a diferenca entre as datas inicial e final
					
					$diferenca_dia_inicial = $dia_inicial - $dia_final; 
					$diferenca_mes_inicial = $mes_final -  $mes_inicial; 
					$diferenca_ano_inicial = $ano_inicial - $ano_final; 
					
					//transformando para horas
					$dias_para_horas = ($diferenca_dia_inicial * 24);
					$mes_para_horas = (($diferenca_mes_inicial * 30)*24);
					$anos_para_horas = (($diferenca_ano_inicial * 365)*24);
					
					//calculando a diferenca entre as datas inicial e final
					$diferenca_dia_atual = $dia_atual - $dia_final; 
					$diferenca_mes_atual = $mes_final - $mes_atual; 
					$diferenca_ano_atual = $ano_final -  $ano_atual; 
					
					
					
					//calculando total de dias baseado na data atual;
					echo "diferenca_mes_atual: ".$diferenca_mes_atual."<br>";
					$diferenca_mes_atual = $diferenca_mes_atual * 30;
					$total_de_dias_restantes = $diferenca_mes_atual - $diferenca_dia_atual;
					
					
					echo "total_de_dias_restantes: ".$total_de_dias_restantes."<br>";
					
					echo "Dias para horas: ".$total_de_dias_restantes."<br>";
					echo "Mes para horas: ".$diferenca_mes_atual."<br>";
					echo "Anos para horas: ".$diferenca_ano_atual."<br>";
					
					
					//transformando para horas
					$dias_para_horas_atual = ($total_de_dias_restantes * 24);
					//$dias_para_horas_atual = ($diferenca_dia_atual * 24);
					//$mes_para_horas_atual = (($diferenca_mes_atual * 30)*24);
					//$anos_para_horas_atual = (($diferenca_ano_atual * 365)*24);
					
					//$valor_horas = $diferenca_dia_inicial + (($diferenca_mes_inicial * 30)*24);
					
					
					
					
					echo "Tempo restante para o fim do evento: ".$diferenca_dia_inicial." dias ".$diferenca_mes_inicial." meses ".$diferenca_ano_inicial." anos <br>";
					echo "Dias para horas: ".$dias_para_horas_atual."<br>";
					echo "Mes para horas: ".$mes_para_horas_atual."<br>";
					echo "Anos para horas: ".$anos_para_horas_atual."<br>";
					
					
 
//separando hora minuto e segundo hora inicial

$hora_inicial_explode = explode(':',$hora_inicial);
$hora = $hora_inicial_explode[0];
$minuto = $hora_inicial_explode[1];
$segundo = $hora_inicial_explode[2];




//separando hora minuto e segundo hora atual

$hora_atual_explode = explode(':',$hora_atual);
$hora_atual = $hora_atual_explode[0];
$minuto_atual = $hora_atual_explode[1];
$segundo_atual = $hora_atual_explode[2];


//separando hora minuto e segundo

$hora_final_explode = explode(':',$hora_final);
$hora_final = $hora_final_explode[0];
$minuto_final = $hora_final_explode[1];
$segundo_final = $hora_final_explode[2];





// calculo com hora inicial
$diferenca_hora = 24 - $hora;
$diferenca_minutos = $minuto - 00;
$diferenca_segundos = $segundo - 00;

if($diferenca_minutos > 0){
	
		  
		$pega_minutos = 60 - $diferenca_minutos ;
		
		$diferenca_hora = $diferenca_hora - 1;
		
		 if($diferenca_segundos > 0){
			 
			 $pega_segundos = 60 - $diferenca_segundos;
			 $pega_minutos = $pega_minutos - 1;
			 $diferenca_segundos = $pega_segundos;
			 
			 } 
		$diferenca_minutos = $pega_minutos;
		
		
		
		   
		 
		  }
		  echo "Tempo restante para o fim do evento: ".$diferenca_hora." horas ".$diferenca_minutos." minutos ".$diferenca_segundos." segundos <br>";
		  
		  //calculo com hora atual  10:20:30
		  
$diferenca_hora_c_atual = 24 - $hora_atual;
$diferenca_minutos_c_atual = $minuto_atual - 00;
$diferenca_segundos_c_atual = $segundo_atual - 00;
if($minuto_atual > 0){
$diferenca_minutos_c_atual = 60 - $minuto_atual;
$diferenca_hora_c_atual =  $diferenca_hora_c_atual - 1;
if($segundo_atual > 0){$diferenca_segundos_c_atual = 60 - $segundo_atual;}else{$diferenca_segundos_c_atual = $segundo_atual - 00;}
}

echo "diferenca hora com atual ".$diferenca_hora_c_atual."<br>";
echo "diferenca minuto com atual ".$diferenca_minutos_c_atual."<br>";
echo "diferenca segundo com atual ".$diferenca_segundos_c_atual."<br>";

//hora atual diferenca 13
//minuto atual diferenca 40
//minuto atual diferenca 30


 

if($diferenca_minutos_c_atual > 0){
	
		  
		$pega_minutos_atual = 60 - $diferenca_minutos_c_atual  ;
		
		$diferenca_hora_c_atual = $diferenca_hora_c_atual - 1;
		
		 if($diferenca_segundos_c_atual > 0){
			
			 $pega_segundos_atual = 60 - $diferenca_segundos_c_atual;
			 $pega_minutos_atual = $pega_minutos_atual - 1;
			 $diferenca_segundos_atual = $pega_segundos_atual;
			 
			 } 
		$diferenca_minutos_c_atual = $pega_minutos_atual;
		
		
		   
		
		  }
		  echo "Tempo restante para o fim do evento: ".$diferenca_hora_c_atual." horas ".$diferenca_minutos_c_atual." minutos ".$diferenca_segundos_c_atual." segundos <br>";
		  
		  //total de horas
					$total_de_horas = $dias_para_horas + $mes_para_horas + $anos_para_horas + $diferenca_hora_c_atual + $hora_final - 48;
					$total_de_minutos = $minuto_final + $diferenca_minutos_c_atual;
					$total_de_segundos =  $segundo_final + $diferenca_segundos_c_atual;
					 echo "Tempo total restante para o fim do evento: ".$total_de_horas." horas ".$total_de_minutos." minutos ".$total_de_segundos." segundos <br>";
//adicionando ao calculo meses com 31 dias;						
for($i = $mes_atual; $i <= $mes_final; $i++){
	if($i = 3 or $i = 4 or $i = 5){
	$quantidade_acrescentar = $quantidade_acrescentar + 1;}}
	$quantidade_acrescentar = $quantidade_acrescentar * 24;
 //total de horas
 
 $total_de_horas = $dias_para_horas_atual + $mes_para_horas_atual + $anos_para_horas_atual + $diferenca_hora_c_atual + $hora_final - 48 + $quantidade_acrescentar;
					$total_de_minutos = $minuto_final + $diferenca_minutos_c_atual;
					$total_de_segundos =  $segundo_final + $diferenca_segundos_c_atual;
					$total_de_dias = $total_de_horas / 24;
 if($total_de_horas > 24){
	 $total_de_dias = $total_de_horas / 24;
	 
	 //separando hora minuto e segundo


$dias_total_explode = explode(".", $total_de_dias);	
					$total_de_dias_parte1 = $dias_total_explode[0];
					

	 $sobras_horas = $total_de_dias_parte1 * 24;
	 $horas_restantes = $total_de_horas - $sobras_horas;
	 
	 
	  echo "Tempo total restante para o fim do evento: ".$total_de_dias_parte1."  ". $total_de_dias." <br>";
	 
	  echo "Tempo total restante para o fim do evento: ".$total_de_dias_parte1."  Dias  ".$horas_restantes." Horas ".$total_de_minutos." Minutos ".$total_de_segundos." Segundos - Total de Horas - ".$total_de_horas." Horas  <br>"; 
	 // $data_certa = ".$horas_restantes:".$total_de_minutos.":$total_de_segundos;
	 // echo "datacerta: ".$data_certa."<br>"; 
	  
	 }elseif($total_de_dias_parte1 > 30){
		 
		 
		 $total_de_meses = $total_de_dias_parte1 /30;
		 
		 $meses_total_explode = explode(".", $total_de_meses);	
					$total_de_meses_parte1 = $meses_total_explode[0];
		 
		 $sobras_meses = $total_de_meses_parte1 * 30;
		 $meses_restantes =  $total_de_dias_parte1 -  $sobras_meses;
		 
		 
		 
		 
		   echo "Tempo total restante para o fim do evento: ".$total_de_meses_parte1." Meses ".$meses_restantes."  Dias  ".$horas_restantes." Horas ".$total_de_minutos." Minutos ".$total_de_segundos." Segundos - Total de Horas - ".$total_de_horas." Horas  <br>"; 
		 
		 
		 
		 
		 }else{
					
					 echo "Tempo total restante para o fim do evento: ".$total_de_horas." horas ".$total_de_minutos." minutos ".$total_de_segundos." segundos <br>";
	 }






?>
<!-- RELOGIO - antigo -->
<script type="text/javascript">
function atualizaContador(YY,MM,DD,HH,MI,saida) {
	var SS = 00;
	var hoje = new Date();
	var futuro = new Date(YY,MM-1,DD,HH,MI,SS);

	var ss = parseInt((futuro - hoje) / 1000);
	var mm = parseInt(ss / 60);
	var hh = parseInt(mm / 60);
	var dd = parseInt(hh / 24);

	ss = ss - (mm * 60);
	mm = mm - (hh * 60);
	hh = hh - (dd * 24);

	var faltam = '';
	faltam += (dd && dd > 1) ? dd+' dias, ' : (dd==1 ? '1 dia, ' : '');
	faltam += (toString(hh).length) ? hh+':' : '';
	faltam += (toString(mm).length) ? mm+':' : '';
	faltam += ss;

	var hora = (toString(hh).length) ? hh : '';
	var minuto = (toString(mm).length) ? mm : '';

	if (dd+hh+mm+ss > 0) {
		document.getElementById("timeremh").innerHTML = hora;
		document.getElementById("timeremm").innerHTML = minuto;
		document.getElementById("timerems").innerHTML = ss;

		setTimeout(function(){atualizaContador(YY,MM,DD,HH,MI,saida)},1000);
	} else {

		document.getElementById("timeremh").innerHTML = "00";
		document.getElementById("timeremm").innerHTML = "00";
		document.getElementById("timerems").innerHTML = "00";
		setTimeout(function(){atualizaContador(YY,MM,DD,HH,MI,saida)},1000);

		// Inicio do espaço verifica fim da oferta

			var id = <?=$dadosP['id_oferta']?>

			$.post('status.php',{id: id},function(data){
				if(data=='s'){
					//cod finalizando a transacao inner html
					document.getElementById('local_finalizado').innerHTML = '';
				}else{
					// caso nao finalize;
				}
			});

		//fim do espaço verifica fim da oferta

	}
}
function atualizaHora(oferta){

	//$.post("tempo.php", { oferta: oferta } , function(data){
		//alert(data);
		//if(data){
			//var tempo = data.split(':'); 

			//var tempo0 = tempo[0];
			//var tempo1 = tempo[1];
			//var tempo2 = tempo[2];
			
			
			var tempo0 = $horas_restantes;
			var tempo1 = $total_de_minutos;
			var tempo2 = $total_de_segundos;

			//document.getElementById('timeremh').innerHTML = data;
			

			document.getElementById("timeremh").innerHTML = tempo0;
			document.getElementById("timeremm").innerHTML = tempo1;
			document.getElementById("timerems").innerHTML = tempo2;

			if( (tempo[0]==0)&&(tempo[1]==0)&&(tempo[2]==0) ){
				//finaliza compra
				document.getElementById('flash_ativa_compra').style.display = 'none';
				document.getElementById('flash_ativa_compra2').style.display = '';
				document.getElementById('barra_leo').style.display = 'none';
				document.getElementById('botao_comprar__').innerHTML = '<img src="images/valor_comprar_.jpg" border="0" />';
			}else{
				if(<?php echo $width;  ?> > 99){
					document.getElementById('flash_ativa_compra').style.display = '';
				}else{
					document.getElementById('flash_ativa_compra').style.display = 'none';
				}
				document.getElementById('flash_ativa_compra2').style.display = 'none';
				document.getElementById('img_botao_comprar__').style.display = '';
				if(<?php echo $width;  ?> > 99){
					document.getElementById('barra_leo').style.display = 'none';
				}else{
					document.getElementById('barra_leo').style.display = '';
				}
			}
		}
	});

	setTimeout(function(){atualizaHora(oferta)},1000);
}
window.onload=function(){
	atualizaHora('<?=$ultima?>');
}
</script>
