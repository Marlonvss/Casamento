<?php

include_once "./repositorio/rp_mensagem.php";
include_once "../repositorio/rp_mensagem.php";

function RecuperaTodasMensagens($Where = NULL) {
    $Lista = _RecuperaTodasMensagens($Where);
    return $Lista;
}

function AddMensagem($Nome,$Mensagem,$Email) {
    $obj = new mensagem();
    
    $obj->nome = $Nome;
    $obj->mensagem = $Mensagem;
    $obj->email = $Email;           
    
    if (!$obj->isValid()){
        throw new Exception('');
    };          
    
    _AddMensagem($obj);
    return void;
}

function MensagemRespondida($id){
    _MensagemRespondida($id);
    return void;
}

function DeletarMensagem($id){
    _DeletarMensagem($id);
    return void;
}