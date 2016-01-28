<?php
error_reporting(E_ERROR);

include_once "../conexao.php";
include_once "../model/model_convite.php";
include_once "./conexao.php";
include_once "./model/model_convite.php";
Conecta();

function _GetConvite($Id) {

    $strsql = 'select id, familia, codigo from convites where id = ' . $Id;
    $rs = mysql_query($strsql);

    while ($row = mysql_fetch_array($rs)) {
        $obj = new convite($row['id'], $row['familia']);
        break;
    }
    return $obj;
}

function _GetConvites($Where = NULL) {


    $strsql = 'select id, familia, codigo from convites ' . $Where . ' order by id ';;
    $rs = mysql_query($strsql);

    $lst = array();
    $i = 0;

    while ($row = mysql_fetch_array($rs)) {
        $obj = new convite($row['id'], $row['familia']);
        $lst[$i] = $obj;
        $i++;
    }
    return $lst;
}

function _AddConvite($Convite) {
    $strsql = 'insert into convites ( familia, codigo ) '
            . 'values ("' . $Convite->familia . '", "' . $Convite->codigo . '")';

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        $Convite->id = mysql_insert_id();;
        return '';
    }
}

function _UpdateConvite($Convite) {
    $strsql = 'update convites '
            . '   set familia = "' . $Convite->familia . '",'
            . '   set codigo = "' . $Convite->codigo . '"'
            . ' where id = ' . $Convite->id;

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}

function _DeleteConvite($Convite) {
    $strsql = 'delete '
            . '  from convites '
            . ' where id = ' . $Convite->id;

    if (!mysql_query($strsql)) {
        return mysql_error();
    } else {
        return '';
    }
}
