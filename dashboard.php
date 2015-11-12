<?php
ob_start();
session_start();

include_once './classes/cl_usuario.php';

?>

<html>
    <head>
        <!-- CSS -->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <!-- JS -->

    </head>
    <body>
        <?php
//        $Usuario = unserialize($_SESSION['UsuarioLogado']);
//        echo $Usuario->login;
        ?>
    </body>

</html>


<?php
$Conteudo = ob_get_contents();

ob_end_clean();

$Titulo = "Dashboard";

include_once("master.php");
