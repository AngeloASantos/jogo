<!DOCTYPE html>
<html lang='pt-br'>
    <meta charset="utf-8">
    <head>
        <?php 
        @session_destroy();
        session_start();  
        ?>
        <title>Warriors Rest</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css.css" rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        
    </head>
    <body>
        
       <div class="row centro">
           <div class="col-12">
               <img class="logo" src="imagens/logo/Logo.png">
            </div>
        
            
        
        <div class="row rodape ">
            <div class="col-6">
            <input type="button" id="botJogar" class="btn jogar" value="Jogar"><br>
            <!-- Modal -->
            <button id="opnModal">Me conte sobre você</button>
            <div id="modalForm" class="modalForm">
                <div class="conteudoModal">
                <span class="fechaForm">&times;</span>  
                <div class="row">
                    <h3>Informe Seus Dados Abaixo</h3>
                    <div class="col-6">
                    <label>Nome</label><br>
                    <input type="text" name="nomeP" id="nomeP"><br>
                    <label>Cidade</label><br>
                    <input type="text" name="cidadeP" id="cidadeP"><br>
                    <label>Idade</label><br>
                    <input type="text" name="idadeP" id="idadeP"><br><br>
                    <button id="botInfoUsuario">Enviar</button>
                    </div>
                    <div class="col-6">
                        <h5 id="testeDeInfo">Se quiser nos ajudar a saber quem está jogando o jogo prencha os dados ao lado. Obrigado.</h5>
                        <?php 
                        // echo $_SESSION["nome"];echo $_SESSION["cidade"]; echo $_SESSION["idade"];
                        ?>
                    </div>
                </div>
                </div>
            </div>
            <!-- FIM MODAL -->
            </div>
            
            <div class="col-6">
            
            <select id="selecPersonagem" class="form-select selecPersonagem">
            <?php 
                        include 'conectaBanco.php';
                        $query = "SELECT * FROM personagens";
                        $resultado = mysqli_query($conecta, $query);
                        
                        
                        while ($linha = mysqli_fetch_assoc($resultado)){
                        ?>
                        <option id="playerSelec" value="<?php echo $linha['id'];?>"><?php echo $linha['nome']; ?></option>
                        <?php
                         }
            ?>
                
            </select>
            
            </div>
            
        </div>
        </div>
        
    </body>

</html>