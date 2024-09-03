<?php

$file_name = "disciplina.txt"; // guardando o nome do arquivo a ser alterado
$dnome = $_POST["disciplina"]; // nome da disciplina
$dsigla = $_POST["sigla"]; // sigla da disciplina
$dcarga = $_POST["carga"]; // carga horária da disciplina

echo "Nome: " . $dnome . "<br>Sigla: " . $dsigla . "<br>Carga Horária: " . $dcarga;

// abre o arquivo para escrever algo no final(se não existir, cria o arquivo)
$myfile = fopen($file_name, 'a')  or die("Não foi possível abrir o arquivo");

//verifica se o arquivo está vazio
if(filesize($file_name) == 0){
    $header = "nome;sigla;carga\n"; // Cabeçalho do arquivo
    fwrite($myfile, $header);    
}

$linha = $dnome . ";" . $dsigla . ";" . $dcarga . "\n";

fwrite($myfile, $linha); // escrevendo uma nova linha contendo as informações da disciplina
fclose($myfile);