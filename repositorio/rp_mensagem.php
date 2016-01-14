<?php

error_reporting(E_ERROR);

include_once "../conexao.php";
include_once "../classes/cl_mensagem.php";
include_once "./conexao.php";
include_once "./classes/cl_mensagem.php";


// Conecta com Banco (Funcao padrao)
Conecta();

function _RecuperaTodasMensagens($Where = NULL) {


    $strsql = 'select id, nome, mensagem, email, respondida from mensagens ' . $Where;
    $rs = mysql_query($strsql);

    // Cria ARRAY
    $lstMensagens = array();
    $i = 0;

    // Loop pelo RecordSet
    while ($row = mysql_fetch_array($rs)) {

        $Mensagem = new mensagem();

        $Mensagem->id = $row['id'];
        $Mensagem->nome = $row['nome'];
        $Mensagem->mensagem = $row['mensagem'];
        $Mensagem->email = $row['email'];
        $Mensagem->respondida = $row['respondida'];

        $lstMensagens[$i] = $Mensagem;
        $i++;
    }

    return $lstMensagens;
}

function _AddMensagem($Mensagem){
    $strsql = 'insert into mensagens (nome, mensagem, email) values ("'. $Mensagem->nome .'","'. $Mensagem->mensagem .'","'. $Mensagem->email .'")';
    mysql_query($strsql);
    return void;
}

function _MensagemRespondida($id){
    $strsql = 'update mensagens set respondida = true where id = '. $id;
    mysql_query($strsql);
    return void;
}

function _DeletarMensagem($id){
    $strsql = 'delete from mensagens where id = '. $id;
    mysql_query($strsql);
    return void;
}