<?php

include_once "./repositorio/rp_convidado.php";
include_once "../repositorio/rp_convidado.php";

function RecuperaTodosConvidados($Where = NULL) {
    $Lista = _RecuperaTodosConvidados($Where);
    return $Lista;
}

function ConfirmarPresenca($id) {
    _ConfirmarPresenca($id);
    return void;
}

function DesConfirmarPresenca($id) {
    _DesConfirmarPresenca($id);
    return void;
}

function ConfirmarTodos($convite) {
    _ConfirmarTodos($convite);
    return void;
}
