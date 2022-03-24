<?php 
include "conectaBanco.php";
@$idPlayer = $_GET["id"];
@$verificacao = $_GET['verificacao'];
@$query = "SELECT * FROM personagens WHERE id= $idPlayer";
@$busca = mysqli_query($conecta,$query);

@$linha = mysqli_fetch_assoc($busca);


$potsVida = $linha["pocao_vida"];

 for ($i=0; $i < $potsVida; $i++){                       
    //  echo "<input type='image' class='potCura' id='potCura' src='imagens/icones/pocaoCura.png'>";
    echo "<image class='potCura' id='potCura' src='imagens/icones/pocaoCura.png'>";
 }                       
