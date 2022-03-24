<?php 
    include "conectaBanco.php";
    @$idPlayer = $_GET["id"];
    session_start();
    // busca no banco por um id aleatorio
    $buscaInimigo = "SELECT * FROM personagens";
    $result = mysqli_query($conecta, $buscaInimigo);
    $contaId = mysqli_num_rows($result);
    $contaId;
    $idInimigo = rand(1, $contaId);
    while($idInimigo == $idPlayer){
        $idInimigo = rand(1, $contaId); 
    }
    
    @$query = "SELECT * FROM personagens WHERE id= $idPlayer";
    @$busca = mysqli_query($conecta,$query);
    @$linha = mysqli_fetch_assoc($busca);
    
    @$query2 = "SELECT * FROM personagens WHERE id= $idInimigo";
    @$busca2 = mysqli_query($conecta,$query2);
    @$linha2 = mysqli_fetch_assoc($busca2);
    
    $vidaOriginalPlayer = $linha["vida_original"];
    $vidaOriginalInimigo = $linha2["vida_original"];
    $qntOriginalInimigo = $linha2["numero_pot_original"];
    $qntOriginalplayer = $linha["numero_pot_original"];
    
    $count = true;
    if ($count == true){
        $query1 = "UPDATE personagens SET vida = $vidaOriginalInimigo WHERE id = $idInimigo";
        @$update = mysqli_query($conecta, $query1);
        $query2 = "UPDATE personagens SET vida = $vidaOriginalPlayer WHERE id = $idPlayer";
        @$update = mysqli_query($conecta, $query2);
        $query1 = "UPDATE personagens SET pocao_vida = $qntOriginalInimigo WHERE id = $idInimigo";
        @$update = mysqli_query($conecta, $query1);
        $query2 = "UPDATE personagens SET pocao_vida = $qntOriginalplayer WHERE id = $idPlayer";
        @$update = mysqli_query($conecta, $query2);
    }
    
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <meta charset="utf-8">
    <head>
        <title>Campo de Batalha</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css.css" rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        
        </head>
    <body class="fundo" id="fundo">
        <div class="container">
            <!-- <div class="row top"></div> -->
            <div class="row elementosTela">
            <div class="botoes col-2">
                    <input type="image" id="botAtaque" src="imagens/icones/botaoatk.png">
                    <input type="image" id="botDefesa" src="imagens/icones/botaodefesa.png">
                    <input type="image" id="botBolsa" src="imagens/icones/botaobolsa.png">
                    <input type="image" value="<?php echo $linha["nome_poder"] ?>" id="botHabEsp" src="imagens/icones/<?php echo $linha['id'];?>.png">
                    <!-- MODAL -->
                    <div id="modalBolsa" class="modalBolsa">
                    <div id="hoverDringPot">
                        <input type='image' class='usaPot' id='potCura' src='imagens/icones/drinkIcon.png'>
                        <h5 class="showTextPot">Beber Poção</h5>
                    </div>
                    <div class="conteudoModalBolsa">
                    <span class="fechaModalBolsa">&times;</span>  
                    <div class="row" id="recebePots">
                        <!--RECEBE AS POÇOES DO SERVIDOR  -->
                    </div>
                </div>
            </div>
            <!-- FIM MODAL -->
                </div>
            <div class="col-5 personagem2">
                <?php
                    $query = "SELECT * FROM personagens WHERE id = $idPlayer";
                    $busca = mysqli_query($conecta, $query);
                    if($linha = mysqli_fetch_assoc($busca)){
                ?>
                <img id="player" class="personagens player" src="imagens/personagens/<?php echo $linha["imagem"];?>" alt="<?php echo $linha["id"];?>" title="<?php echo $linha["nome"];?>">
                
                <?php
                    }
                ?>
            </div>
            <div class="col-5 personagem2">
            <?php
                    $query2 = "SELECT * FROM personagens WHERE id = $idInimigo";
                    $busca2 = mysqli_query($conecta, $query2);
                    if($linha2 = mysqli_fetch_assoc($busca2)){
                ?>
                <img id="inimigo" class="personagens inimigo" src="imagens/personagens/<?php echo $linha2["imagem"];?>" alt="<?php echo $linha2["id"]; ?>" title="<?php echo $linha2["nome"];?>">
                <?php 
                    } 
                ?>
            </div>
        </div>
        <div class="row bottom-vidas-info">
            <div class="col-5">
            <h4 id="infoPlayer" style="color: white;"></h4>
            <h4 id="danoPlayer" class="hidden" val="danoPlayer" ></h4>
            <input id="verificaDef" class="hidden" value="0"/> 
            <h2 id="verificaHabEsp" class="hidden" value="0"></h2>
            <div class="barras-player">
                
                <div class="progress">
                    
                    <div class="progress-bar progress-bar-striped bg-danger barra-vidaPlayer"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped barra-espPlayer"></div>
                </div>
            </div>
            </div>
            <div class="col-2">
                <button id="fimTurno">Terminar Turno</button>
            </div>
            <div class="col-5">
            <h4 id="infoInimigo"  style="color: white;"></h4>
            <h4 id="danoInimigo" class="hidden" val="danoInimigo" ></h4>
                <div class="barras-inimigo">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-danger barra-vidaInimigo"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped barra-espInimigo"></div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </body>

</html>