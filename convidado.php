<?php

error_reporting(E_ERROR);

ob_start();

include_once 'classes/cl_convidado.php';
include_once 'sistema/sys_convidado.php';

$Nav = '<nav><a href="index.php">Home</a> / Convidados</nav>';

if (isset($_GET['confirmar'])) {
    ConfirmarPresenca($_GET['confirmar']);
} else {
    if (isset($_GET['desconfirmar'])) {
        DesConfirmarPresenca($_GET['desconfirmar']);
    } else {
        if (isset($_GET['todos'])) {
            ConfirmarTodos($_GET['todos']);
        }
    }
}
include_once ("./view/list_convidado.php");


// Master page...
$Conteudo = ob_get_contents();
ob_end_clean();
$Titulo = "Usuários";
include_once("master.php");
