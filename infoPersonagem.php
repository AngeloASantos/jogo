<?php 
session_start();

include "conectaBanco.php";
@$idPlayer = $_GET["id"];



@$query = "SELECT * FROM personagens WHERE id= $idPlayer";
@$busca = mysqli_query($conecta,$query);

if(@$linha = mysqli_fetch_assoc($busca)){
     if($linha['vida'] == 0){
          echo "DERROTA";
     }else{
          echo " {$linha['nome']}<br> Vida: {$linha ['vida']} Ataque: {$linha['ataque']}  Defesa: {$linha['defesa']}";
     }
}
