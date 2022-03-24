<?php

$conecta = mysqli_connect("localhost","root","","game");
if(!$conecta){
    echo "Erro";
    exit;
}