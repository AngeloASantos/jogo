<?php

// $conecta = mysqli_connect("localhost","root","","game");
// if(!$conecta){
//     echo "Erro";
//     exit;
// }

abstract class bancoDeDados{
    private function_construct(){}

    private function_clone(){}

    public function_destruct(){
        foreach($this as $key => $value){
            unset($this->key);
        }
    }
}