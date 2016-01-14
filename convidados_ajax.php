<?php

include_once './sistema/sys_convidado.php';
include_once './classes/cl_convidado.php';

if (isset($_POST['metodo'])) {
    $metodo = $_POST['metodo'];
}

if ($metodo == "RecuperaConvidados") {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    echo json_encode(RecuperaTodosConvidados("where convite = $id"));
}
if ($metodo == "ConfirmarUsuario") {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    try{
        ConfirmarPresenca($id);
        echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Confirmação gravada com sucesso!</strong> </div>';
    } catch (Exception $ex) {
        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Ocorreu uma falha ao confirmar sua presença!</strong> </div>';
    }
}

if ($metodo == "DesconfirmarUsuario") {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    try{
        DesConfirmarPresenca($id);
        echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Cancelamento gravado com sucesso!</strong> </div>';
    } catch (Exception $ex) {
        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Ocorreu uma falha ao cancelar sua presença!</strong> </div>';
    }
    
}