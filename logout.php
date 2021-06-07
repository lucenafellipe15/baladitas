<?php 
//session_start();
//destruindo a sessao
if(isset($_GET['kill']) && $_GET['kill'] == 'sair'){

	session_regenerate_id();
	unset($_SESSION[cliente]);
	unset($_SESSION[carrinho]);
	session_destroy();
	 echo '<script>window.location="index.php?pagina=home"</script>';
	  echo '<script> alert("Saindo");</script>';
		
}


?>