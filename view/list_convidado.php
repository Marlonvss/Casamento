<?php
include_once '../classes/cl_convidado.php';
include_once '../sistema/sys_convidado.php';
include_once './classes/cl_convidado.php';
include_once './sistema/sys_convidado.php';

session_start();

if (isset($_SESSION['convite'])) {
    $convite = $_SESSION['convite'];
} else {
    if (isset($_POST['convite'])) {
        $_SESSION['convite'] = $_POST['convite'];
        $convite = $_POST['convite'];
    }
}
?>
<div id="ListaConvidados">
    <label><?php echo "<a href='?todos=$convite'>Confirmar todos</a>"; ?></label>
    <label><strong>Obs:</strong> Qualquer informação incorreta, favor, comunicar aos noivos ou a cerimonialista.</label>
    <form method="POST" action="">
        <div class="grupo">
            <h2></h2>
            <?php echo "<h2>Lista de Convidados</h2>"; ?>

            <table cellspacing="0" cellpadding="0">
                <tr class="cabecalho">
                    <td>Nome</td>
                    <td>Familia</td>
                    <td>Adulto</td>
                    <td>Sexo</td>
                    <td>Data da Confirmação</td>
                    <td>Confirmado</td>
                    <td>Confirmar/Desconfirmar</td>
                </tr>
                <?php
                // Recupera Todos Convidados
                if ($UserAdmin) {
                    $ArrayConvidados = RecuperaTodosConvidados();
                } else {
                    $ArrayConvidados = RecuperaTodosConvidados("where convite = $convite");
                }


                foreach ($ArrayConvidados as &$convidado) {

                    // Texto coluna "Nome"
                    $_Nome = $convidado->nome;

                    // Texto coluna "Familia"
                    if ($convidado->familia == "R") {
                        $_Familia = "Noiva";
                    } else {
                        $_Familia = "Noivo";
                    }

                    // Texto coluna "Adulto"
                    if ($convidado->adulto) {
                        $_Adulto = "Sim";
                    } else {
                        $_Adulto = "Não";
                    }

                    // Texto coluna "Sexo"
                    if ($convidado->sexo == "M") {
                        $_Sexo = "Masculino";
                    } else {
                        $_Sexo = "Feminino";
                    }

                    // Texto coluna "Data Confirmação"
                    if ($convidado->confirmado) {
                        $_Data = date('d/m/Y', strtotime($convidado->dataconfirmacao));
                    } else {
                        $_Data = "";
                    }


                    // Texto coluna "Confirmado"
                    if ($convidado->confirmado) {
                        $_Confirmado = "Sim";
                    } else {
                        $_Confirmado = "Não";
                    }

                    // Texto coluna "Confirmar/Desconfirmar"
                    if ($convidado->confirmado) {
                        $_Link = "<a href='?desconfirmar=$convidado->id'>Desconfirmar</a>";
                    } else {
                        $_Link = "<a href='?confirmar=$convidado->id'>Confirmar</a>";
                    }

                    echo "<tr>" .
                    "<td>$_Nome</td>" .
                    "<td>$_Familia</td>" .
                    "<td>$_Adulto</td>" .
                    "<td>$_Sexo</td>" .
                    "<td>$_Data</td>" .
                    "<td>$_Confirmado</td>" .
                    "<td>$_Link</td>" .
                    "</tr>";
                }
                ?>
            </table>
        </div>
    </form>
</div>
