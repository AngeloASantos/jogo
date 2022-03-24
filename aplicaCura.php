<?php
include "conectaBanco.php";
@$idPlayer = $_GET["id"];
@$query = "SELECT * FROM personagens WHERE id= $idPlayer";
@$busca = mysqli_query($conecta,$query);

@$linha = mysqli_fetch_assoc($busca);
//Verificação da habEsp Alquimista Estudiosa da lagherta
@$habEsp = $_GET['habEsp'];
$cura = rand(15,50);
// $cura = 10;
if($habEsp == 3){
    $fatorCura = $cura / 2 ;
    $cura = $cura + $fatorCura;  
}

if($linha['vida'] > 0){
    if($linha['vida'] < $linha['vida_original'] && $linha['pocao_vida'] > 0){
        $novaVida = $linha['vida'] + $cura;
        if($novaVida > $linha['vida_original']){
            $vidaOriginal = $linha['vida_original'];
            @$query = "UPDATE personagens SET vida = $vidaOriginal WHERE id = $idPlayer ";
            @$busca = mysqli_query($conecta,$query);
            @$query = "UPDATE personagens SET pocao_vida = pocao_vida - 1 WHERE id = $idPlayer ";
            @$busca = mysqli_query($conecta,$query);
            
            $PvidaAtual = $novaVida * 100;
            echo $PvidaAtual = $PvidaAtual / $vidaOriginal;

        }else{
            @$query = "UPDATE personagens SET vida = vida + $cura WHERE id = $idPlayer ";
            @$busca = mysqli_query($conecta,$query);
            @$query = "UPDATE personagens SET pocao_vida = pocao_vida - 1 WHERE id = $idPlayer ";
            @$busca = mysqli_query($conecta,$query);
            $vidaOriginal = $linha['vida_original'];
            $PvidaAtual = $novaVida * 100;
            echo $PvidaAtual = $PvidaAtual / $vidaOriginal;
        }
    }
}