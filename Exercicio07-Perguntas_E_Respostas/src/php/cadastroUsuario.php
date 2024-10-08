<?php


if($_SERVER["REQUEST_METHOD"] == "GET"){

$nome = $_GET["nome"];
$email = $_GET["email"];
$senha = $_GET["senha"];

// escrevendo os dados enviados pelo formulário no arquivo
if(!file_exists("dadosUsuarios.txt")){
    $arq = fopen("dadosUsuarios.txt", "w") or die("Erro ao abrir o arquivo");
    $linha = "nome;email;senha";
    fwrite($arq, $linha);
    fclose($arq);
}

$arq = fopen("dadosUsuarios.txt", "a") or die("Erro ao abrir o arquivo");


}

?>