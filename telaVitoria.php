<!DOCTYPE html>
<html lang='pt-br'>
    <meta charset="utf-8">
    <head>
        <title>Vitória</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css.css" rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        

    </head>
    <body class="bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-1"></div>
                    <div class="col-4 painel">
                        <h1 class="titulo">Você foi Vitorioso</h1>
                        <!-- <label class="texto">Inimigos Derrotados: </label> <br>
                        <label class="texto">Golpes Evitados: </label> <br>
                        <label class="texto">Itens Usados: </label> <br>
                        <label class="texto">Tentativas: </label> -->
                    <!-- <div class="row trophy">
                        <input class="trofeus" type="image" src="imagens/icones/trofeuGanho.png">
                        <input class="trofeus" type="image" src="imagens/icones/trofeuNganho.png">
                        <input class="trofeus" type="image" src="imagens/icones/trofeuNganho.png">
                        <input class="trofeus" type="image" src="imagens/icones/trofeuNganho.png">
                        <input class="trofeus" type="image" src="imagens/icones/trofeuNganho.png">
                    </div>  -->
                    <!-- </div>
                <div class="col-7"></div>
             </div> -->
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
    </body>

</html>