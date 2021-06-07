<?php

//código que pega todos os posts e gets da pagina e remove o safado

function sqlinj($string){
	$string = strip_tags($string);
	$string = htmlspecialchars($string);
	$string = addslashes($string);
	$string = str_ireplace("SELECT","",$string);
	$string = str_ireplace("FROM","",$string);
	$string = str_ireplace("WHERE","",$string);
	$string = str_ireplace("INSERT","",$string);
	$string = str_ireplace("UPDATE","",$string);
	$string = str_ireplace("DELETE","",$string);
	$string = str_ireplace("DROP","",$string);
	$string = str_ireplace("DATABASE","",$string);
	//$string = str_ireplace("USE","",$string);
	$string = str_ireplace("&amp;","&",$string);
	//$string = str_ireplace("OR","",$string);
	//$string = str_ireplace("../","",$string);
	//$string = str_ireplace("--","",$string);
	//$string = str_ireplace("*","",$string);
	return $string;
}
?>