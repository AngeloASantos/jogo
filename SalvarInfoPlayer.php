<?php
include "conectaBanco.php";
session_start();
$verificacao = $_POST["verificacao"];
if($verificacao == "1" ){
     @$_SESSION["nome"] = $_POST['nome'];
     @$_SESSION["cidade"] = $_POST['cidade'];
     @$_SESSION["idade"] = $_POST['idade'];
     // echo "Dados Salvos Com Sucesso";
}
if($verificacao == "2"){
     @$_SESSION["feedback"] = $_POST['feedback'];
     @$nome = @$_SESSION["nome"];
     @$cidade = @$_SESSION["cidade"];
     @$idade = @$_SESSION["idade"];
     @$feedBack = @$_SESSION["feedback"];

     @$query = "INSERT INTO usuarios (nome, idade, cidade, feedback) VALUES ('$nome', '$idade', '$cidade', '$feedBack')";
     @$insert = mysqli_query($conecta,$query);
     // session_destroy();
     // header("Location:index.php");
     // echo "Dados Salvos Com Sucesso";
}
