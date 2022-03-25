<?php
include './conectaBanco.php';

$conn = getConection();

$sql = "INSERT INTO personagens (nome, classe, imagem, ataque, defesa, vida, pocao_vida, tipo_poder, nome_poder) VALUES  (?,?,?,?,?,?,?,?,?)";

$nome; $classe; $imagem; $ataque; $defesa; $vida; $pocoes; $poder; $nome_poder; 



    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1,$nome);
    $stmt->bindValue(2,$classe);
    $stmt->bindValue(3,$imagem);
    $stmt->bindValue(4,$ataque);
    $stmt->bindValue(5,$defesa);
    $stmt->bindValue(6,$vida);
    $stmt->bindValue(7,$pocoes);
    $stmt->bindValue(8,$poder);
    $stmt->bindValue(9,$nome_poder);

if($stmt->execute()){
    echo "Personagem Criado";
}else{
    echo "Falha ao Criar personagem";
}