<?php

error_reporting(E_ERROR);

include_once "../conexao.php";
include_once "../classes/cl_convidado.php";
include_once "./conexao.php";
include_once "./classes/cl_convidado.php";


// Conecta com Banco (Funcao padrao)
Conecta();

function _RecuperaTodosConvidados($Where = NULL) {


    $strsql = 'select id, convite, nome, familia, sexo, adulto, confirmado, dataconfirmacao from convidados ' . $Where;
    $rs = mysql_query($strsql);

    // Cria ARRAY
    $lstConvidados = array();
    $i = 0;

    // Loop pelo RecordSet
    while ($row = mysql_fetch_array($rs)) {

        $Convidado = new usuarios();

        $Convidado->id = $row['id'];
        $Convidado->convite = $row['convite'];
        $Convidado->nome = $row['nome'];
        $Convidado->familia = $row['familia'];
        $Convidado->sexo = $row['sexo'];
        $Convidado->adulto = $row['adulto'];
        $Convidado->confirmado = $row['confirmado'];
        $Convidado->dataconfirmacao = $row['dataconfirmacao'];

        $lstConvidados[$i] = $Convidado;
        $i++;
    }

    return $lstConvidados;
}

function _ConfirmarPresenca($id){
    $strsql = 'update convidados set confirmado = true, dataconfirmacao = current_date where id = '.$id;
    $rs = mysql_query($strsql);
    return void;
}

function _ConfirmarTodos($convite){
    $strsql = 'update convidados set confirmado = true, dataconfirmacao = current_date where not confirmado and convite = '.$convite;
    $rs = mysql_query($strsql);
    return void;
}

function _DesConfirmarPresenca($id){
    $strsql = 'update convidados set confirmado = false, dataconfirmacao = null where id = '.$id;
    $rs = mysql_query($strsql);
    return void;
}