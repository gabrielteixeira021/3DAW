<?php

function validaData($nome, $email, $matricula) {

    $dados = [
        "nome"=> !empty(trim($nome)) ? trim($nome) : "",
        "email"=> !empty(trim($email)) ? trim($email) : "",
        "matricula"=> !empty(trim($matricula)) ? trim($matricula) : "",
    ];
    
    // validando os dados
    $formVal = validaStr($dados['nome']);
    $formVal = $formVal && filter_var($dados['email']);
    $formVal = $formVal && validaStr($dados['matricula']);

    return $formVal;
}

function validaStr($str){
    if($str == '' or !ctype_alpha($str)){
        return false;       // form invalido
    }
}