<?php 
session_start();
include "conectaBanco.php";
@$idPlayer = $_GET["id"];
@$idInimigo = $_GET["idInimigo"];
@$habEsp = $_GET['habEsp'];
@$query = "SELECT * FROM personagens WHERE id= $idPlayer";
@$busca = mysqli_query($conecta,$query);

@$linha = mysqli_fetch_assoc($busca);

@$query2 = "SELECT * FROM personagens WHERE id= $idInimigo";
@$busca2 = mysqli_query($conecta,$query2);

@$linha2 = mysqli_fetch_assoc($busca2);

   
// Gerar dano randomico na quantidade de ataque menos 10
$min = $linha['ataque'] -10;
$dano = rand($min, $linha['ataque']);
//
@$vidaOriginal = $linha2["vida_original"];
@$vidaBanco = $linha2["vida"];

// salvar vida no banco.
@$novaVida = $vidaBanco - $dano; //Calculo da vida menos dano
if($novaVida <= 0){
    $query2 = "UPDATE personagens SET vida = 0 WHERE id = $idInimigo";
    @$update = mysqli_query($conecta, $query2);
    echo @$porcentagemFinal = 0;
}else{
    ///////Habilidade Werewolf Sede De Sangue///////////
    if($habEsp == 4){
        $vidaAtualP = $linha['vida']; 
        $vidaOriginalP = $linha["vida_original"];
        $rouboDeVida =  $dano / 2 + $vidaAtualP;
        if($rouboDeVida > $linha['vida_original']){
            $rouboDeVida = $vidaOriginalP;
        }
        $query2 = "UPDATE personagens SET vida = $rouboDeVida WHERE id = $idPlayer";
        @$update = mysqli_query($conecta, $query2);
    }
    ////////////////////////////////////
    $query2 = "UPDATE personagens SET vida = $novaVida WHERE id = $idInimigo";
    @$update = mysqli_query($conecta, $query2);
    
}
//

// realiar calculo de porcentagem para inserir da barra de vida

// @$dano = $dano * 100;

// @$porcentagemFinal = $dano / $vidaBanco;
// echo @$porcentagemFinal = 100 - $porcentagemFinal;


////Calculo porcentagem de vida funcional 

$PvidaAtual = $novaVida * 100;
echo $PvidaAtual = $PvidaAtual / $vidaOriginal;

////

// }