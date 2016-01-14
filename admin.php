<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="./css/admin_css.css" type="text/css">
        <script src="./js/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/admin_js.js"></script>
    </head>
    <body>


        <?php
        include_once './classes/cl_mensagem.php';
        include_once './classes/cl_convidado.php';
        include_once './sistema/sys_mensagem.php';
        include_once './sistema/sys_convidado.php';

        if (isset($_GET['msgLida'])) {
            MensagemRespondida($_GET['msgLida']);
        } else {
            if (isset($_GET['msgRemove'])) {
                DeletarMensagem($_GET['msgRemove']);
            }
        }

        $ListaConvidadosConfirmados = RecuperaTodosConvidados('Where confirmado = 1');
        $ListaConvidadosCancelados = RecuperaTodosConvidados('Where confirmado = 0');
        $ListaConvidadosNaoConfirmados = RecuperaTodosConvidados('Where confirmado = -1');
        $ListaMensagem = RecuperaTodasMensagens();
        ?>

        <div class="container">
            <h2>Administração dos noivos</h2>
            <button type="button" role="group" class="btn btn-default btn-sm" onclick="Reload()"><span class="glyphicon glyphicon-refresh"></span> Atualizar</button>
            <hr class="primary">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#ConvidadosConfirmados">Convidados Confirmados <span class="badge"><?php echo count($ListaConvidadosConfirmados) ?></span></a></li>
                <li><a data-toggle="tab" href="#ConvidadosCancelados">Convidados Cancelados <span class="badge"><?php echo count($ListaConvidadosCancelados) ?></span></a></li>
                <li><a data-toggle="tab" href="#ConvidadosNaoConfirmados">Convidados não Confirmados <span class="badge"><?php echo count($ListaConvidadosNaoConfirmados) ?></span></a></li>
                <li><a data-toggle="tab" href="#Mensagens">Mensagens <span class="badge"><?php echo count($ListaMensagem) ?></span></a></li>
            </ul>

            <div class="tab-content">
                <div id="ConvidadosConfirmados" class="tab-pane fade in active">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Origem</td>
                                    <td>Genero</td>
                                    <td>Data da Confirmação</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($ListaConvidadosConfirmados as &$convidado) {

                                    // Texto coluna "Nome"
                                    $_Nome = $convidado->nome;

                                    // Texto coluna "Familia"
                                    if ($convidado->origem == "R") {
                                        $_Familia = "Noiva";
                                    } else {
                                        $_Familia = "Noivo";
                                    }

                                    // Texto coluna "Adulto"
                                    if ($convidado->genero == 'C') {
                                        $_Genero = "Criança";
                                    } else if ($convidado->genero == 'M') {
                                        $_Genero = "Masculino";
                                    } else {
                                        $_Genero = "Faminino";
                                    }

                                    // Texto coluna "Data Confirmação"
                                    if ($convidado->confirmado) {
                                        $_Data = date('d/m/Y', strtotime($convidado->dataconfirmacao));
                                    } else {
                                        $_Data = "";
                                    }

                                    echo "<tr>" .
                                    "<td>$_Nome</td>" .
                                    "<td>$_Familia</td>" .
                                    "<td>$_Genero</td>" .
                                    "<td>$_Data</td>" .
                                    "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>   
                    </div>
                </div>
                <div id="ConvidadosCancelados" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Origem</td>
                                    <td>Genero</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($ListaConvidadosCancelados as &$convidado) {

                                    // Texto coluna "Nome"
                                    $_Nome = $convidado->nome;

                                    // Texto coluna "Familia"
                                    if ($convidado->origem == "R") {
                                        $_Familia = "Noiva";
                                    } else {
                                        $_Familia = "Noivo";
                                    }

                                    // Texto coluna "Adulto"
                                    if ($convidado->genero == 'C') {
                                        $_Genero = "Criança";
                                    } else if ($convidado->genero == 'M') {
                                        $_Genero = "Masculino";
                                    } else {
                                        $_Genero = "Faminino";
                                    }

                                    echo "<tr>" .
                                    "<td>$_Nome</td>" .
                                    "<td>$_Familia</td>" .
                                    "<td>$_Genero</td>" .
                                    "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>                   </div>
                </div>
                <div id="ConvidadosNaoConfirmados" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Origem</td>
                                    <td>Genero</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($ListaConvidadosNaoConfirmados as &$convidado) {

                                    // Texto coluna "Nome"
                                    $_Nome = $convidado->nome;

                                    // Texto coluna "Familia"
                                    if ($convidado->origem == "R") {
                                        $_Familia = "Noiva";
                                    } else {
                                        $_Familia = "Noivo";
                                    }

                                    // Texto coluna "Adulto"
                                    if ($convidado->genero == 'C') {
                                        $_Genero = "Criança";
                                    } else if ($convidado->genero == 'M') {
                                        $_Genero = "Masculino";
                                    } else {
                                        $_Genero = "Faminino";
                                    }

                                    echo "<tr>" .
                                    "<td>$_Nome</td>" .
                                    "<td>$_Familia</td>" .
                                    "<td>$_Genero</td>" .
                                    "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>                   </div>
                </div>
                <div id="Mensagens" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Opções</td>
                                    <td>Nome</td>
                                    <td>Email</td>
                                    <td>Mensagem</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($ListaMensagem as &$mensagem) {

                                    // Texto coluna "Nome"
                                    $_Id = $mensagem->id;
                                    $_Respondida = $mensagem->respondida;
                                    $_Nome = $mensagem->nome;
                                    $_Email = $mensagem->email;
                                    $_Mensagem = $mensagem->mensagem;

                                    $_Opcoes = '<a href="?msgLida=' . $_Id . '" ><span class="glyphicon glyphicon-eye-open"></span> Lida</a>  <a href="?msgRemove=' . $_Id . '" ><span class="glyphicon glyphicon-trash"></span> Apagar</a>';

                                    $_html = 
                                            "<td>$_Opcoes</td>".
                                            "<td>$_Nome</td>" .
                                            "<td>$_Email</td>" .
                                            "<td>$_Mensagem</td>" ;

                                    if ($_Respondida == true) {
                                        echo "<tr class='msg_lida'>" . $_html . "</tr>";
                                    } else {
                                        echo "<tr class='msg_naolida'>" . $_html . "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
