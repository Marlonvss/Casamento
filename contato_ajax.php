<?php

include_once './sistema/sys_mensagem.php';
include_once './classes/cl_mensagem.php';

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == "AddMensagem") {

    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    }
    if (isset($_POST['mensagem'])) {
        $mensagem = $_POST['mensagem'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    try {
        AddMensagem($nome, $mensagem, $email);
        echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sua mensagem foi enviada com sucesso!</strong> </div>';
    } catch (Exception $ex) {
        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Ocorreu uma falha ao enviar mensagem!</strong></div>';
    }
}