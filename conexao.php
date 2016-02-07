<?php

error_reporting(E_ERROR);

function Conecta() {

    if ($_SERVER['HTTP_HOST'] == 'localhost') {

        // Configuração Local...
        $Host = 'localhost';
        $User = 'root';
        $Pass = '';
        $BD = 'casamento';
        
    } else {

        // Configuração HOSTINGER...
        $Host = 'mysql.hostinger.com.br';
        $User = 'u812671016_casam';
        $Pass = 'casamento';
        $BD = 'u812671016_casam';
        
    }

    $connect = mysql_connect($Host, $User, $Pass) or die(mysql_error());
    $db = mysql_select_db($BD) or die(mysql_error());

    return $connect;
}
