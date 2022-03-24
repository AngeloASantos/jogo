<?php
session_start()
?> 
<!DOCTYPE html>
<html lang='pt-br'>
    <meta charset="utf-8">
    <head>
        <title>Derrota</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css.css" rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        

    </head>
    <body class="fundoTderrota">
        <div class="container-fluid">
            <div class="row">
                <div class="col-1"></div>
                    <div class="col-4 painel-derrota">
                        <h1 class="titulo2">Você Fracassou</h1>
                        <!-- <label class="texto2">Inimigos Derrotados: </label> <br> -->
                        <!-- <label class="texto2">Golpes Evitados: </label> <br> -->
                        <!-- <label class="texto2">Itens Usados: </label> <br> -->
                        <!-- <label class="texto2">Tentativas: </label> -->
                         <!-- Modal -->
            
            <div id="modalFormFeedBack" class="modalForm">
                <div class="conteudoModalfeedBack">
                <span class="fechaFormfeedBack">&times;</span>  
                <div class="row">
                    <h3 class="tituloFormFeed">Deixe Seu FeedBack Aqui!</h3>
                    <div class="col-8">
                    <!-- <label></label><br> -->
                    <textarea type="text-area" id="FeedBack"></textarea><br>
                    </div>
                    <div class="col-4">
                        <!-- <h5 id="TesteFeedback"> -->
                            <?php 
                            // echo @$_SESSION["feedback"]; echo @$_SESSION["nome"];echo @$_SESSION["cidade"]; echo @$_SESSION["idade"]; 
                            ?>
                        <!-- </h5> -->
                        <button id="enviarFeedback">Enviar</button>
                        
                    </div>
                </div>
                </div>
            </div>
            <!-- FIM MODAL -->
                    </div>
                <div class="col-7">
                <button id="opnModalFeedBack">De o Seu FeedBack</button><br>
                <button id="jogarNovamente">Jogar Novamente</button>
                </div>
             </div>
        </div>
    </body>

</html>