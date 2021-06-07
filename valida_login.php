<?php
session_start();

	if (!isset($_SESSION[cliente][ID]) || !isset($_SESSION[cliente][EMAIL])){
		echo '<script> alert("Usuario deslogado efetue login ou clique em nao possuo conta !");</script>';
					echo "<script>document.location='index.php?pagina=form_login'</script>";
	}
?>