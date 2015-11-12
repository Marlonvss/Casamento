<?php
error_reporting(E_ERROR);

session_start();

?>
<!DOCTYPE html>
<html>

    <head>
        <title> Rafaelle e Marlon Vitor </title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        
        <!-- JS -->
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script>
            // Função que limpa os parametros GET da URL..
            $(document).ready(function() {
                var url = location.href;
                if(url.indexOf("?")!=-1) {
                    location.href = location.href.replace(/\?.*/gi, "");
                }
            });            
        </script>
        
    </head>


    <body>
        <div id="background">
            <div id="topo">
                Rafaelle e Marlon Vitor
            </div>
            <?php echo $Nav; ?>
            <div id="corpo">
                <?php echo $Conteudo; ?>
            </div>
                 
        </div>
    </body>
</html>