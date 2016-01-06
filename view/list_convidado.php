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
    <form method="POST" action="">
        <div class="grupo">
            <h2></h2>
            <?php echo "<h2>Lista de Convidados</h2>"; ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data da Confirmação</th>
                        <th>Confirmado</th>
                        <th>Confirmar presença</th>
                    </tr>
                </thead>
                <tbody>
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

                        // Texto coluna "Confirmado"
                        switch ($convidado->confirmado) {
                            case -1:
                                $_Confirmado = "Sem resposta";
                                $_Link = "<a href='?confirmar=$convidado->id'>Sim</a>"."<a href='?desconfirmar=$convidado->id'>Não</a>";
                                $_Data = "";
                                break;
                            case 0:
                                $_Confirmado = "Não";
                                $_Link = "<a href='?confirmar=$convidado->id'>Sim</a>";
                                $_Data = "";
                                break;
                            case 1: 
                                $_Confirmado = "Sim";
                                $_Link = "<a href='?desconfirmar=$convidado->id'>Não</a>";
                                $_Data = date('d/m/Y', strtotime($convidado->dataconfirmacao));
                                break;
                        }

                        echo "<tr>" .
                        "<td>$_Nome</td>" .
                        "<td>$_Data</td>" .
                        "<td>$_Confirmado</td>" .
                        "<td>$_Link</td>" .
                        "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
