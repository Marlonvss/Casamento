<script>
senha = prompt("Senha: ");
if (senha != "MRMM080812"){
	window.location = "index.php";
}
</script>

<?php

error_reporting(E_ERROR);

ob_start();
$UserAdmin = True;
?>
<a href="convidado.php" >Convidados</a><br>

<?php

// Master page...
$Conteudo = ob_get_contents();
ob_end_clean();
$Titulo = "Usuários";
include_once("master.php");
