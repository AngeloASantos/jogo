<?php

// $conecta = mysqli_connect("localhost","root","","game");
// if(!$conecta){
//     echo "Erro";
//     exit;
// }

function getConection(){
    $dsn = 'mysql:host=localhost;dbname=game;charset=utf8';
    $user = 'root';
    $pass = '';

    try{
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    }catch(PDOException $ex){
        echo "ERRO: ".$ex->getMessage();
    }

    
}