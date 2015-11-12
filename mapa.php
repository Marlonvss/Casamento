<?php

error_reporting(E_ERROR);

ob_start();

$Nav = '<nav><a href="index.php">Home</a> / Mapa</nav>';
?>
<div id="mapa">
</div>
<?php

// Master page...
$Conteudo = ob_get_contents();
ob_end_clean();
$Titulo = "Usuários";
include_once("master.php");
