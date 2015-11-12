<?php
error_reporting(E_ERROR);

function Conecta() {

//    Configuração Local...
    $Host = 'localhost';
    $User = 'root';
    $Pass = '';
    $BD = 'casamento';

//    Configuração HOSTINGER...
//    $Host = 'localhost';
//    $User = 'u812671016_casam';
//    $Pass = 'casamento';
//    $BD = 'u812671016_casam';


    $connect = mysql_connect($Host, $User, $Pass) or die(mysql_error());
    $db = mysql_select_db($BD) or die(mysql_error());

    return $connect;
}
