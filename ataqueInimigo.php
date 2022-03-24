<?php
include "conectaBanco.php";
@$idPlayer = $_GET["id"];
@$idInimigo = $_GET["idInimigo"];
@$verificaDef = $_GET["verificaDef"];
@$habEsp = $_GET["habEsp"];
@$query = "SELECT * FROM personagens WHERE id= $idPlayer";
@$busca = mysqli_query($conecta,$query);

@$linha = mysqli_fetch_assoc($busca);

@$query2 = "SELECT * FROM personagens WHERE id= $idInimigo";
@$busca2 = mysqli_query($conecta,$query2);

@$linha2 = mysqli_fetch_assoc($busca2);

// Gerar dano randomico na quantidade de ataque menos 10
if($verificaDef == 1){ 
    $min = $linha2['ataque'] -10;
    $dano = rand($min, $linha2['ataque']);
    // $dano = 10;
    $dano = $dano - $linha["defesa"]; 
    if($dano <= 0){
        $dano = 0;
    }
}else{
    $min = $linha2['ataque'] -10;
    $dano = rand($min, $linha2['ataque']);
}
//
@$vidaOriginal = $linha["vida_original"];
@$vidaBanco = $linha["vida"];

// salvar vida no banco.
@$novaVida = $vidaBanco - $dano; //Calculo da vida menos dano
///Habilidade esgrimista do Iran
// if($habEsp == 1){
    
//     $vidaInimigo = $linha2["vida"];
//     $danoAutoInfligido = $dano / 3; 
//     $query2 = "UPDATE personagens SET vida = $vidaInimigo - $danoAutoInfligido WHERE id = $idInimigo";
//     @$update = mysqli_query($conecta, $query2);

//     $vidaOriginal['vida_original'];
//     $PvidaAtual = $linha2['vida'] * 100;
//     $PvidaAtual = $PvidaAtual / $vidaOriginal;
// }
if($novaVida <= 0){
    $query = "UPDATE personagens SET vida = 0 WHERE id = $idPlayer";
    @$update = mysqli_query($conecta, $query);
    echo @$porcentagemFinal = 0;
}else{
    ///Habilidade esgrimista do Iran
    if($habEsp == 1){
        
        $vidaInimigo = $linha2["vida"];
        $danoAutoInfligido = $dano / 3; 
        $query2 = "UPDATE personagens SET vida = $vidaInimigo - $danoAutoInfligido WHERE id = $idInimigo";
        @$update = mysqli_query($conecta, $query2);

        // $vidaOriginal['vida_original'];
        // $PvidaAtual = $linha2['vida'] * 100;
        // $PvidaAtual = $PvidaAtual / $vidaOriginal;
    }
    ////////////////////////////////////////////
        $query = "UPDATE personagens SET vida = $novaVida WHERE id = $idPlayer";
        @$update = mysqli_query($conecta, $query);
        $PvidaAtual = $novaVida * 100;
        echo $PvidaAtual = $PvidaAtual / $vidaOriginal;
    }
//Uso de pot pelo inimigo
    $vidaOriginalInimigo = $linha2["vida_original"];
    $PvidaAtualInimigo = $linha2["vida"] * 100;
    $PvidaAtualInimigo = $PvidaAtualInimigo / $vidaOriginalInimigo;
    if($PvidaAtualInimigo <= 30 && $PvidaAtualInimigo > 0 && $linha2["pocao_vida"] > 0){
        // echo "TESTE";
        // $chance = rand(1,5);
        // $pot = rand(1,5);
        // if($chance == $pot){
            $vidaInimigo = $linha2["vida"];
            $cura = rand(15,50);
            $query2 = "UPDATE personagens SET vida = $vidaInimigo + $cura WHERE id = $idInimigo";
            @$update = mysqli_query($conecta, $query2);
            $query2 = "UPDATE personagens SET pocao_vida = pocao_vida - 1 WHERE id = $idInimigo";
            @$update = mysqli_query($conecta, $query2);
        // }
    }
//



// realiar calculo de porcentagem para inserir da barra de vida

// @$dano = $dano * 100;

// @$porcentagemFinal = $dano / $vidaBanco;
// echo @$porcentagemFinal = 100 - $porcentagemFinal;


////Calculo porcentagem de vida funcional 

// $PvidaAtual = $novaVida * 100;
// echo $PvidaAtual = $PvidaAtual / $vidaOriginal;