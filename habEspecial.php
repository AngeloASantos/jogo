<?php
include "conectaBanco.php";
@$idPlayer = $_GET["id"];
@$idInimigo = $_GET["idInimigo"];
@$verificaDef = $_GET["verificaDef"];

@$query = "SELECT * FROM personagens WHERE id= $idPlayer";
@$busca = mysqli_query($conecta,$query);

@$linha = mysqli_fetch_assoc($busca);

// @$query2 = "SELECT * FROM personagens WHERE id= $idInimigo";
// @$busca2 = mysqli_query($conecta,$query2);

// @$linha2 = mysqli_fetch_assoc($busca2);

//Seleção da habilidade especial
echo $poderPlayer = $linha["tipo_poder"];

// function quimicaEstudiosa($poderPlayer){
//     if($poderPlayer == 1){
//         echo 1;
//     }
//     if($poderPlayer == 2){
//         echo 2;
//     }
//     if($poderPlayer == 3){
//         echo 3;
//     }
//     if($poderPlayer == 4){
//         echo 4;
//     }

// }
