<?php
error_reporting(E_ERROR);
ob_start();
session_start();
unset($_SESSION['convite']);
$UserAdmin = False;
?>

<!-- Lista de convidados por convite -->
<div class="container" id="confirmarPresenca">
    <h2>Confirme sua presença!</h2>
    <form method="POST" action="convidado.php">

        <label>Número do seu convite: </label>
        <input type="text" name="convite" id="convite" required oninvalid="setCustomValidity('Fala ae Negou! pow, 10 anos de curso! Coloca o nro do convite aí viril, isso padrao!')" onchange="try{setCustomValidity('')}catch(e){}"><br>

        <!-- Botão -->
        <input type="submit" value="Confirmar">
    </form>
</div>
<!-- Mostra o Mapa -->
<div class="container" id="mapa">
    <h2>Não se perca!</h2>
    <div class="bloco">
    <h4>Opção para quem vem do WestShopping</h4>
    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d29402.63691156066!2d-43.56148354696716!3d-22.901210207861478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x94ce514578f18209%3A0x75c3f4b7d337b3f9!2sWest+Shopping+-+Estrada+do+Mendanha+-+Campo+Grande%2C+RJ%2C+Brasil!3m2!1d-22.884636399999998!2d-43.5576393!4m5!1s0x9be0df44d2ab4b%3A0x69738528235fc2bd!2sS%C3%ADtio+Bambuluar+Festas+%26+Eventos+-+R.+C%C3%A2ndida+Rosa%2C+200+-+Campo+Grande%2C+Rio+de+Janeiro+-+RJ%2C+23017-385!3m2!1d-22.918207!2d-43.5210498!5e0!3m2!1spt-BR!2sbr!4v1447308332096" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="bloco">
    <h4>Opção para quem vem do ParkShopping Campo Grande</h4>
    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d34957.929663970026!2d-43.56715855723963!3d-22.931815506170736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x9be43c6a7b4a45%3A0xe239b917cf9f5aa3!2sPark+Shopping+Campo+Grande+-+Estrada+do+Monteiro%2C+Rio+de+Janeiro+-+RJ%2C+Brasil!3m2!1d-22.927097999999997!2d-43.575183599999995!4m5!1s0x9be0df44d2ab4b%3A0x69738528235fc2bd!2sS%C3%ADtio+Bambuluar+Festas+%26+Eventos+-+Rua+C%C3%A2ndida+Rosa%2C+200+-+Campo+Grande%2C+Rio+de+Janeiro+-+RJ%2C+23017-385%2C+Brasil!3m2!1d-22.918207!2d-43.5210498!5e0!3m2!1spt-BR!2sbr!4v1447341075378" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
<?php
// Master page...
$Conteudo = ob_get_contents();
ob_end_clean();
$Titulo = "Usuários";
include_once("master.php");
